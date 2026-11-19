<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Mengisi basis data dengan satu akun contoh untuk pengembangan.
     */
    public function run(): void
    {
        // Aktifkan baris ini jika diperlukan sepuluh akun acak untuk pengujian manual.
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
