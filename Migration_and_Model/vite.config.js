import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            // FIXED: Use your actual Codespace URL with port 5173 (Vite's port)
            // This tells the browser where to connect for hot reloading
            // Replace this with your current Codespace URL if it changes
            host: 'curly-lamp-wrg79wp7gx572gr44-5173.app.github.dev',
            protocol: 'wss',
            // FIXED: Explicitly set client port to 443 (HTTPS)
            // Without this, the browser tries to connect on the wrong port
            clientPort: 443,
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});