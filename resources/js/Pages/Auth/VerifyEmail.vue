<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// Terima status pengiriman ulang tautan verifikasi dari server.
const props = defineProps({
    status: {
        type: String,
    },
});

// Gunakan form kosong karena endpoint pengiriman mengambil email dari sesi.
const form = useForm({});

// Minta server mengirim ulang notifikasi verifikasi email.
const submit = () => {
    form.post(route('verification.send'));
};

// Tampilkan umpan balik sukses hanya untuk status pengiriman ulang yang dikenal.
const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <!-- Halaman memberi instruksi verifikasi serta aksi kirim ulang dan logout. -->
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            Thanks for signing up! Before getting started, could you verify your
            email address by clicking on the link we just emailed to you? If you
            didn't receive the email, we will gladly send you another.
        </div>

        <div
            class="mb-4 text-sm font-medium text-green-600"
            v-if="verificationLinkSent"
        >
            A new verification link has been sent to the email address you
            provided during registration.
        </div>

        <!-- Formulir mengirim ulang tautan verifikasi tanpa meninggalkan halaman. -->
        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Resend Verification Email
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >Log Out</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
