<?php

// -------------------------------------------------------------------------
// VERCEL SURVIVAL MODE: BYPASS TOXIC CACHE
// -------------------------------------------------------------------------
// Kode ini memaksa Laravel untuk mencari file cache di folder /tmp (yang kosong)
// daripada membaca file 'bootstrap/cache/config.php' yang rusak (bawaan laptop).
// -------------------------------------------------------------------------

$tmp = '/tmp'; // Folder sementara di Vercel yang aman

putenv("APP_CONFIG_CACHE={$tmp}/config.php");
putenv("APP_SERVICES_CACHE={$tmp}/services.php");
putenv("APP_PACKAGES_CACHE={$tmp}/packages.php");
putenv("APP_ROUTES_CACHE={$tmp}/routes.php");
putenv("VIEW_COMPILED_PATH={$tmp}");
putenv("SESSION_DRIVER=array"); // Paksa array biar tidak butuh file permission
putenv("LOG_CHANNEL=stderr");   // Paksa log ke stderr

// -------------------------------------------------------------------------
// ERROR REPORTING (Jaga-jaga kalau masih crash)
// -------------------------------------------------------------------------
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Cek apakah file index asli ada
    if (!file_exists(__DIR__ . '/../public/index.php')) {
        throw new Exception('CRITICAL: File public/index.php tidak ditemukan.');
    }

    // JALANKAN LARAVEL
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    // Tampilan Error Darurat
    http_response_code(500);
    echo "<div style='font-family:monospace; background:#1a202c; color:#e2e8f0; padding:2rem; height:100vh; overflow:auto;'>";
    echo "<h1 style='color:#fc8181; border-bottom:1px solid #4a5568; padding-bottom:1rem;'>🔥 SYSTEM CRASHED 🔥</h1>";
    echo "<h3 style='color:#63b3ed'>Error Message:</h3>";
    echo "<pre style='font-size:1.1rem; color:#fff'>" . htmlspecialchars($e->getMessage()) . "</pre>";
    echo "<h3 style='color:#63b3ed'>Location:</h3>";
    echo "<p>" . $e->getFile() . " on line <strong style='color:#f6e05e'>" . $e->getLine() . "</strong></p>";
    echo "<h3 style='color:#63b3ed'>Trace:</h3>";
    echo "<pre style='font-size:0.8rem; opacity:0.8'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}