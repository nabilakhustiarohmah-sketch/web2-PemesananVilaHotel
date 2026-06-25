<?php

$dirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Paksa clear cached services agar tidak pakai cache rusak
$cachedServices = __DIR__ . '/../bootstrap/cache/services.php';
if (file_exists($cachedServices)) {
    unlink($cachedServices);
}

$cachedPackages = __DIR__ . '/../bootstrap/cache/packages.php';
if (file_exists($cachedPackages)) {
    unlink($cachedPackages);
}

require __DIR__ . '/../public/index.php';