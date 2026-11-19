import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

// Hubungkan bundler Vite dengan integrasi Laravel dan pemroses komponen Vue.
export default defineConfig({
    // Tetapkan entrypoint aset dan aktifkan penyegaran saat berkas Blade berubah.
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                // Pertahankan URL aset absolut agar transformasi Vue tidak mengubahnya.
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
