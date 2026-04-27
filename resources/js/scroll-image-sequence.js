/**
 * Scroll-driven canvas image sequence — contain fit, fractional blending, chapter UI.
 */

const DEFAULT_MANIFEST_URL = '/sequence/manifest.json';

/**
 * Flip frame order so scroll runs messy → clean when source files are clean → messy (or vice versa).
 * Toggle here, or override per section with data-reverse-sequence="true|false".
 */
const REVERSE_SEQUENCE = false;

/**
 * @param {HTMLCanvasElement} _canvas
 * @param {number} destW
 * @param {number} destH
 * @param {CanvasRenderingContext2D} ctx
 * @param {HTMLImageElement} img
 * @param {number} alpha
 */
function drawImageContain(_canvas, destW, destH, ctx, img, alpha = 1) {
    if (!img?.naturalWidth) {
        return;
    }

    const iw = img.naturalWidth;
    const ih = img.naturalHeight;
    const scale = Math.min(destW / iw, destH / ih);
    const dw = iw * scale;
    const dh = ih * scale;
    const dx = (destW - dw) / 2;
    const dy = (destH - dh) / 2;

    ctx.save();
    ctx.globalAlpha = alpha;
    ctx.drawImage(img, dx, dy, dw, dh);
    ctx.restore();
}

/**
 * @param {string} template
 * @param {number} index zero-based frame index
 * @param {number} indexStart
 * @param {number} pad
 */
function framePath(template, index, indexStart, pad) {
    const n = indexStart + index;
    const padded = pad > 0 ? String(n).padStart(pad, '0') : String(n);

    return template.replace(/\{index\}/g, padded).replace(/\{i\}/g, padded);
}

/**
 * @param {HTMLElement} root
 */
function resolveReverseFrames(root) {
    if (root.dataset.reverseSequence !== undefined) {
        return root.dataset.reverseSequence === 'true';
    }

    return REVERSE_SEQUENCE;
}

/**
 * @param {HTMLElement} root
 */
function bgFillStyle(root) {
    return root.dataset.sequenceBg ?? '#090909';
}

/**
 * Yield so the browser can paint and handle input — avoids long tasks when many JPEGs finish at once.
 *
 * @returns {Promise<void>}
 */
function yieldToMain() {
    return new Promise((resolve) => {
        requestAnimationFrame(() => resolve());
    });
}

