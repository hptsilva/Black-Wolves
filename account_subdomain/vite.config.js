import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/scss/estilo_admin.scss', 
                'resources/scss/estilo_index.scss',
                'resources/scss/estilo_midia.scss',
                'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
