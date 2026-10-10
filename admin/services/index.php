<?php
$pageTitle = 'الخدمات';
require_once __DIR__ . '/../includes/header.php';
$rows = $pdo->query("SELECT * FROM services ORDER BY id")->fetchAll();
?>
<div class="card">
  <div class="card-header">
    <h2><?= icon('services', 18) ?> إدارة محتوى الخدمات</h2>
  </div>
  <div class="table-wrap">
    <table class="data-table">
      <thead>
        <tr>
          <th>الصفحة</th>
          <th>العنوان</th>
          <th>آخر تحديث</th>
          <th style="width:130px">إجراءات</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($rows): foreach ($rows as $s): ?>
        <tr>
          <td><code><?= e($s['slug']) ?></code></td>
          <td><?= e($s['title']) ?></td>
          <td><?= date('Y-m-d H:i', strtotime($s['updated_at'])) ?></td>
          <td>
            <div class="actions-row">
              <a href="edit.php?id=<?= $s['id'] ?>"
                 class="icon-btn"
                 title="تعديل">
                <?= icon('edit', 15) ?>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:2rem">
          لا توجد خدمات بعد. أضف صفوفاً يدوياً في جدول <code>services</code> أو استخدم SQL:
          <pre style="text-align:right;background:var(--dark2);padding:1rem;border-radius:8px;margin-top:1rem">INSERT INTO services (slug,title,content) VALUES ('painting','صباغ الكويت','...');</pre>
        </td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>