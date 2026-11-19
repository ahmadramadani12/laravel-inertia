<script setup>
// Terima label dari properti value atau dari slot komponen.
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <!-- Tampilkan teks label eksplisit, atau gunakan isi slot sebagai cadangan. -->
    <label class="block text-sm font-medium text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
