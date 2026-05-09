document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.announcement-wrapper');
    const images = document.querySelectorAll('.announcement');
    const imageCount = images.length - 1; // Minus 1 karena ada duplicate
    
    if (imageCount === 0) return;

    let currentIndex = 0;
    const scrollDuration = 3000; // Durasi rolling (ms)
    const pauseDuration = 1000; // Pause 1 menit (ms)

    function scrollToImage() {
        const offset = -currentIndex * 100;
        wrapper.style.transform = `translateX(${offset}%)`;
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % imageCount;
        scrollToImage();
    }

    function startAnimation() {
        // Pause di gambar saat ini selama 1 menit
        setTimeout(() => {
            // Mulai rolling
            nextImage();
            
            // Setelah selesai rolling, pause lagi
            setTimeout(startAnimation, scrollDuration);
        }, pauseDuration);
    }

    scrollToImage();
    startAnimation();
});