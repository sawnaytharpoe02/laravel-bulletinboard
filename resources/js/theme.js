// Get the current theme from session storage or the default theme
const userTheme = sessionStorage.getItem("theme") || "light";
const sun = document.querySelector("#sun_icon");
const moon = document.querySelector("#moon_icon");

// Set the initial theme based on the user's preference
if (userTheme === "dracula") {
    document.documentElement.setAttribute("data-theme", "dracula");
} else {
    document.documentElement.setAttribute("data-theme", "light");
}

// Function to toggle themes
function toggleTheme() {
    if (document.documentElement.getAttribute("data-theme") === "light") {
        document.documentElement.setAttribute("data-theme", "dracula");
        sessionStorage.setItem("theme", "dracula"); // Store the theme preference in session storage
    } else {
        document.documentElement.setAttribute("data-theme", "light");
        sessionStorage.setItem("theme", "light"); // Store the theme preference in session storage
    }
}

sun.addEventListener("click", toggleTheme);
moon.addEventListener("click", toggleTheme);
