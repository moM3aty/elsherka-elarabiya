<?php
// includes/head.php
// متغيرات متوقعة: $pageTitle, $pageDescription, $pageImage, $canonical
$pageTitle       = $pageTitle       ?? 'الشركة العربية للمنازل للتجارة العامة والمقاولات ذ.م.م';
$pageDescription = $pageDescription ?? 'خدمات التشطيب والتصميم الداخلي والديكور في الكويت.';
$pageImage       = $pageImage       ?? '';
$canonical       = $canonical       ?? SITE_URL . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>">
  <meta property="og:title" content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($pageDescription) ?>">
  <?php if ($pageImage): ?><meta property="og:image" content="<?= e($pageImage) ?>"><?php endif; ?>
  <link rel="canonical" href="<?= e($canonical) ?>">
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220%22%20%22100%22%20%22100%22><text y=%22.9em%22 font-size=%2290%22>🏛️</text></svg>">
</head>
<body>