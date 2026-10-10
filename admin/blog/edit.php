<?php
// admin/blog/edit.php
$pageTitle = 'تعديل مقال';
require_once __DIR__ . '/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();
if (!$post) { flash('المقال غير موجود', 'error'); redirect('index.php'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $title = trim($_POST['title'] ?? '');
    $slug  = slugify($_POST['slug'] ?? $title);
    $slug  = unique_slug($pdo, 'blog_posts', $slug, $id);
    $cat   = trim($_POST['category'] ?? 'أخبار');
    $status= in_array($_POST['status'] ?? 'draft', ['draft','published']) ? $_POST['status'] : 'draft';
    $excerpt = trim($_POST['excerpt'] ?? '');
    $content = $_POST['content'] ?? '';
    $metaT = trim($_POST['meta_title'] ?? '');
    $metaD = trim($_POST['meta_description'] ?? '');
    $tags  = trim($_POST['tags'] ?? '');

    $img = upload_file('featured_image', 'blog', ['jpg','jpeg','png','webp','gif']);
    if (!$img) $img = $post['featured_image'];

    if (isset($_POST['remove_image']) && $_POST['remove_image'] === '1') $img = null;

    $publishedAt = $post['published_at'];
    if ($status === 'published' && !$publishedAt) $publishedAt = date('Y-m-d H:i:s');

    $stmt = $pdo->prepare("UPDATE blog_posts SET title=?,slug=?,excerpt=?,content=?,featured_image=?,category=?,tags=?,status=?,meta_title=?,meta_description=?,published_at=? WHERE id=?");
    $stmt->execute([$title,$slug,$excerpt,$content,$img,$cat,$tags,$status,$metaT,$metaD,$publishedAt,$id]);
    flash('تم تحديث المقال بنجاح');
    redirect('edit.php?id=' . $id);
}
?>

<div class="card">
  <div class="card-header">
    <h2><?= icon('edit', 18) ?> تعديل: <?= e($post['title']) ?></h2>
    <div style="display:flex;gap:.5rem;flex-wrap:wrap">
      <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= urlencode($post['slug']) ?>" target="_blank" class="btn outline sm">
        <?= icon('eye', 14) ?> معاينة
      </a>
      <a href="index.php" class="btn outline sm"><?= icon('arrow-right', 14) ?> رجوع</a>
    </div>
  </div>

  <form method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-grid">
      <div>
        <label>عنوان المقال *</label>
        <input type="text" name="title" required data-slug-source="#slugInput" value="<?= e($post['title']) ?>">
      </div>
      <div>
        <label>الرابط (Slug)</label>
        <input type="text" name="slug" id="slugInput" data-slug-target value="<?= e($post['slug']) ?>">
      </div>

      <div>
        <label>التصنيف</label>
        <input type="text" name="category" value="<?= e($post['category']) ?>">
      </div>
      <div>
        <label>الوسوم</label>
        <input type="text" name="tags" value="<?= e($post['tags']) ?>">
      </div>

      <div class="full">
        <label>الوصف المختصر</label>
        <textarea name="excerpt" rows="3" maxlength="500"><?= e($post['excerpt']) ?></textarea>
      </div>

      <div class="full">
        <label>صورة الغلاف</label>
        <?php if ($post['featured_image']): ?>
          <div style="margin-bottom:1rem">
            <img src="<?= e($post['featured_image']) ?>" class="preview-img" id="imgPrev" style="display:block">
            <label style="margin-top:.6rem;display:flex;align-items:center;gap:.5rem;color:#fca5a5;font-size:.82rem;cursor:pointer">
              <input type="checkbox" name="remove_image" value="1" style="width:auto">
              <span>حذف الصورة الحالية</span>
            </label>
          </div>
        <?php else: ?>
          <img id="imgPrev" class="preview-img" style="display:none">
        <?php endif; ?>

        <div class="file-input-wrap" onclick="this.querySelector('input').click()">
          <input type="file" name="featured_image" accept="image/*" data-preview="#imgPrev">
          <div style="color:var(--text-2);display:flex;flex-direction:column;align-items:center;gap:.5rem">
            <?= icon('upload', 28) ?>
            <span>اضغط لتغيير الصورة</span>
          </div>
        </div>
      </div>

      <div class="full">
        <label>محتوى المقال</label>
        <textarea name="content" class="rich-editor" placeholder="اكتب محتوى المقال هنا..."><?= e($post['content']) ?></textarea>
      </div>

      <div>
        <label>Meta Title (SEO)</label>
        <input type="text" name="meta_title" value="<?= e($post['meta_title']) ?>">
      </div>
      <div>
        <label>Meta Description (SEO)</label>
        <input type="text" name="meta_description" value="<?= e($post['meta_description']) ?>">
      </div>

      <div>
        <label>حالة النشر</label>
        <select name="status">
          <option value="draft" <?= $post['status']==='draft'?'selected':'' ?>>مسودة</option>
          <option value="published" <?= $post['status']==='published'?'selected':'' ?>>منشور</option>
        </select>
      </div>
      <div>
        <label>المشاهدات</label>
        <input type="text" value="<?= (int)$post['views'] ?> مشاهدة" disabled style="opacity:.6">
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn gold">
        <?= icon('save', 16) ?>
        <span>حفظ التعديلات</span>
      </button>
      <a href="delete.php?id=<?= $post['id'] ?>&csrf=<?= csrf_token() ?>"
         class="btn danger"
         data-confirm="سيتم حذف المقال نهائياً. هل أنت متأكد؟"
         style="margin-right:auto">
        <?= icon('trash', 16) ?>
        <span>حذف المقال</span>
      </a>
    </div>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof initEditor === 'function') initEditor();
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>