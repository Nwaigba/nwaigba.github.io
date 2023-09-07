// JavaScript (dashboard.js)
document.addEventListener("DOMContentLoaded", function () {
    // Get all navigation links
    const navLinks = document.querySelectorAll("nav a");
    const sections = document.querySelectorAll("main .dashboard-section");

    // Add click event listeners to navigation links
    navLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            // Hide all sections
            sections.forEach((section) => {
                section.style.display = "none";
            });

            // Show the selected section based on the link's href
            const targetSectionId = link.getAttribute("href").replace("#", "");
            const targetSection = document.getElementById(targetSectionId);
            targetSection.style.display = "block";
        });
    });
});
