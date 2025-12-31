<?php

// Konfigurasi Error Reporting Super Agresif
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Cek file vital
    if (!file_exists(__DIR__ . '/../public/index.php')) {
        throw new Exception('File public/index.php hilang!');
    }

    // Jalankan Laravel dalam blok Try-Catch
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    // Jika Laravel crash, tangkap errornya dan tampilkan
    http_response_code(500);
    echo "<div style='background:#f8d7da; color:#721c24; padding:20px; font-family:monospace; border:1px solid #f5c6cb; margin:20px;'>";
    echo "<h1>🔥 LARAVEL CRASHED 🔥</h1>";
    echo "<h3>Error Message:</h3>";
    echo "<pre style='font-size:16px; font-weight:bold;'>" . htmlspecialchars($e->getMessage()) . "</pre>";
    echo "<h3>File:</h3>";
    echo "<p>" . $e->getFile() . " on line " . $e->getLine() . "</p>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}