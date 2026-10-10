<?php
$pageTitle = 'تعديل عنصر مشروع';
require_once __DIR__ . '/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id=?");
$stmt->execute([$id]);
$item = $stmt->fetch();
if (!$item) { flash('العنصر غير موجود','error'); redirect('index.php'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $title = trim($_POST['title']);
    $desc  = trim($_POST['description']);
    $cat   = $_POST['category'];
    $type  = $_POST['media_type'];
    $order = (int)$_POST['sort_order'];
    $feat  = isset($_POST['is_featured']) ? 1 : 0;

    $url = upload_file('media_file', 'projects', ['jpg','jpeg','png','webp','gif','mp4']) ?: $item['media_url'];
    if (!empty($_POST['media_url_manual'])) $url = trim($_POST['media_url_manual']);

    $thumb = upload_file('thumbnail', 'projects', ['jpg','jpeg','png','webp']) ?: $item['thumbnail'];

    $stmt = $pdo->prepare("UPDATE projects SET title=?,description=?,category=?,media_type=?,media_url=?,thumbnail=?,sort_order=?,is_featured=? WHERE id=?");
    $stmt->execute([$title,$desc,$cat,$type,$url,$thumb,$order,$feat,$id]);
    flash('تم التحديث');
    redirect('index.php');
}
?>

<div class="card">
  <div class="card-header"><h2>✏️ تعديل عنصر</h2></div>
  <form method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-grid">
      <div class="full"><label>العنوان</label><input type="text" name="title" value="<?= e($item['title']) ?>" required></div>
      <div class="full"><label>الوصف</label><textarea name="description" rows="3"><?= e($item['description']) ?></textarea></div>
      <div>
        <label>النوع</label>
        <select name="media_type">
          <option value="image" <?= $item['media_type']==='image'?'selected':'' ?>>📷 صورة</option>
          <option value="video" <?= $item['media_type']==='video'?'selected':'' ?>>🎬 فيديو</option>
        </select>
      </div>
      <div>
        <label>التصنيف</label>
        <select name="category">
          <?php foreach (['villas'=>'فلل','dewaniya'=>'ديوانيات','decor'=>'ديكور','wood'=>'أخشاب','paint'=>'أصباغ','videos'=>'فيديوهات'] as $k=>$v): ?>
            <option value="<?= $k ?>" <?= $item['category']===$k?'selected':'' ?>><?= $v ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div><label>الترتيب</label><input type="number" name="sort_order" value="<?= (int)$item['sort_order'] ?>"></div>
      <div><label>مميز</label><label style="display:flex;align-items:center;gap:.5rem;margin-top:.5rem"><input type="checkbox" name="is_featured" value="1" <?= $item['is_featured']?'checked':'' ?>> عنصر مميز</label></div>

      <div class="full">
        <label>الملف الحالي</label>
        <?php if ($item['media_type']==='video'): ?>
          <video src="<?= e($item['media_url']) ?>" style="max-width:280px;border-radius:10px" controls></video>
        <?php else: ?>
          <img src="<?= e($item['media_url']) ?>" class="preview-img">
        <?php endif; ?>
      </div>
      <div class="full">
        <label>استبدال الملف</label>
        <div class="file-input-wrap" onclick="this.querySelector('input').click()">
          <input type="file" name="media_file" accept="image/*,video/mp4">
          <div style="color:var(--muted)">📁 اختر ملف جديد</div>
        </div>
      </div>
      <div class="full"><label>رابط جديد (اختياري)</label><input type="url" name="media_url_manual" value=""></div>
    </div>
    <div class="form-actions">
      <button class="btn gold" type="submit">💾 حفظ التعديلات</button>
      <a href="index.php" class="btn outline">إلغاء</a>
    </div>
  </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>