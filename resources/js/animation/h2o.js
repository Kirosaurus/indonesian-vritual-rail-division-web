document.addEventListener('DOMContentLoaded', () => {
    // 1. Munculkan box judul dulu
    const specialBox = document.querySelector('.special-box');
    if (specialBox) {
        setTimeout(() => {
            specialBox.classList.add('is-visible');
        }, 200);
    }

    // 2. Munculkan step cards satu per satu (staggered)
    const cards = document.querySelectorAll('.step-card');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('is-visible');
        }, 400 + (index * 150)); // Memberikan delay antar card (150ms)
    });
});