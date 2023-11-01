import { defineConfig } from 'vite';
import copy from 'rollup-plugin-copy';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/mybootstrap.css',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/bootstrap-icons.min.css',
                'resources/js/userMenu.js'
            ],
            refresh: true,
        }),
        copy({
            targets: [
                { src: 'node_modules/bootstrap-icons/font/*', dest: 'public/fonts/bootstrap-icons' },
            ],
        }),
    ],
});
