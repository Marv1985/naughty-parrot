const dark_mode_button = () => {
    const toggles = document.querySelectorAll('.themeToggle');
    const root = document.documentElement;

    const setTheme = (theme) => {
        root.classList.remove("light", "dark");
        root.classList.add(theme);
        localStorage.setItem("theme", theme);
        toggles.forEach(toggle => {
            toggle.checked = theme === "light";
        });
    };

    const savedTheme = localStorage.getItem("theme") || "dark";
    setTheme(savedTheme);

    toggles.forEach(toggle => {
        toggle.addEventListener("change", function () {
            setTheme(toggle.checked ? "light" : "dark");
        });
    });

    // Only auto-toggle if .theme_switch_button exists
    if (document.querySelector('.theme_switch_button')) {
        setTimeout(() => {
            const newTheme = savedTheme === "light" ? "dark" : "light";
            setTheme(newTheme);
        }, 3000);
    }
};

document.addEventListener("DOMContentLoaded", dark_mode_button);
