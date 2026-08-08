import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                outfit: ['Outfit', 'sans-serif'],
            },
            colors: {
                primary: {
                    DEFAULT: '#144D30',
                    dark: '#0B3322',
                    light: '#1C6B44',
                    accent: '#E8F5E9',
                },
                accent: {
                    DEFAULT: '#FFAA00',
                    dark: '#E09500',
                },
                dark: '#0A2317',
            },
        },
    },

    plugins: [forms],
};
