document.addEventListener("DOMContentLoaded", function () {
    const sidebarBtn = document.getElementById("sidebar-button");
    const sidebar = document.querySelector(".sidebar");
    const backdrop = document.getElementById("sidebar-backdrop");

    if (window.innerWidth >= 940) {
        sidebarBtn.classList.add("actve");
    }

    if (sidebarBtn && sidebar) {
        sidebarBtn.addEventListener("click", function () {
            sidebar.classList.toggle("sidebar-hidden");
            // Also toggle the backdrop if we are on a smaller screen
            if (window.innerWidth <= 940 && backdrop) {
                backdrop.classList.toggle("active");
            }
        });
    }

    // Close sidebar when clicking the darker background
    if (backdrop) {
        backdrop.addEventListener("click", function () {
            sidebar.classList.remove("sidebar-hidden"); // Closes sidebar on mobile
            backdrop.classList.remove("active"); // Hides dimmer
        });
    }
});
