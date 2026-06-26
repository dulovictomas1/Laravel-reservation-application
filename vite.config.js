import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),

        VitePWA({
            registerType: 'autoUpdate',
            manifest: {
                name: 'Portál služueb',
                short_name: 'Portál',
                
                start_url: '/laravel-app/public/',
                scope: '/laravel-app/public/',

                display: 'standalone',
                background_color: '#ffffff',
                theme_color: '#111827',
                icons: [
                    {
                        src: 'http://localhost/laravel-app/public/icons/icon-192.png',
                        sizes: '192x192',
                        type: 'image/png',
                    },

                    {
                        src: 'http://localhost/laravel-app/public/icons/icon-512.png',
                        sizes: '512x512',
                        type: 'image/png',
                    },
                ],
            },
        }),
    ],
});