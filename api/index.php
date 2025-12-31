<?php

// Paksa error tampil di layar browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cek apakah Composer berhasil jalan di server Vercel
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    http_response_code(500);
    die("<h1>FATAL ERROR: Vendor directory missing.</h1><p>Vercel gagal menjalankan 'composer install'. Cek Build Logs.</p>");
}

// Cek apakah file entry point Laravel ada
if (!file_exists(__DIR__ . '/../public/index.php')) {
    http_response_code(500);
    die("<h1>FATAL ERROR: Public index missing.</h1><p>File public/index.php tidak ditemukan.</p>");
}

// Jalankan Laravel
require __DIR__ . '/../public/index.php';