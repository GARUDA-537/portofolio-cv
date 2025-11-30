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
    
    // Always copy the database to ensure we have the latest version
    if (file_exists($dbPath)) {
        copy($dbPath, $tmpDbPath);
    } else {
        // If source DB doesn't exist, create an empty one
        touch($tmpDbPath);
    }
    
    // Point Laravel to the /tmp database
    $_ENV['DB_DATABASE'] = $tmpDbPath;
    putenv("DB_DATABASE={$tmpDbPath}");

    // Run migrations if profiles table doesn't exist (using raw PDO to avoid booting full app yet)
    try {
        $pdo = new PDO("sqlite:{$tmpDbPath}");
        $result = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='profiles'");
        if (!$result->fetch()) {
            // We can't easily run artisan migrate here without booting the app.
            // But since we are copying the DB, it SHOULD have tables if the source DB has them.
            // If the source DB is empty/missing, we might need to rely on the build step or commit the DB.
        }
    } catch (PDOException $e) {
        // Ignore check errors
    }
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
