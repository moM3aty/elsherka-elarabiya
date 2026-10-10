<?php
// admin/services/edit.php
$pageTitle = 'تعديل خدمة';
require_once __DIR__ . '/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$stmt->execute([$id]);
$s = $stmt->fetch();
if (!$s) { flash('الخدمة غير موجودة', 'error'); redirect('index.php'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $title = trim($_POST['title'] ?? '');
    $meta  = trim($_POST['meta_description'] ?? '');
    $content = $_POST['content'] ?? '';

    if (!$title) {
        flash('العنوان مطلوب', 'error');
    } else {
        $stmt = $pdo->prepare("UPDATE services SET title=?, meta_description=?, content=? WHERE id=?");
        $stmt->execute([$title, $meta, $content, $id]);
        flash('تم تحديث الخدمة بنجاح');
        redirect('edit.php?id=' . $id);
    }
}
?>

<div class="card">
  <div class="card-header">
    <h2><?= icon('edit', 18) ?> تعديل الخدمة: <code style="color:var(--gold-1);font-size:.88rem;background:var(--bg-2);padding:.15rem .5rem;border-radius:6px"><?= e($s['slug']) ?></code></h2>
    <div style="display:flex;gap:.5rem;flex-wrap:wrap">
      <a href="<?= SITE_URL ?>/services/<?= e($s['slug']) ?>.php" target="_blank" class="btn outline sm">
        <?= icon('eye', 14) ?> معاينة
      </a>
      <a href="index.php" class="btn outline sm"><?= icon('arrow-right', 14) ?> رجوع</a>
    </div>
  </div>

  <form method="post">
    <?= csrf_field() ?>

    <div class="form-grid">
      <div class="full">
        <label>عنوان الخدمة *</label>
        <input type="text" name="title" required value="<?= e($s['title']) ?>">
      </div>

      <div class="full">
        <label>الوصف المختصر (Meta Description) — يظهر في محركات البحث</label>
        <textarea name="meta_description" rows="2" maxlength="160" placeholder="وصف قصير للخدمة (حتى 160 حرف)"><?= e($s['meta_description']) ?></textarea>
        <span style="font-size:.75rem;color:var(--text-3);display:block;margin-top:.3rem">
          يساعد في تحسين ظهور الخدمة في Google
        </span>
      </div>

      <div class="full">
        <label>محتوى صفحة الخدمة</label>
        <textarea name="content" class="rich-editor" placeholder="اكتب محتوى الخدمة هنا... يمكنك إضافة عناوين، قوائم، صور، روابط..."><?= e($s['content']) ?></textarea>
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn gold">
        <?= icon('save', 16) ?>
        <span>حفظ التعديلات</span>
      </button>
      <a href="index.php" class="btn outline">إلغاء</a>
    </div>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof initEditor === 'function') initEditor();
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>