const dark_mode_button = () => {
    const toggles = document.querySelectorAll('.themeToggle');
    const root = document.documentElement;

    // Utility function to update the theme
    const setTheme = (theme) => {
        // Remove both classes first
        root.classList.remove("light", "dark");

        // Add the selected one
        root.classList.add(theme);
        localStorage.setItem("theme", theme);

        // Sync all toggles
        toggles.forEach(toggle => {
            toggle.checked = theme === "light";
        });
    };

    // On load: apply saved theme
    const savedTheme = localStorage.getItem("theme") || "dark";
    setTheme(savedTheme);

    // Add event listeners
    toggles.forEach(toggle => {
        toggle.addEventListener("change", function () {
            setTheme(toggle.checked ? "light" : "dark");
        });
    });
};

document.addEventListener("DOMContentLoaded", dark_mode_button);
