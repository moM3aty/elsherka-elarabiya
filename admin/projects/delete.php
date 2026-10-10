<?php
require_once __DIR__ . '/../auth.php';
$id = (int)($_GET['id'] ?? 0);
if (!hash_equals($_SESSION['csrf'] ?? '', $_GET['csrf'] ?? '')) { flash('طلب غير صالح','error'); redirect('index.php'); }
$pdo->prepare("DELETE FROM projects WHERE id=?")->execute([$id]);
flash('تم الحذف');
redirect('index.php');