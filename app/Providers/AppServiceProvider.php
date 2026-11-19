<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Mendaftarkan layanan aplikasi ke dalam container.
     */
    public function register(): void
    {
        //
    }

    /**
     * Menyiapkan layanan aplikasi setelah container terdaftar.
     */
    public function boot(): void
    {
        // Meminta browser mengambil aset lebih awal dengan paling banyak tiga permintaan bersamaan.
        Vite::prefetch(concurrency: 3);
    }
}
