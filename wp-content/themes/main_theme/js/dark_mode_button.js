const dark_mode_button = () => {
    // Get both checkboxes (since you have two)
    const toggles = document.querySelectorAll('.themeToggle');

    // Apply the saved theme preference
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "light") {
        document.documentElement.classList.add("light");
        toggles.forEach(toggle => {
            toggle.checked = true; // Set both toggles to 'checked' if the theme is 'light'
        });
    }

    // Add event listener to each toggle
    toggles.forEach(toggle => {
        toggle.addEventListener("change", function () {
            // Update theme based on the toggle's state
            if (toggle.checked) {
                document.documentElement.classList.add("light");
                localStorage.setItem("theme", "light");
            } else {
                document.documentElement.classList.remove("light");
                localStorage.setItem("theme", "dark");
            }
            // Sync the state of the other toggle
            toggles.forEach(otherToggle => {
                if (otherToggle !== toggle) {
                    otherToggle.checked = toggle.checked; // Make the other toggle match the current one
                }
            });
        });
    });
};

document.addEventListener("DOMContentLoaded", dark_mode_button);
