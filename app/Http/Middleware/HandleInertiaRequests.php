<?php

namespace App\Http\Middleware; // Menetapkan namespace middleware agar dikenali oleh aplikasi.

use Illuminate\Http\Request; // Mengimpor objek request untuk membaca permintaan HTTP.
use Inertia\Middleware; // Mengimpor middleware dasar dari Inertia.

class HandleInertiaRequests extends Middleware // Mendefinisikan middleware Inertia khusus aplikasi.
{
    // Membuka blok definisi kelas.
    /**
     * Menentukan template utama yang dimuat saat kunjungan halaman pertama.
     *
     * @var string
     */
    protected $rootView = 'app'; // Memilih template utama yang digunakan saat halaman pertama dimuat.

    /**
     * Menentukan versi aset yang sedang digunakan.
     */
    public function version(Request $request): ?string // Menentukan versi aset untuk kebutuhan cache Inertia.
    { // Membuka blok method version.
        return parent::version($request); // Menggunakan mekanisme versi aset bawaan Inertia.
    } // Menutup blok method version.

    /**
     * Menentukan properti yang dibagikan secara default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array // Menentukan data tambahan yang dibagikan ke seluruh halaman Inertia.
    { // Membuka blok method share.
        return [ // Memulai array properti yang dikirim ke halaman.
            ...parent::share($request), // Menyertakan properti bersama bawaan dari middleware Inertia.
            'auth' => [ // Membuat properti auth untuk mengelompokkan data autentikasi.
                'user' => $request->user(), // Menyertakan pengguna yang sedang login, atau null jika belum login.
            ], // Menutup array properti auth.
        ]; // Menutup dan mengembalikan array properti bersama.
    } // Menutup blok method share.
} // Menutup blok definisi kelas.
