import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/admin/sidebar.js',
                'resources/js/auth/login.js',
                'resources/js/page/index.js'
            ],
            refresh: true,
        }),
    ],
});