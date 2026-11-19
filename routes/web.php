<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

/*
|--------------------------------------------------------------------------
| DASBOR
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| POSTINGAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Rute berikut mengelola daftar, pembuatan, penyimpanan, dan penghapusan postingan.
    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy');

    /*
    |--------------------------------------------------------------------------
    | PROFIL
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTENTIKASI
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
