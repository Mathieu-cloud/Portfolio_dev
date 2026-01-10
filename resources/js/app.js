import '@tailwindplus/elements';
import heroAnimation from './hero';

document.addEventListener('alpine:init', () => {
    Alpine.data('heroAnimation', heroAnimation);
});

