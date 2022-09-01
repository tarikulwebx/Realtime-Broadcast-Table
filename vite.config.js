import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/pusher.min.js',
                'resources/js/jquery-3.6.1.min.js',
            ],
            refresh: true,
        }),
    ],
});
