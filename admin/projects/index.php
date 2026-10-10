<?php
$pageTitle = 'إدارة المشاريع';
require_once __DIR__ . '/../includes/header.php';

$category = $_GET['cat'] ?? '';
$sql = "SELECT * FROM projects";
$params = [];
if ($category) { $sql .= " WHERE category = ?"; $params[] = $category; }
$sql .= " ORDER BY sort_order ASC, created_at DESC";
$stmt = $pdo->prepare($sql); $stmt->execute($params);
$items = $stmt->fetchAll();

$categories = ['villas'=>'فلل وقسائم','dewaniya'=>'ديوانيات','decor'=>'ديكور','wood'=>'أخشاب','paint'=>'أصباغ','videos'=>'فيديوهات'];
?>

<div class="card">
  <div class="card-header">
    <h2>🖼️ إدارة معرض المشاريع (<?= count($items) ?>)</h2>
    <div>
      <a href="create.php" class="btn gold">+ إضافة عنصر</a>
    </div>
  </div>

  <form method="get" style="margin-bottom:1.2rem">
    <select name="cat" onchange="this.form.submit()" style="max-width:250px">
      <option value="">— كل التصنيفات —</option>
      <?php foreach ($categories as $k=>$v): ?>
        <option value="<?= $k ?>" <?= $category===$k?'selected':'' ?>><?= $v ?></option>
      <?php endforeach; ?>
    </select>
  </form>

  <?php if ($items): ?>
  <div class="table-wrap">
    <table class="data-table">
      <thead><tr><th>المعاينة</th><th>العنوان</th><th>النوع</th><th>التصنيف</th><th>ترتيب</th><th>إجراءات</th></tr></thead>
      <tbody>
        <?php foreach ($items as $it): ?>
        <tr>
          <td>
            <?php if ($it['media_type'] === 'video'): ?>
              <video class="thumb" muted preload="metadata" src="<?= e($it['media_url']) ?>"></video>
            <?php else: ?>
              <img src="<?= e($it['thumbnail'] ?: $it['media_url']) ?>" class="thumb">
            <?php endif; ?>
          </td>
          <td><strong><?= e($it['title']) ?></strong></td>
          <td><?= $it['media_type'] === 'video' ? '🎬 فيديو' : '📷 صورة' ?></td>
          <td><?= e($categories[$it['category']] ?? $it['category']) ?></td>
          <td><?= (int)$it['sort_order'] ?></td>
          <td>
            <div class="actions-row">
              <a href="edit.php?id=<?= $it['id'] ?>" class="icon-btn">✏️</a>
              <a href="delete.php?id=<?= $it['id'] ?>&csrf=<?= csrf_token() ?>" class="icon-btn danger" data-confirm="حذف العنصر؟">🗑️</a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <p style="color:var(--muted);text-align:center;padding:2rem">لا توجد عناصر بعد.</p>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>