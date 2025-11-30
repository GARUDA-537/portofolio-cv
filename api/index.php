<?php

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Forward Vercel requests to Laravel
$app = require __DIR__ . '/../bootstrap/app.php';

// Set storage paths to /tmp for Vercel (Read-Only Filesystem)
if (isset($_ENV['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');

    if (!is_dir('/tmp/storage/logs')) {
        mkdir('/tmp/storage/logs', 0777, true);
    }

    // Copy database to /tmp if it doesn't exist
    $dbPath = __DIR__ . '/../database/database.sqlite';
    $tmpDbPath = '/tmp/database.sqlite';
    
    if (file_exists($dbPath) && !file_exists($tmpDbPath)) {
        copy($dbPath, $tmpDbPath);
    }
    
    // Point Laravel to the /tmp database
    if (file_exists($tmpDbPath)) {
        $_ENV['DB_DATABASE'] = $tmpDbPath;
        putenv("DB_DATABASE={$tmpDbPath}");
    }
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
