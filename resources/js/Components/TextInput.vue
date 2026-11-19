<script setup>
import { onMounted, ref } from 'vue';

// Ikat nilai input ke v-model dan wajibkan nilai string dari induk.
const model = defineModel({
    type: String,
    required: true,
});

// Simpan elemen input agar dapat difokuskan secara programatis.
const input = ref(null);

// Hormati atribut autofocus saat elemen sudah terpasang.
onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

// Izinkan komponen induk meminta fokus pada elemen input.
defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <!-- Input teks terhubung langsung ke model dan referensi fokus. -->
    <input
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        v-model="model"
        ref="input"
    />
</template>
