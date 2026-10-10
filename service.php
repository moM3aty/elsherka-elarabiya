<?php
// service.php - قالب عام لكل صفحات الخدمات
// يُستدعى من services/*.php مع تمرير $serviceSlug

require_once __DIR__ . '/../config.php';

$slug = $serviceSlug ?? ($_GET['slug'] ?? '');
if (!$slug) { header('Location: ' . SITE_URL); exit; }

$stmt = $pdo->prepare("SELECT * FROM services WHERE slug = ?");
$stmt->execute([$slug]);
$srv = $stmt->fetch();

if (!$srv) {
    http_response_code(404);
    $pageTitle = 'الخدمة غير متوفرة';
    $srv = [
        'slug' => $slug,
        'title' => 'الخدمة غير متوفرة',
        'meta_description' => 'هذه الخدمة غير موجودة.',
        'content' => '<p>عذراً، الصفحة المطلوبة غير متوفرة حالياً.</p>',
    ];
}

$pageTitle       = $srv['title'] . ' | الشركة العربية للمنازل ذ.م.م';
$pageDescription = $srv['meta_description'] ?: mb_substr(strip_tags($srv['content']), 0, 160);
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <h1 class="hero-title"><span class="gold-text"><?= e($srv['title']) ?></span></h1>
    <?php if ($srv['meta_description']): ?>
      <p class="hero-description"><?= e($srv['meta_description']) ?></p>
    <?php endif; ?>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بنا: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">واتساب سريع</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 5rem;">
  <div class="post-content" style="font-size:1.05rem;line-height:2;color:var(--text-body,#c8d2e4)">
    <?= $srv['content'] /* HTML من محرر TinyMCE */ ?>
  </div>
</section>

<section class="container" style="margin-bottom: 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تنفيذ هذه الخدمة لموقعك؟</h3>
    <p>فريقنا مستعد لمعاينة موقعك مجاناً وتقديم عرض سعر دقيق في كافة مناطق الكويت.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالمهندس: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>