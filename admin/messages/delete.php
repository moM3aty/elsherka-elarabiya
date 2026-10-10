<?php
require_once __DIR__ . '/../auth.php';
if (!hash_equals($_SESSION['csrf'] ?? '', $_GET['csrf'] ?? '')) { flash('طلب غير صالح','error'); redirect('index.php'); }
$pdo->prepare("DELETE FROM messages WHERE id=?")->execute([(int)($_GET['id'] ?? 0)]);
flash('تم حذف الرسالة');
redirect('index.php');