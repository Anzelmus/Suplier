const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/*/.blade.php",  // For Blade template files
        "./resources/*/.js",         // For JavaScript files
        "./resources/*/.vue",        // For Vue component files
        "./resources/*/.jsx",        // Optional: For JSX files if you use React
        "./resources/*/.ts",         // Optional: For TypeScript files
        "./resources/*/.tsx",        // Optional: For TSX files if you use React
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
    ],
};