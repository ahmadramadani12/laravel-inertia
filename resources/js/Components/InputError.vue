<script setup>
// Terima pesan validasi yang akan ditampilkan jika tersedia.
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <!-- Sembunyikan pesan kesalahan saat properti message kosong. -->
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>
