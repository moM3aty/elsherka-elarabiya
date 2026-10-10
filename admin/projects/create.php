<?php
$pageTitle = 'إضافة عنصر مشروع';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $title = trim($_POST['title'] ?? '');
    $desc  = trim($_POST['description'] ?? '');
    $cat   = $_POST['category'] ?? 'villas';
    $type  = $_POST['media_type'] ?? 'image';
    $order = (int)($_POST['sort_order'] ?? 0);
    $feat  = isset($_POST['is_featured']) ? 1 : 0;

    $url = upload_file('media_file', 'projects', ['jpg','jpeg','png','webp','gif','mp4']);
    if (!$url && !empty($_POST['media_url_manual'])) $url = trim($_POST['media_url_manual']);

    if (!$title || !$url) {
        flash('العنوان والملف/الرابط مطلوبان', 'error');
    } else {
        $thumb = upload_file('thumbnail', 'projects', ['jpg','jpeg','png','webp']);
        if (!$thumb) $thumb = $type === 'image' ? $url : null;

        $stmt = $pdo->prepare("INSERT INTO projects (title,description,category,media_type,media_url,thumbnail,sort_order,is_featured) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$title,$desc,$cat,$type,$url,$thumb,$order,$feat]);
        flash('تمت إضافة العنصر');
        redirect('index.php');
    }
}
?>

<div class="card">
  <div class="card-header"><h2>➕ إضافة عنصر مشروع</h2></div>
  <form method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-grid">
      <div class="full">
        <label>عنوان المشروع *</label>
        <input type="text" name="title" required>
      </div>
      <div class="full">
        <label>الوصف</label>
        <textarea name="description" rows="3"></textarea>
      </div>
      <div>
        <label>النوع</label>
        <select name="media_type">
          <option value="image">📷 صورة</option>
          <option value="video">🎬 فيديو</option>
        </select>
      </div>
      <div>
        <label>التصنيف</label>
        <select name="category">
          <option value="villas">فلل وقسائم</option>
          <option value="dewaniya">ديوانيات</option>
          <option value="decor">ديكور</option>
          <option value="wood">أخشاب</option>
          <option value="paint">أصباغ</option>
          <option value="videos">فيديوهات</option>
        </select>
      </div>
      <div>
        <label>ترتيب العرض</label>
        <input type="number" name="sort_order" value="0">
      </div>
      <div>
        <label>مميز؟</label>
        <label style="display:flex;align-items:center;gap:.5rem;margin-top:.5rem"><input type="checkbox" name="is_featured" value="1"> إظهار كعنصر مميز</label>
      </div>

      <div class="full">
        <label>الملف (صورة أو فيديو MP4)</label>
        <div class="file-input-wrap" onclick="this.querySelector('input').click()">
          <input type="file" name="media_file" accept="image/*,video/mp4">
          <div style="color:var(--muted)">📁 اختر ملف من الجهاز</div>
        </div>
      </div>
      <div class="full">
        <label>أو رابط مباشر (اختياري)</label>
        <input type="url" name="media_url_manual" placeholder="https://...">
      </div>
    </div>
    <div class="form-actions">
      <button class="btn gold" type="submit">💾 حفظ</button>
      <a href="index.php" class="btn outline">إلغاء</a>
    </div>
  </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>