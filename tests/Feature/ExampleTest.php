<?php

// Memastikan halaman awal merespons permintaan dengan sukses.
it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
