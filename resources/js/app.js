import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// Gunakan nama aplikasi dari lingkungan build, dengan Laravel sebagai nilai cadangan.
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Inisialisasi Inertia, temukan halaman Vue, dan pasang plugin navigasi.
createInertiaApp({
    // Tambahkan nama aplikasi pada judul setiap halaman Inertia.
    title: (title) => `${title} - ${appName}`,
    // Muat komponen halaman berdasarkan nama yang dikirim dari server.
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        // Pasang aplikasi Vue, plugin Inertia dan Ziggy, lalu kaitkan ke elemen root.
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        // Tentukan warna indikator progres navigasi Inertia.
        color: '#4B5563',
    },
});
