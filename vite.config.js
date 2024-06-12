import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        open: true, // при запуске открываем страницу в браузере
        host: true, // создаём хост для подключения из локальной сети
        port: 8080,
        strictPort: true,
        watch: {
            usePolling: true
        }
    }
});
