<?php

// Buat direktori yang dibutuhkan di /tmp (writable di Vercel)
$directories = [
    '/tmp/storage/app',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/views',
    '/tmp/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

require __DIR__ . '/../public/index.php';