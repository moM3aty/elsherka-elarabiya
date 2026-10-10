<?php
// blog-post.php
require_once __DIR__ . '/admin/config.php';

$slug = $_GET['slug'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE slug = ? AND status='published'");
$stmt->execute([$slug]);
$post = $stmt->fetch();
if (!$post) { header('Location: blog.php'); exit; }

// زيادة المشاهدات
$pdo->prepare("UPDATE blog_posts SET views = views + 1 WHERE id = ?")->execute([$post['id']]);

$related = $pdo->prepare("SELECT * FROM blog_posts WHERE status='published' AND id != ? AND category = ? ORDER BY published_at DESC LIMIT 3");
$related->execute([$post['id'], $post['category']]);
$related = $related->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($post['meta_title'] ?: $post['title']) ?> | الشركة العربية للمنازل</title>
<meta name="description" content="<?= htmlspecialchars($post['meta_description'] ?: $post['excerpt']) ?>">
<meta property="og:title" content="<?= htmlspecialchars($post['title']) ?>">
<meta property="og:image" content="<?= htmlspecialchars($post['featured_image'] ?: '') ?>">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Header (انسخ نفس الهيدر من blog.php) -->
<header class="header">
  <div class="header-container">
    <a href="index.html" class="logo-brand">
      <div class="logo-badge">ع</div>
      <div class="logo-text">
        <span class="logo-title">الشركة العربية للمنازل</span>
        <span class="logo-subtitle">للتجارة العامة والمقاولات ذ.م.م</span>
      </div>
    </a>
    <nav>
      <ul class="nav-menu">
        <li><a href="index.html" class="nav-link">الرئيسية</a></li>
        <li><a href="projects.html" class="nav-link">المشاريع</a></li>
        <li><a href="prices.html" class="nav-link">الأسعار</a></li>
        <li><a href="blog.php" class="nav-link active">المدونة</a></li>
        <li><a href="about.html" class="nav-link">من نحن</a></li>
        <li><a href="contact.html" class="nav-link">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a href="tel:65600310" class="btn-header-call"><span>65600310</span></a>
    </div>
  </div>
</header>

<article style="max-width:900px;margin:3rem auto;padding:0 1.5rem">
  <nav style="color:var(--text-muted,#9aa8bf);font-size:.9rem;margin-bottom:1.5rem">
    <a href="index.html" style="color:inherit">الرئيسية</a> • 
    <a href="blog.php" style="color:inherit">المدونة</a> • 
    <span><?= htmlspecialchars($post['category']) ?></span>
  </nav>

  <h1 style="font-size:2.2rem;color:#fff;line-height:1.4;margin-bottom:1rem"><?= htmlspecialchars($post['title']) ?></h1>

  <div style="display:flex;gap:1rem;color:var(--text-muted,#9aa8bf);font-size:.9rem;margin-bottom:2rem;flex-wrap:wrap">
    <span>📅 <?= date('Y-m-d', strtotime($post['published_at'] ?? $post['created_at'])) ?></span>
    <span>📁 <?= htmlspecialchars($post['category']) ?></span>
    <span>👁️ <?= (int)$post['views'] ?> مشاهدة</span>
  </div>

  <?php if ($post['featured_image']): ?>
    <img src="<?= htmlspecialchars($post['featured_image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" style="width:100%;border-radius:16px;margin-bottom:2rem">
  <?php endif; ?>

  <div class="post-content" style="font-size:1.1rem;line-height:2;color:#c8d2e4">
    <?= $post['content'] /* HTML من محرر TinyMCE */ ?>
  </div>

  <?php if ($post['tags']): ?>
  <div style="margin-top:2.5rem;padding-top:1.5rem;border-top:1px solid rgba(223,162,67,.2)">
    <strong style="color:var(--gold-light,#f2c26a)">الوسوم:</strong>
    <?php foreach (explode(',', $post['tags']) as $tag): ?>
      <span style="display:inline-block;padding:.3rem .8rem;background:rgba(223,162,67,.1);color:var(--gold,#dfa243);border-radius:50px;font-size:.85rem;margin:.3rem"><?= htmlspecialchars(trim($tag)) ?></span>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <div class="projects-featured-card" style="margin-top:3rem;text-align:center;padding:2.5rem 1.5rem">
    <h3>هل أعجبك هذا المقال؟</h3>
    <p>تواصل معنا الآن للحصول على استشارة مجانية ومعاينة موقعك.</p>
    <div style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;margin-top:1rem">
      <a href="tel:65600310" class="btn btn-gold">اتصل: 65600310</a>
      <a href="https://wa.me/96565600310" target="_blank" class="btn btn-outline">واتساب</a>
    </div>
  </div>
</article>

<?php if ($related): ?>
<section style="max-width:1200px;margin:4rem auto;padding:0 1.5rem">
  <h2 class="section-title">مقالات ذات صلة</h2>
  <div class="media-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1.5rem;margin-top:2rem">
    <?php foreach ($related as $r): ?>
    <a href="blog-post.php?slug=<?= urlencode($r['slug']) ?>" class="media-card" style="display:block;text-decoration:none;background:#131c30;border-radius:14px;overflow:hidden;border:1px solid rgba(223,162,67,.15)">
      <?php if ($r['featured_image']): ?><img src="<?= htmlspecialchars($r['featured_image']) ?>" style="width:100%;aspect-ratio:16/10;object-fit:cover"><?php endif; ?>
      <div style="padding:1.2rem">
        <h3 style="color:#fff;font-size:1rem;line-height:1.5"><?= htmlspecialchars($r['title']) ?></h3>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<footer class="footer">
  <div class="container">
    <div class="footer-bottom"><p>جميع الحقوق محفوظة © 2004 - <?= date('Y') ?> الشركة العربية للمنازل</p></div>
  </div>
</footer>

<style>
.post-content img{max-width:100%;height:auto;border-radius:12px;margin:1.5rem 0}
.post-content h2,.post-content h3,.post-content h4{color:#fff;margin:1.8rem 0 1rem;line-height:1.4}
.post-content p{margin-bottom:1.2rem}
.post-content a{color:var(--gold,#dfa243);text-decoration:underline}
.post-content ul,.post-content ol{margin:1rem 2rem 1.5rem}
.post-content blockquote{border-right:4px solid var(--gold,#dfa243);padding-right:1rem;color:#9aa8bf;font-style:italic;margin:1.5rem 0}
.post-content table{width:100%;border-collapse:collapse;margin:1.5rem 0}
.post-content table td,.post-content table th{border:1px solid rgba(223,162,67,.2);padding:.7rem}
</style>
</body>
</html>