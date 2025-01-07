import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import primeui from 'tailwindcss-primeui'


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                red: {
                    50: '#ffe5e5',
                    100: '#ffcccc',
                    200: '#ff9999',
                    300: '#ff6666',
                    400: '#ff3333',
                    500: '#FF0000',
                    600: '#e60000',
                    700: '#b30000',
                    800: '#800000',
                    900: '#4d0000',
                },
            }
        },
    },

    plugins: [forms, primeui],
};
