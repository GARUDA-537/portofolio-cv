<?php

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Forward Vercel requests to Laravel
$app = require __DIR__ . '/../bootstrap/app.php';

// Set storage paths to /tmp for Vercel (Read-Only Filesystem)
if (isset($_ENV['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
