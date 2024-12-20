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
            colors: {
                'theme-purple': '#6F33ED',
                'theme-light-purple': '#F9F6FE',
                'theme-lavender': '#F2EAFF',
                'theme-ivory': '#F9F6FE',
                'theme-red': '#CD0000',
            }
        },
    },
    plugins: [
        require('@savvywombat/tailwindcss-grid-areas')
    ],
};
