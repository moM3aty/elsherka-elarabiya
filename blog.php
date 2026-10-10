<?php
// blog.php — نسخة محصّنة مع معالجة أخطاء شاملة
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

try {
    require_once __DIR__ . '/config.php';
} catch (Throwable $e) {
    http_response_code(500);
    die('خطأ في تحميل الإعدادات. تأكد من وجود config.php');
}

/* ============ قراءة آمنة للإعدادات ============ */
$pageSize = 9;
try {
    $v = setting('blog_page_size', '9');
    $pageSize = max(3, min(50, (int)$v ?: 9));
} catch (Throwable $e) { $pageSize = 9; }

$page = max(1, (int)($_GET['page'] ?? 1));
$offset = ($page - 1) * $pageSize;
$cat = trim($_GET['cat'] ?? '');

/* ============ بناء الاستعلام ============ */
try {
    $where = "WHERE status='published'";
    $params = [];
    if ($cat !== '') {
        $where .= " AND category = ?";
        $params[] = $cat;
    }

    $totalStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_posts $where");
    $totalStmt->execute($params);
    $total = (int)$totalStmt->fetchColumn();

    $pages = max(1, (int)ceil($total / $pageSize));

    $stmt = $pdo->prepare("SELECT * FROM blog_posts $where ORDER BY published_at DESC, id DESC LIMIT $pageSize OFFSET $offset");
    $stmt->execute($params);
    $posts = $stmt->fetchAll();

    $cats = $pdo->query("SELECT DISTINCT category FROM blog_posts WHERE status='published' AND category IS NOT NULL AND category!='' ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);

} catch (Throwable $e) {
    error_log('blog.php error: ' . $e->getMessage());
    $posts = [];
    $cats = [];
    $total = 0;
    $pages = 1;
}

$pageTitle = 'مدونة الشركة العربية للمنازل | نصائح التصميم والتشطيب في الكويت';
$pageDescription = 'أحدث مقالات ونصائح حول التصميم الداخلي والتشطيبات والديكور في الكويت من خبراء الشركة العربية للمنازل.';
$activeMenu = 'blog';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>أحدث المقالات والنصائح التصميمية</span></div>
    <h1 class="hero-title">مدونة <span class="gold-text">الشركة العربية للمنازل</span></h1>
    <p class="hero-description">
      استكشف أحدث مقالاتنا ونصائح خبرائنا في التصميم الداخلي والتشطيب والديكور في الكويت.
    </p>
  </div>
</section>

<?php if ($cats): ?>
<section class="container" style="margin-bottom:2rem">
  <div style="display:flex;flex-wrap:wrap;gap:.6rem;justify-content:center">
    <a href="blog.php" class="filter-btn<?= $cat === '' ? ' active' : '' ?>">الكل (<?= $total ?>)</a>
    <?php foreach ($cats as $c): ?>
      <a href="?cat=<?= urlencode($c) ?>" class="filter-btn<?= $cat === $c ? ' active' : '' ?>"><?= e($c) ?></a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<section class="container" style="margin-bottom:5rem">
  <?php if (!empty($posts)): ?>
  <div class="media-grid" id="projectsGrid">
    <?php foreach ($posts as $p): ?>
      <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= urlencode($p['slug']) ?>" class="media-card">
        <?php if (!empty($p['featured_image'])): ?>
          <div class="media-thumb-wrap">
            <img src="<?= e($p['featured_image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy">
          </div>
        <?php endif; ?>
        <div class="media-info">
          <h4 class="media-title" style="font-size:1.1rem;"><?= e($p['title']) ?></h4>
          <span class="media-category">
            <?= e($p['category']) ?> • <?= date('Y-m-d', strtotime($p['published_at'] ?? $p['created_at'])) ?>
          </span>
          <?php if (!empty($p['excerpt'])): ?>
            <p style="color:var(--text-muted);font-size:.88rem;line-height:1.7;margin-top:.5rem">
              <?= e(mb_substr(strip_tags($p['excerpt']), 0, 110)) ?>...
            </p>
          <?php endif; ?>
          <span style="color:var(--gold);font-weight:700;font-size:.88rem;display:block;margin-top:.7rem">اقرأ المزيد ←</span>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <?php if ($pages > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;margin-top:3rem;flex-wrap:wrap">
    <?php for ($i = 1; $i <= $pages; $i++):
      $url = '?page=' . $i . ($cat !== '' ? '&cat=' . urlencode($cat) : '');
    ?>
      <?php if ($i == $page): ?>
        <span style="padding:.5rem 1rem;background:var(--gold);color:#0a0f1c;border-radius:8px;font-weight:700"><?= $i ?></span>
      <?php else: ?>
        <a href="<?= $url ?>" style="padding:.5rem 1rem;background:var(--bg-card);color:var(--text-muted);border-radius:8px;text-decoration:none"><?= $i ?></a>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
  <?php endif; ?>

  <?php else: ?>
    <div style="text-align:center;padding:4rem 2rem;color:var(--text-muted);background:var(--bg-card);border-radius:16px;border:1px solid var(--border-subtle)">
      <div style="font-size:3rem;margin-bottom:1rem">📝</div>
      <h3 style="color:#fff;margin-bottom:.5rem">لا توجد مقالات منشورة بعد</h3>
      <p>عد قريباً لمقالاتنا الجديدة، أو تواصل معنا للحصول على استشارة فورية.</p>
      <div style="margin-top:1.5rem;display:flex;gap:1rem;justify-content:center;flex-wrap:wrap">
        <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل: <?= e($SITE_PHONE) ?></a>
        <a href="<?= SITE_URL ?>/index.php" class="btn btn-outline">العودة للرئيسية</a>
      </div>
    </div>
  <?php endif; ?>
</section>

<section class="container" style="margin-bottom:5rem">
  <div class="projects-featured-card" style="margin-bottom:0">
    <h3>هل ترغب في تنفيذ تصميم مشابه؟</h3>
    <p>فريقنا الهندسي مستعد لمقابلتك ومعاينة الموقع مجاناً.</p>
    <div style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>