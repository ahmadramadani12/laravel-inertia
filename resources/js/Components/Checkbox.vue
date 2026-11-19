<script setup>
import { computed } from 'vue';

// Teruskan perubahan nilai kotak centang ke model induk melalui v-model.
const emit = defineEmits(['update:checked']);

// Terima nilai centang dan nilai opsional untuk elemen input.
const props = defineProps({
    checked: {
        type: [Array, Boolean],
        required: true,
    },
    value: {
        default: null,
    },
});

// Jembatani properti checked dengan event agar dapat dipakai sebagai v-model.
const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <!-- Kotak centang meneruskan perubahan ke model melalui proxyChecked. -->
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    />
</template>
