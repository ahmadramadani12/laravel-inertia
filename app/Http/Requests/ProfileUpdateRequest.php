<?php

namespace App\Http\Requests; // Menempatkan request ini pada namespace untuk validasi HTTP.

use App\Models\User; // Mengimpor model User untuk aturan keunikan email.
use Illuminate\Contracts\Validation\ValidationRule; // Mengimpor tipe aturan validasi yang digunakan Laravel.
use Illuminate\Foundation\Http\FormRequest; // Mengimpor kelas dasar untuk membuat request tervalidasi.
use Illuminate\Validation\Rule; // Mengimpor pembangun aturan validasi yang dinamis.

/** Memvalidasi perubahan nama dan email pada profil pengguna. */
class ProfileUpdateRequest extends FormRequest // Mendefinisikan validasi khusus untuk perubahan profil pengguna.
{
    // Membuka blok definisi kelas.
    /**
     * Menentukan aturan validasi yang berlaku untuk permintaan profil.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array // Menyediakan kumpulan aturan validasi untuk data profil.
    { // Membuka blok method rules.
        return [ // Memulai array aturan validasi yang akan diterapkan.
            'name' => ['required', 'string', 'max:255'], // Mewajibkan nama berupa teks dengan panjang maksimal 255 karakter.
            'email' => [ // Memulai aturan validasi untuk alamat email.
                'required', // Memastikan alamat email wajib diisi.
                'string', // Memastikan alamat email dikirim sebagai teks.
                'lowercase', // Memastikan alamat email menggunakan huruf kecil.
                'email', // Memastikan format alamat email valid.
                'max:255', // Membatasi alamat email hingga 255 karakter.
                Rule::unique(User::class)->ignore($this->user()->id), // Menolak email duplikat kecuali email milik pengguna saat ini.
            ], // Menutup kumpulan aturan untuk alamat email.
        ]; // Menutup array dan mengembalikan seluruh aturan validasi.
    } // Menutup blok method rules.
} // Menutup blok definisi kelas.
