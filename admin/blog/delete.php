<?php
require_once __DIR__ . '/../auth.php';
$id = (int)($_GET['id'] ?? 0);
$csrf = $_GET['csrf'] ?? '';
if (!hash_equals($_SESSION['csrf'] ?? '', $csrf)) { flash('طلب غير صالح','error'); redirect('index.php'); }

$stmt = $pdo->prepare("SELECT featured_image FROM blog_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();
if ($post) {
    if ($post['featured_image']) {
        $path = str_replace(UPLOAD_URL, UPLOAD_DIR, $post['featured_image']);
        if (is_file($path)) @unlink($path);
    }
    $pdo->prepare("DELETE FROM blog_posts WHERE id = ?")->execute([$id]);
    flash('تم حذف المقال');
}
redirect('index.php');