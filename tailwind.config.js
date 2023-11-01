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
            noto: ["Noto Serif", "serif"],
            agbalumo: ["Agbalumo", "serif"],
        },
        extend: {},
    },
    daisyui: {
        themes: ["light", "dracula"],
    },
    plugins: [require("daisyui")],
};
