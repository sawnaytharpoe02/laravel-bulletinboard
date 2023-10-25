/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "sans-serif"],
        },
        extend: {},
    },
    daisyui: {
        themes: ["dark", "light"],
    },
    plugins: [require("daisyui")],
};
