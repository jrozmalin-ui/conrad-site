import { initScrollImageSequence } from './scroll-image-sequence.js';

/** Warm cache for manifest before scroll-sequence init — reduces first-paint stall on cold visits. */
if (typeof window !== 'undefined') {
    fetch('/sequence/manifest.json', { cache: 'force-cache' }).catch(() => {});
}

document.querySelectorAll('[data-scroll-sequence]').forEach((root) => {
    initScrollImageSequence(root);
});
