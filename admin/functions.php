<?php
// admin/functions.php
require_once __DIR__ . '/config.php';

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function csrf_token() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_field() {
    return '<input type="hidden" name="csrf" value="' . csrf_token() . '">';
}

function verify_csrf() {
    $t = $_POST['csrf'] ?? '';
    if (!$t || !hash_equals($_SESSION['csrf'] ?? '', $t)) {
        http_response_code(419);
        die('CSRF token mismatch.');
    }
}

function slugify($text) {
    $text = trim($text);
    $text = preg_replace('/[\s]+/u', '-', $text);
    $text = preg_replace('/[^\p{Arabic}\p{L}\p{N}\-]/u', '', $text);
    $text = trim($text, '-');
    return $text ?: 'post-' . time();
}

function unique_slug($pdo, $table, $slug, $id = null) {
    $base = $slug;
    $i = 1;
    while (true) {
        $sql = "SELECT id FROM $table WHERE slug = ?" . ($id ? " AND id != ?" : "");
        $params = $id ? [$slug, $id] : [$slug];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        if (!$stmt->fetch()) return $slug;
        $slug = $base . '-' . (++$i);
    }
}

function setting($key, $default = '') {
    global $pdo;
    static $cache = null;
    if ($cache === null) {
        $cache = [];
        foreach ($pdo->query("SELECT `key`,`value` FROM settings") as $r) {
            $cache[$r['key']] = $r['value'];
        }
    }
    return $cache[$key] ?? $default;
}

function upload_file($fileKey, $subdir, $allowed = ['jpg','jpeg','png','webp','gif','mp4']) {
    if (empty($_FILES[$fileKey]['name']) || $_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) return null;
    if ($_FILES[$fileKey]['size'] > 100 * 1024 * 1024) return null;

    $dir = UPLOAD_DIR . $subdir . '/';
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $name = date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    if (!move_uploaded_file($_FILES[$fileKey]['tmp_name'], $dir . $name)) return null;
    return UPLOAD_URL . $subdir . '/' . $name;
}

function flash($msg, $type = 'success') {
    $_SESSION['flash'] = ['msg' => $msg, 'type' => $type];
}

function get_flash() {
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function is_logged_in() {
    return !empty($_SESSION['admin_id']);
}

function current_user() {
    global $pdo;
    if (!is_logged_in()) return null;
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = ?");
    $stmt->execute([$_SESSION['admin_id']]);
    return $stmt->fetch();
}

function time_ago_ar($datetime) {
    $diff = time() - strtotime($datetime);
    if ($diff < 60) return 'الآن';
    if ($diff < 3600) return floor($diff / 60) . ' دقيقة';
    if ($diff < 86400) return floor($diff / 3600) . ' ساعة';
    if ($diff < 2592000) return floor($diff / 86400) . ' يوم';
    return date('Y-m-d', strtotime($datetime));
}