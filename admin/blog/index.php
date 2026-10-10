<?php
// admin/blog/index.php
$pageTitle = 'المدونة';
require_once __DIR__ . '/../includes/header.php';

$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 15;
$offset = ($page - 1) * $perPage;

$total = (int)$pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn();
$pages = max(1, (int)ceil($total / $perPage));

$stmt = $pdo->prepare("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT $perPage OFFSET $offset");
$stmt->execute();
$posts = $stmt->fetchAll();
?>

<div class="card">
  <div class="card-header">
    <h2><?= icon('blog', 18) ?> إدارة مقالات المدونة (<?= $total ?>)</h2>
    <a href="create.php" class="btn gold">
      <?= icon('plus', 16) ?>
      <span>مقال جديد</span>
    </a>
  </div>

  <?php if ($posts): ?>
  <div class="table-wrap">
    <table class="data-table">
      <thead>
        <tr>
          <th>الصورة</th>
          <th>العنوان</th>
          <th>التصنيف</th>
          <th>الحالة</th>
          <th>المشاهدات</th>
          <th>التاريخ</th>
          <th style="width:130px">إجراءات</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($posts as $p): ?>
        <tr>
          <td>
            <?php if ($p['featured_image']): ?>
              <img src="<?= e($p['featured_image']) ?>" class="thumb" alt="">
            <?php else: ?>
              <div style="width:48px;height:48px;border-radius:8px;background:var(--bg-3);display:flex;align-items:center;justify-content:center;color:var(--text-4)">
                <?= icon('image', 18) ?>
              </div>
            <?php endif; ?>
          </td>
          <td>
            <strong style="color:var(--text-1);display:block"><?= e($p['title']) ?></strong>
            <small style="color:var(--text-3);font-size:.75rem"><?= e($p['slug']) ?></small>
          </td>
          <td><?= e($p['category']) ?></td>
          <td>
            <span class="badge <?= $p['status'] ?>">
              <?= $p['status'] === 'published' ? 'منشور' : 'مسودة' ?>
            </span>
          </td>
          <td><?= (int)$p['views'] ?></td>
          <td><?= date('Y-m-d', strtotime($p['created_at'])) ?></td>
          <td>
            <div class="actions-row">
              <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= urlencode($p['slug']) ?>"
                 target="_blank"
                 class="icon-btn"
                 title="معاينة">
                <?= icon('eye', 15) ?>
              </a>
              <a href="edit.php?id=<?= $p['id'] ?>"
                 class="icon-btn"
                 title="تعديل">
                <?= icon('edit', 15) ?>
              </a>
              <a href="delete.php?id=<?= $p['id'] ?>&csrf=<?= csrf_token() ?>"
                 class="icon-btn danger"
                 data-confirm="سيتم حذف المقال نهائياً. هل أنت متأكد؟"
                 title="حذف">
                <?= icon('trash', 15) ?>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php if ($pages > 1): ?>
  <div class="pagination">
    <?php for ($i = 1; $i <= $pages; $i++): ?>
      <?php if ($i == $page): ?>
        <span class="current"><?= $i ?></span>
      <?php else: ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
  <?php endif; ?>

  <?php else: ?>
    <div style="text-align:center;padding:3rem 1rem;color:var(--text-3)">
      <div style="display:inline-flex;width:56px;height:56px;border-radius:14px;background:var(--bg-3);align-items:center;justify-content:center;margin-bottom:1rem;color:var(--text-4)">
        <?= icon('blog', 26) ?>
      </div>
      <h3 style="color:var(--text-1);margin-bottom:.5rem;font-size:1rem">لا توجد مقالات بعد</h3>
      <p style="margin-bottom:1.5rem;font-size:.88rem">ابدأ بإضافة أول مقال للمدونة</p>
      <a href="create.php" class="btn gold"><?= icon('plus', 16) ?> إضافة مقال</a>
    </div>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>