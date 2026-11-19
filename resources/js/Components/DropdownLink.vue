<script setup>
import { Link } from '@inertiajs/vue3';

// Terima alamat tujuan navigasi dari komponen pemanggil.
defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <!-- Gunakan tautan Inertia agar navigasi tidak memuat ulang seluruh halaman. -->
    <Link
        :href="href"
        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
    >
        <slot />
    </Link>
</template>
