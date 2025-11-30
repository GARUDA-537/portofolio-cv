<?php

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Forward Vercel requests to Laravel
$app = require __DIR__ . '/../bootstrap/app.php';

// Set storage paths to /tmp for Vercel (Read-Only Filesystem)
if (isset($_ENV['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');

    if (!is_dir('/tmp/storage')) {
        mkdir('/tmp/storage', 0777, true);
        mkdir('/tmp/storage/framework/views', 0777, true);
        mkdir('/tmp/storage/framework/cache', 0777, true);
        mkdir('/tmp/storage/framework/sessions', 0777, true);
        mkdir('/tmp/storage/logs', 0777, true);
    }
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
