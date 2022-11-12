import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/scss/style.scss',
            'resources/js/app.js',
        ]),
    ],
});
