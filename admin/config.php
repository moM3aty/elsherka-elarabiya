<?php
// admin/config.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'u439595347_elsharka');
define('DB_USER', 'u439595347_admin');
define('DB_PASS', 'uzGt!n*;z4A');
define('DB_CHARSET', 'utf8mb4');

define('SITE_URL', 'https://elsharkaelarabiya.com');
define('ADMIN_URL', SITE_URL . '/admin');
define('UPLOAD_DIR', dirname(__DIR__) . '/uploads/');
define('UPLOAD_URL', SITE_URL . '/uploads/');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    die('Database connection error. Please contact admin.');
}

date_default_timezone_set('Asia/Kuwait');