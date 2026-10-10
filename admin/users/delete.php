<?php
require_once __DIR__ . '/../auth.php';
if (!hash_equals($_SESSION['csrf'] ?? '', $_GET['csrf'] ?? '')) { flash('طلب غير صالح','error'); redirect('index.php'); }
$id = (int)$_GET['id'];
if ($id === (int)$_SESSION['admin_id']) { flash('لا يمكنك حذف حسابك','error'); redirect('index.php'); }
$pdo->prepare("DELETE FROM admin_users WHERE id=?")->execute([$id]);
flash('تم الحذف');
redirect('index.php');