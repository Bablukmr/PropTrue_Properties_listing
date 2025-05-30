import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
   plugins: [
        require('@tailwindcss/forms'),
        function ({ addComponents }) {
            addComponents({
                '.pagination': {
                    '@apply flex items-center space-x-2': {},
                },
                '.page-item': {
                    '@apply px-4 py-2 border rounded': {},
                },
                '.page-item.active': {
                    '@apply border-teal-800 bg-[#d33593] text-white': {},
                },
                '.page-item:not(.active)': {
                    '@apply border-gray-300 text-gray-700 hover:bg-gray-100': {},
                },
                '.page-item.disabled': {
                    '@apply opacity-50 cursor-not-allowed': {},
                },
            });
        },
    ],
};
