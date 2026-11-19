<?php

use App\Models\User;

// Memastikan halaman masuk dapat dibuka oleh pengunjung.
test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

// Memastikan kredensial valid membuat pengguna terautentikasi dan diarahkan ke dasbor.
test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

// Memastikan kata sandi yang salah tidak membuat sesi terautentikasi.
test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

// Memastikan logout mengakhiri autentikasi dan kembali ke halaman awal.
test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});
