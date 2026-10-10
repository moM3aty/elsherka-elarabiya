<?php
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/icons.php';

$user = current_user();
$userName = $user['full_name'] ?: $user['username'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?= e($pageTitle ?? 'لوحة التحكم') ?> — الشركة العربية</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= ADMIN_URL ?>/assets/css/admin.css?v=<?= @filemtime(__DIR__ . '/../assets/css/admin.css') ?: time() ?>">
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>◆</text></svg>">

<!-- Quill.js — محرر مجاني 100% بدون API Key -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<!-- Chart.js — للرسوم البيانية -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body>
<div class="admin-layout">
  <div class="overlay" id="overlay"></div>
  <?php include __DIR__ . '/sidebar.php'; ?>

  <main class="main-content">
    <div class="topbar">
      <div class="topbar-left">
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="القائمة"><?= icon('menu', 20) ?></button>
        <div class="topbar-title">
          <h1><?= e($pageTitle ?? 'لوحة التحكم') ?></h1>
          <span class="topbar-crumb">الشركة العربية للمنازل — الإدارة</span>
        </div>
      </div>
      <div class="topbar-right">
        <button class="topbar-icon-btn" title="بحث"><?= icon('search', 16) ?></button>
        <button class="topbar-icon-btn" title="الإشعارات"><?= icon('bell', 16) ?></button>
        <div class="user-box">
          <div class="user-info">
            <strong><?= e($userName) ?></strong>
            <span><?= ($user['role'] ?? '') === 'super' ? 'مدير عام' : 'محرر' ?></span>
          </div>
          <div class="user-avatar"><?= e(mb_substr($user['username'], 0, 1)) ?></div>
        </div>
      </div>
    </div>

    <?php if (function_exists('get_flash') && ($f = get_flash())): ?>
      <div class="alert <?= e($f['type']) ?>">
        <span class="alert-ico">
          <?= $f['type'] === 'success' ? icon('check', 16) : ($f['type'] === 'error' ? icon('x', 16) : icon('info', 16)) ?>
        </span>
        <span><?= e($f['msg']) ?></span>
      </div>
    <?php endif; ?>