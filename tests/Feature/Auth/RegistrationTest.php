<?php

// Memastikan halaman pendaftaran dapat dibuka.
test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

// Memastikan data pendaftaran valid membuat sesi pengguna baru.
test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
