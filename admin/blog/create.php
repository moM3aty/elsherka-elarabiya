<?php
// admin/blog/create.php
$pageTitle = 'مقال جديد';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $title = trim($_POST['title'] ?? '');
    $slug  = slugify($_POST['slug'] ?? $title);
    $slug  = unique_slug($pdo, 'blog_posts', $slug);
    $cat   = trim($_POST['category'] ?? 'أخبار');
    $status= in_array($_POST['status'] ?? 'draft', ['draft','published']) ? $_POST['status'] : 'draft';
    $excerpt = trim($_POST['excerpt'] ?? '');
    $content = $_POST['content'] ?? '';
    $metaT = trim($_POST['meta_title'] ?? '');
    $metaD = trim($_POST['meta_description'] ?? '');
    $tags  = trim($_POST['tags'] ?? '');

    $img = upload_file('featured_image', 'blog', ['jpg','jpeg','png','webp','gif']);

    if (!$title) {
        flash('العنوان مطلوب', 'error');
    } else {
        $stmt = $pdo->prepare("INSERT INTO blog_posts (title,slug,excerpt,content,featured_image,category,tags,status,meta_title,meta_description,author_id,published_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$title,$slug,$excerpt,$content,$img,$cat,$tags,$status,$metaT,$metaD,
                        $_SESSION['admin_id'], $status === 'published' ? date('Y-m-d H:i:s') : null]);
        flash('تم إنشاء المقال بنجاح');
        redirect('index.php');
    }
}
?>

<div class="card">
  <div class="card-header">
    <h2><?= icon('plus', 18) ?> إضافة مقال جديد</h2>
    <a href="index.php" class="btn outline sm"><?= icon('arrow-right', 14) ?> رجوع</a>
  </div>

  <form method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-grid">
      <div>
        <label>عنوان المقال *</label>
        <input type="text" name="title" required data-slug-source="#slugInput"
               value="<?= e($_POST['title'] ?? '') ?>" placeholder="اكتب عنواناً جاذباً...">
      </div>
      <div>
        <label>الرابط (Slug)</label>
        <input type="text" name="slug" id="slugInput" data-slug-target
               value="<?= e($_POST['slug'] ?? '') ?>" placeholder="اتركه فارغاً للتوليد التلقائي">
      </div>

      <div>
        <label>التصنيف</label>
        <input type="text" name="category" value="<?= e($_POST['category'] ?? 'أخبار') ?>">
      </div>
      <div>
        <label>الوسوم (افصل بفاصلة)</label>
        <input type="text" name="tags" value="<?= e($_POST['tags'] ?? '') ?>" placeholder="ديكور, تشطيب, تصميم">
      </div>

      <div class="full">
        <label>الوصف المختصر (Excerpt)</label>
        <textarea name="excerpt" rows="3" maxlength="500" placeholder="وصف قصير يظهر في صفحة المدونة..."><?= e($_POST['excerpt'] ?? '') ?></textarea>
      </div>

      <div class="full">
        <label>صورة الغلاف</label>
        <div class="file-input-wrap" onclick="this.querySelector('input').click()">
          <input type="file" name="featured_image" accept="image/*" data-preview="#imgPrev">
          <div style="color:var(--text-2);display:flex;flex-direction:column;align-items:center;gap:.5rem">
            <?= icon('upload', 28) ?>
            <span>اضغط لاختيار صورة من الجهاز</span>
            <span style="font-size:.78rem;color:var(--text-3)">JPG • PNG • WEBP (حتى 5MB)</span>
          </div>
        </div>
        <img id="imgPrev" class="preview-img" style="display:none">
      </div>

      <div class="full">
        <label>محتوى المقال</label>
        <textarea name="content" class="rich-editor" placeholder="اكتب محتوى المقال هنا..."><?= e($_POST['content'] ?? '') ?></textarea>
      </div>

      <div>
        <label>Meta Title (SEO)</label>
        <input type="text" name="meta_title" value="<?= e($_POST['meta_title'] ?? '') ?>" placeholder="عنوان لمحركات البحث">
      </div>
      <div>
        <label>Meta Description (SEO)</label>
        <input type="text" name="meta_description" value="<?= e($_POST['meta_description'] ?? '') ?>" placeholder="وصف لمحركات البحث">
      </div>

      <div>
        <label>حالة النشر</label>
        <select name="status">
          <option value="draft">حفظ كمسودة</option>
          <option value="published">نشر الآن</option>
        </select>
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn gold">
        <?= icon('save', 16) ?>
        <span>حفظ المقال</span>
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