document.addEventListener('DOMContentLoaded', () => {
    // 1. Animasi untuk section tulisan (kiri)
    const leftSection = document.querySelector('.left-contact-section');
    if (leftSection) {
        setTimeout(() => {
            leftSection.classList.add('reveal');
        }, 200);
    }

    // 2. Animasi Staggered untuk tombol Social Media (kanan)
    const socialButtons = document.querySelectorAll('.social-media-contact');
    
    socialButtons.forEach((button, index) => {
        // index * 200 artinya: tombol 1 delay 400ms, tombol 2 delay 600ms, dst.
        setTimeout(() => {
            button.classList.add('reveal');
        }, 400 + (index * 200)); 
    });
});