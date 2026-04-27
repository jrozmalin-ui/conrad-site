import { initScrollImageSequence } from './scroll-image-sequence.js';

document.querySelectorAll('[data-scroll-sequence]').forEach((root) => {
    initScrollImageSequence(root);
});
