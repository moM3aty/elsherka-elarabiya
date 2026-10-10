<?php
// projects.php
require_once __DIR__ . '/config.php';

$category = $_GET['cat'] ?? '';

$sql = "SELECT * FROM projects";
$params = [];
if ($category && $category !== 'all') {
    $sql .= " WHERE category LIKE ?";
    $params[] = "%$category%";
}
$sql .= " ORDER BY is_featured DESC, sort_order ASC, id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$items = $stmt->fetchAll();

/* عدادات التصنيفات */
$counts = ['all' => $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn()];
foreach (['videos','villas','dewaniya','decor','wood','paint'] as $c) {
    $st = $pdo->prepare("SELECT COUNT(*) FROM projects WHERE category LIKE ?");
    $st->execute(["%$c%"]);
    $counts[$c] = $st->fetchColumn();
}

$pageTitle       = 'معرض مشاريعنا وفيديوهات الأعمال | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'شاهد أكثر من 6000 مشروع تشطيب وديكور وتصميم داخلي موثقة بالصور والفيديوهات من مواقع العمل الحية في الكويت.';
$activeMenu      = 'projects';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="hero" style="padding-bottom: 2rem;">
  <div class="container hero-content">
    <div class="pill-badge"><span>معرض الأعمال الحية والفيديوهات الموثقة</span></div>
    <h1 class="hero-title">شاهد أعمالنا الميدانية في <span class="gold-text">مشاريع الكويت</span></h1>
    <p class="hero-description">
      أكثر من 6,000 مشروع تشطيب فاخر ومقاولات عامة وتصميم داخلي تم تنفيذها بأعلى المواصفات القياسية.
    </p>

    <div class="filter-tabs">
      <a href="?" class="filter-btn<?= !$category?' active':'' ?>">جميع الأعمال (<?= $counts['all'] ?>)</a>
      <a href="?cat=videos" class="filter-btn<?= $category==='videos'?' active':'' ?>">🎬 الفيديوهات (<?= $counts['videos'] ?>)</a>
      <a href="?cat=villas" class="filter-btn<?= $category==='villas'?' active':'' ?>">🏡 الفلل والقسائم (<?= $counts['villas'] ?>)</a>
      <a href="?cat=dewaniya" class="filter-btn<?= $category==='dewaniya'?' active':'' ?>">👥 ديوانيات (<?= $counts['dewaniya'] ?>)</a>
      <a href="?cat=decor" class="filter-btn<?= $category==='decor'?' active':'' ?>">✨ الديكور (<?= $counts['decor'] ?>)</a>
      <a href="?cat=wood" class="filter-btn<?= $category==='wood'?' active':'' ?>">🚪 الأخشاب (<?= $counts['wood'] ?>)</a>
      <a href="?cat=paint" class="filter-btn<?= $category==='paint'?' active':'' ?>">🎨 الأصباغ (<?= $counts['paint'] ?>)</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 5rem;">
  <div class="media-grid" id="projectsGrid">
    <?php if ($items): foreach ($items as $it):
        $thumb = $it['thumbnail'] ?: $it['media_url'];
    ?>
      <?php if ($it['media_type'] === 'video'): ?>
        <div class="media-card" data-category="<?= e($it['category']) ?>">
          <div class="media-thumb-wrap open-video-lightbox"
               data-src="<?= e($it['media_url']) ?>"
               data-title="<?= e($it['title']) ?>">
            <video preload="metadata" muted playsinline poster="<?= e($thumb) ?>">
              <source src="<?= e($it['media_url']) ?>" type="video/mp4">
            </video>
            <div class="play-badge-overlay"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
          </div>
          <div class="media-info">
            <h4 class="media-title"><?= e($it['title']) ?></h4>
            <span class="media-category">🎬 فيديو • <?= e($it['category']) ?></span>
          </div>
        </div>
      <?php else: ?>
        <div class="media-card open-image-lightbox"
             data-src="<?= e($it['media_url']) ?>"
             data-title="<?= e($it['title']) ?>"
             data-category="<?= e($it['category']) ?>">
          <div class="media-thumb-wrap">
            <img src="<?= e($it['media_url']) ?>" alt="<?= e($it['title']) ?>" loading="lazy">
          </div>
          <div class="media-info">
            <h4 class="media-title"><?= e($it['title']) ?></h4>
            <?php if ($it['description']): ?><span class="media-category">📸 <?= e(mb_substr($it['description'], 0, 60)) ?></span><?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; else: ?>
      <div style="text-align:center;padding:4rem;color:var(--text-muted);grid-column:1/-1;">
        <h3>لا توجد عناصر في هذا التصنيف بعد</h3>
        <p>سيتم عرض الأعمال هنا تلقائياً عند إضافتها من لوحة التحكم.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="container" style="margin-bottom: 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تنفيذ تصميم مشابه لمنزلك أو قسيمتك؟</h3>
    <p>فريقنا الهندسي مستعد لمقابلتك ومعاينة الموقع مجاناً وتقديم مقترح ثلاثي الأبعاد وعرض سعر دقيق.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold"><span>اتصل بنا الآن: <?= e($SITE_PHONE) ?></span></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline"><span>محادثة واتساب سريعة</span></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>