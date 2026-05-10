document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById('navMenuToggle');
    const menuDropdown = document.getElementById('navMenuDropdown');
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    
    if (!menuToggle || !menuDropdown) return;
    
    // Toggle dropdown saat button diklik
    menuToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        menuDropdown.classList.toggle('active');
    });
    
    // Tutup dropdown saat item diklik
    dropdownItems.forEach(item => {
        item.addEventListener('click', () => {
            menuDropdown.classList.remove('active');
        });
    });
    
    // Tutup dropdown saat klik di luar
    document.addEventListener('click', (e) => {
        if (!menuDropdown.contains(e.target) && !menuToggle.contains(e.target)) {
            menuDropdown.classList.remove('active');
        }
    });
});
