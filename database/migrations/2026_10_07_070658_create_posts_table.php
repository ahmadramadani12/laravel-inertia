<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Membuat tabel untuk menyimpan judul dan isi postingan. */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('konten');
            $table->timestamps();
        });
    }

    /** Menghapus tabel postingan saat migrasi dibatalkan. */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
