<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Muat halaman pemeliharaan statis jika aplikasi sedang dalam mode pemeliharaan.
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Daftarkan autoloader Composer agar kelas aplikasi dan dependensi tersedia.
require __DIR__.'/../vendor/autoload.php';

// Inisialisasi aplikasi lalu teruskan permintaan HTTP yang masuk.
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