export function initScrollImageSequence(root) {
    if (!(root instanceof HTMLElement)) {
        return () => {};
    }

    const canvas = root.querySelector('[data-sequence-canvas]');
    const fallback = root.querySelector('[data-sequence-fallback]');

    if (!canvas || !(canvas instanceof HTMLCanvasElement)) {
        return () => {};
    }

    const ctx = canvas.getContext('2d', { alpha: false });
    if (!ctx) {
        return () => {};
    }

    const manifestUrl = root.dataset.manifestUrl || DEFAULT_MANIFEST_URL;
    let prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /** @type {{ frameCount: number, filenameTemplate?: string, indexStart?: number, indexPad?: number } | null} */
    let manifest = null;
    /** @type {(HTMLImageElement | undefined)[]} */
    let images = [];
    /** @type {Set<number>} */
    const failed = new Set();
    let frameCount = 0;
    let animationFrame = 0;
    /** @type {ResizeObserver | null} */
    let resizeObserver = null;
    let lastPreloadCenter = -1;
    /** @type {number} Smoothed scroll progress for buttery scrubbing (-1 = unset). */
    let displayProgress = -1;
    let teardown = () => {};

    const scrollSmoothing = () => {
        const k = Number(root.dataset.scrollSmoothing ?? 0.11);
        if (!Number.isFinite(k) || k <= 0) {
            return 1;
        }

        return Math.min(1, Math.max(0.02, k));
    };

    /**
     * Edge feather for chapter crossfades (fraction of total scroll distance).
     */
    const chapterFeather = () => {
        const f = Number(root.dataset.chapterFeather ?? 0.028);
        if (!Number.isFinite(f) || f <= 0) {
            return 0;
        }

        return Math.min(0.08, f);
    };

    /**
     * @param {number} p
     * @param {number} from
     * @param {number} to
     * @param {number} feather
     */
    const chapterOpacitySoft = (p, from, to, feather) => {
        if (p < from || p > to) {
            return 0;
        }

        const fadeOutAtEnd = to < 0.999;
        const midStart = from + feather;
        const midEnd = fadeOutAtEnd ? to - feather : to;

        if (midStart >= midEnd) {
            return 1;
        }

        if (p < midStart) {
            return (p - from) / feather;
        }

        if (fadeOutAtEnd && p > midEnd) {
            return (to - p) / feather;
        }

        return 1;
    };

    const resize = () => {
        const rect = canvas.getBoundingClientRect();
        const w = rect.width;
        const h = rect.height;
        const dpr = Math.min(window.devicePixelRatio || 1, root.dataset.maxDpr ? Number(root.dataset.maxDpr) : 2);

        canvas.width = Math.max(1, Math.floor(w * dpr));
        canvas.height = Math.max(1, Math.floor(h * dpr));
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    };

    const getScrollProgress = () => {
        const rect = root.getBoundingClientRect();
        const total = rect.height - window.innerHeight;
        if (total <= 0) {
            return 0;
        }

        let p = -rect.top / total;
        if (p < 0) {
            p = 0;
        }
        if (p > 1) {
            p = 1;
        }

        return p;
    };

    const loadImage = (url) =>
        new Promise((resolve, reject) => {
            const img = new Image();
            img.decoding = 'async';
            img.onload = () => resolve(img);
            img.onerror = () => reject(new Error(`Failed to load ${url}`));
            img.src = url;
        });

    /** @param {number} index */
    const ensureFrame = async (index) => {
        if (!manifest || frameCount === 0 || index < 0 || index >= frameCount) {
            return;
        }

        if (images[index] instanceof HTMLImageElement || failed.has(index)) {
            return;
        }

        const template = manifest.filenameTemplate ?? 'frame_{index}.jpg';
        const pad = manifest.indexPad ?? 4;
        const start = manifest.indexStart ?? 0;
        const path = `/sequence/${framePath(template, index, start, pad)}`;

        try {
            const img = await loadImage(path);
            images[index] = img;
        } catch {
            failed.add(index);
        }
    };

    /**
     * Load a contiguous range with low concurrency + yields so first visit does not freeze the tab.
     *
     * @param {number} fromIdx
     * @param {number} toIdx
     * @param {number} concurrency
     */
    const preloadRange = async (fromIdx, toIdx, concurrency = 4) => {
        const lo = Math.max(0, Math.floor(fromIdx));
        const hi = Math.min(frameCount - 1, Math.floor(toIdx));

        if (hi < lo) {
            return;
        }

        const indices = [];

        for (let i = lo; i <= hi; i++) {
            indices.push(i);
        }

        const cc = Number(root.dataset.preloadConcurrency ?? concurrency);
        const chunkCap = Number.isFinite(cc) && cc >= 1 ? Math.min(12, Math.floor(cc)) : concurrency;

        for (let offset = 0; offset < indices.length; offset += chunkCap) {
            const chunk = indices.slice(offset, offset + chunkCap);

            await Promise.all(chunk.map((idx) => ensureFrame(idx)));
            await yieldToMain();
        }
    };

    /** Incremented when scrub head moves — abandons stale preload work so fast scroll does not stack work. */
    let preloadGeneration = 0;

    /**
     * Load frames around the scrub head in small batches with yields between batches.
     *
     * @param {number} centerIndex
     */
    const preloadAround = (centerIndex) => {
        const gen = ++preloadGeneration;
        const windowSize = Number(root.dataset.preloadWindow ?? 10);
        const indices = [];

        for (let d = 0; d <= windowSize; d++) {
            indices.push(centerIndex + d, centerIndex - d);
        }

        const unique = [...new Set(indices)].filter((i) => i >= 0 && i < frameCount);

        unique.sort((a, b) => Math.abs(a - centerIndex) - Math.abs(b - centerIndex));

        const batchSizeRaw = Number(root.dataset.preloadBatch ?? 4);
        const batchSize = Number.isFinite(batchSizeRaw) && batchSizeRaw >= 1 ? Math.min(16, Math.floor(batchSizeRaw)) : 4;

        const pump = async () => {
            for (let offset = 0; offset < unique.length; offset += batchSize) {
                if (gen !== preloadGeneration) {
                    return;
                }

                const chunk = unique.slice(offset, offset + batchSize);

                await Promise.all(chunk.map((idx) => ensureFrame(idx)));
                await yieldToMain();
            }
        };

        void pump();
    };

    /**
     * Map scroll progress [0,1] to frame indices with optional reversal.
     */
    const progressToMappedIndex = (progress, maxIdx, reverse) => {
        let mapped = progress * maxIdx;

        if (reverse) {
            mapped = maxIdx - mapped;
        }

        return mapped;
    };

    const render = (progress) => {
        const w = canvas.clientWidth;
        const h = canvas.clientHeight;

        if (w <= 0 || h <= 0) {
            return;
        }

        ctx.fillStyle = bgFillStyle(root);
        ctx.fillRect(0, 0, w, h);

        const reverse = resolveReverseFrames(root);

        if (frameCount === 0 || prefersReducedMotion) {
            if (fallback instanceof HTMLImageElement && fallback.complete && fallback.naturalWidth) {
                drawImageContain(canvas, w, h, ctx, fallback, 1);
            }

            return;
        }

        const maxIdx = frameCount - 1;
        const mapped = progressToMappedIndex(progress, maxIdx, reverse);

        const i = Math.floor(mapped);
        const frac = mapped - i;
        const i0 = Math.max(0, Math.min(maxIdx, i));
        const i1 = Math.max(0, Math.min(maxIdx, i0 + 1));

        const imgA = images[i0];
        const imgB = images[i1];

        if (imgA instanceof HTMLImageElement) {
            drawImageContain(canvas, w, h, ctx, imgA, 1);
        } else if (fallback instanceof HTMLImageElement && fallback.complete && fallback.naturalWidth) {
            drawImageContain(canvas, w, h, ctx, fallback, 1);
        }

        if (imgB instanceof HTMLImageElement && imgA !== imgB && frac > 0.004) {
            drawImageContain(canvas, w, h, ctx, imgB, frac);
        }

        if (fallback instanceof HTMLElement && imgA instanceof HTMLImageElement) {
            fallback.classList.add('opacity-0', 'pointer-events-none');
        }
    };

    const isChapterActive = (progress, from, to) => {
        const endsAtFinish = to >= 0.999;
        const inRange = progress >= from && (endsAtFinish ? progress <= 1 : progress < to);

        return inRange;
    };

    const updateStoryChapters = (progress) => {
        const feather = chapterFeather();

        root.querySelectorAll('[data-story-chapter]').forEach((el) => {
            if (!(el instanceof HTMLElement)) {
                return;
            }

            const from = Number(el.dataset.from ?? 0);
            const to = Number(el.dataset.to ?? 1);
            const opacity = feather > 0 ? chapterOpacitySoft(progress, from, to, feather) : (isChapterActive(progress, from, to) ? 1 : 0);

            el.style.opacity = String(opacity);
            el.style.visibility = opacity < 0.03 ? 'hidden' : 'visible';

            const strength = Number(el.dataset.parallaxStrength ?? 10);

            if (opacity < 0.03) {
                el.style.transform = 'translateY(12px)';
            } else if ((to - from) > 0.001) {
                const span = to - from;
                const local = (progress - from) / span;
                const clamped = Math.min(1, Math.max(0, local));
                const eased = Math.sin(clamped * Math.PI);
                const px = (clamped - 0.5) * strength * 0.38 * eased;

                el.style.transform = `translateY(${px}px)`;
            } else {
                el.style.transform = 'translateY(0)';
            }

            el.style.pointerEvents = opacity > 0.45 ? 'auto' : 'none';

            const interactive = el.querySelectorAll('a, button');

            interactive.forEach((node) => {
                if (node instanceof HTMLElement) {
                    node.tabIndex = opacity > 0.5 ? 0 : -1;
                }
            });
        });

        root.querySelectorAll('[data-sequence-overlay]').forEach((el) => {
            if (!(el instanceof HTMLElement)) {
                return;
            }

            const from = Number(el.dataset.from ?? 0);
            const to = Number(el.dataset.to ?? 1);
            const endsAtFinish = to >= 0.999;
            const inRange = progress >= from && (endsAtFinish ? progress <= 1 : progress < to);
            el.style.opacity = inRange ? '1' : '0';
            el.style.transform = inRange ? 'translateY(0)' : 'translateY(10px)';
        });
    };

    const loop = () => {
        const raw = prefersReducedMotion ? 1 : getScrollProgress();
        const k = scrollSmoothing();

        if (prefersReducedMotion) {
            displayProgress = 1;
        } else if (displayProgress < 0) {
            displayProgress = raw;
        } else if (k >= 1) {
            displayProgress = raw;
        } else {
            displayProgress += (raw - displayProgress) * k;
        }

        const progress = displayProgress;

        render(progress);
        updateStoryChapters(progress);

        if (frameCount > 0 && !prefersReducedMotion) {
            const maxIdx = Math.max(0, frameCount - 1);
            const reverse = resolveReverseFrames(root);
            const mapped = progressToMappedIndex(progress, maxIdx, reverse);
            const center = Math.floor(mapped);

            if (center !== lastPreloadCenter) {
                lastPreloadCenter = center;
                preloadAround(center);
            }
        }

        animationFrame = requestAnimationFrame(loop);
    };

    const onResize = () => {
        resize();

        const p = prefersReducedMotion ? 1 : getScrollProgress();

        render(p);
        updateStoryChapters(p);
    };

    const init = async () => {
        try {
            const res = await fetch(manifestUrl, { cache: 'force-cache' });

            if (res.ok) {
                manifest = await res.json();
                frameCount = Number(manifest?.frameCount ?? 0);
            }
        } catch {
            manifest = null;
            frameCount = 0;
        }

        if (!Number.isFinite(frameCount) || frameCount < 1) {
            frameCount = 0;
            images = [];
            failed.clear();

            if (fallback instanceof HTMLElement) {
                fallback.classList.remove('opacity-0', 'pointer-events-none');
            }

            canvas.classList.add('opacity-0');
        } else {
            images = Array.from({ length: frameCount }, () => undefined);

            const maxIdx = frameCount - 1;

            await ensureFrame(0);
            await ensureFrame(maxIdx);

            canvas.classList.remove('opacity-0');

            if (fallback instanceof HTMLElement) {
                fallback.classList.add('transition-opacity', 'duration-700');
            }

            const windowSize = Number(root.dataset.preloadWindow ?? 14);

            /**
             * Never block the RAF loop on a large eager decode — if the user reaches this section while
             * frames are still loading, chapters and scroll mapping must still run.
             */
            if (!prefersReducedMotion) {
                const eagerSpan = Number(root.dataset.eagerPreloadSpan ?? windowSize * 2 + 24);
                const eagerEnd = Math.min(maxIdx, Number.isFinite(eagerSpan) ? eagerSpan : maxIdx);

                /**
                 * Defer bulk preload until after first paint — cold visitors were hitting long main-thread
                 * stalls while the hero was still settling (fonts, layout).
                 */
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        void preloadRange(0, eagerEnd, 4);
                        preloadAround(0);
                    });
                });
            }
        }

        resize();
        render(prefersReducedMotion ? 1 : getScrollProgress());
        updateStoryChapters(prefersReducedMotion ? 1 : getScrollProgress());

        requestAnimationFrame(() => {
            resize();
            render(prefersReducedMotion ? 1 : getScrollProgress());
            updateStoryChapters(prefersReducedMotion ? 1 : getScrollProgress());
        });

        resizeObserver = new ResizeObserver(() => {
            onResize();
        });
        resizeObserver.observe(canvas);

        animationFrame = requestAnimationFrame(loop);

        window.addEventListener('resize', onResize, { passive: true });

        const mq = window.matchMedia('(prefers-reduced-motion: reduce)');

        const onMotion = () => {
            prefersReducedMotion = mq.matches;
            displayProgress = -1;
            render(prefersReducedMotion ? 1 : getScrollProgress());
            updateStoryChapters(prefersReducedMotion ? 1 : getScrollProgress());
        };

        mq.addEventListener('change', onMotion);

        teardown = () => {
            cancelAnimationFrame(animationFrame);
            resizeObserver?.disconnect();
            resizeObserver = null;
            window.removeEventListener('resize', onResize);
            mq.removeEventListener('change', onMotion);
        };
    };

    init();

    return () => teardown();
}
