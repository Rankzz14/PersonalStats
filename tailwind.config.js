import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Funnel Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                mavi: {
                    light: '#3b82f6',
                    DEFAULT: '#2563eb',
                    dark: '#1e40af',
                },
                
            },
        },
    },

    plugins: [forms, typography],
};
