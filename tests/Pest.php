<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| KASUS PENGUJIAN
|--------------------------------------------------------------------------
|
| Closure pada fungsi pengujian terikat ke kelas kasus PHPUnit tertentu.
| Konfigurasi ini memakai TestCase aplikasi dan me-refresh basis data untuk tes fitur.
|
*/

pest()->extend(TestCase::class)
    ->use(RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| EXPECTATION
|--------------------------------------------------------------------------
|
| Fungsi expect() menyediakan assertion untuk memeriksa nilai dalam pengujian.
| Ekstensi berikut menambahkan assertion khusus proyek untuk nilai satu.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| FUNGSI
|--------------------------------------------------------------------------
|
| Fungsi global dapat menjadi helper bersama agar kode pengujian tidak perlu diulang.
|
*/

// Helper contoh yang dapat digunakan lintas berkas pengujian.
function something()
{
    // ..
}
