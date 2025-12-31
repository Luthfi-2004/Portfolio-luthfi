<?php
// Tampilkan semua error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
echo "<strong>SYSTEM CHECK:</strong>\n";

// Cek keberadaan folder penting
$files = scandir(__DIR__ . '/../');
echo "Root directory contents:\n";
print_r($files);

if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    echo "\n[FATAL] Folder 'vendor' TIDAK DITEMUKAN. \n";
    echo "Penyebab: 'composer install' tidak jalan atau 'outputDirectory' membuang folder ini.";
    die();
} else {
    echo "\n[OK] Folder 'vendor' ditemukan.\n";
}

if (!file_exists(__DIR__ . '/../bootstrap/app.php')) {
    echo "\n[FATAL] Folder 'bootstrap' TIDAK DITEMUKAN.";
    die();
}

echo "\n[INFO] Mencoba menyalakan Laravel...\n";
echo "</pre>";

// Jika lolos pengecekan, baru jalankan Laravel
require __DIR__ . '/../public/index.php';