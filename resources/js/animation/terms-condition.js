document.addEventListener('DOMContentLoaded', function () {
    console.log('JS loaded');
    const content = document.querySelector('.terms-condition-content');
    console.log('Element found:', content);
    
    if (content) {
        content.style.opacity = '0';
        content.style.transform = 'translateY(40px)';
        content.style.transition = 'opacity 0.8s ease, transform 0.8s ease';

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                content.style.opacity = '1';
                content.style.transform = 'translateY(0)';
                console.log('Animation triggered');
            });
        });
    }
});