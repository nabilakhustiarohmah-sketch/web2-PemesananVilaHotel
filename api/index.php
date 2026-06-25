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
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Selalu copy cache ke /tmp (overwrite)
$cacheSource = __DIR__ . '/../bootstrap/cache';
$cacheDest = '/tmp/bootstrap/cache';
if (is_dir($cacheSource)) {
    foreach (glob($cacheSource . '/*.php') as $file) {
        copy($file, $cacheDest . '/' . basename($file));
    }
}

require __DIR__ . '/../public/index.php';