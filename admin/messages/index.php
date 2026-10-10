<?php
$pageTitle = 'الرسائل الواردة';
require_once __DIR__ . '/../includes/header.php';

$filter = $_GET['filter'] ?? 'all';
$sql = "SELECT * FROM messages";
if ($filter === 'unread') $sql .= " WHERE is_read=0";
$sql .= " ORDER BY created_at DESC LIMIT 200";
$rows = $pdo->query($sql)->fetchAll();
?>

<div class="card">
  <div class="card-header">
    <h2>✉️ الرسائل</h2>
    <div style="display:flex;gap:.5rem">
      <a href="?filter=all" class="btn sm <?= $filter==='all'?'gold':'outline' ?>">الكل</a>
      <a href="?filter=unread" class="btn sm <?= $filter==='unread'?'gold':'outline' ?>">غير مقروءة</a>
    </div>
  </div>

  <?php if ($rows): ?>
  <div class="table-wrap">
    <table class="data-table">
      <thead><tr><th>الاسم</th><th>الهاتف</th><th>المحافظة</th><th>الخدمة</th><th>التاريخ</th><th>الحالة</th><th></th></tr></thead>
      <tbody>
        <?php foreach ($rows as $m): ?>
        <tr style="<?= $m['is_read']?'':'font-weight:700' ?>">
          <td><?= e($m['name']) ?></td>
          <td><a href="tel:<?= e($m['phone']) ?>"><?= e($m['phone']) ?></a></td>
          <td><?= e($m['area']) ?></td>
          <td><?= e($m['service']) ?></td>
          <td><?= time_ago_ar($m['created_at']) ?></td>
          <td><span class="badge <?= $m['is_read']?'read':'unread' ?>"><?= $m['is_read']?'مقروءة':'جديدة' ?></span></td>
          <td>
            <div class="actions-row">
              <a href="view.php?id=<?= $m['id'] ?>" class="icon-btn">👁️</a>
              <a href="delete.php?id=<?= $m['id'] ?>&csrf=<?= csrf_token() ?>" class="icon-btn danger" data-confirm="حذف الرسالة؟">🗑️</a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <p style="color:var(--muted);text-align:center;padding:2rem">لا توجد رسائل.</p>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>