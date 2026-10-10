<?php
$pageTitle = 'المستخدمون';
require_once __DIR__ . '/../includes/header.php';
$rows = $pdo->query("SELECT * FROM admin_users ORDER BY id ASC")->fetchAll();
?>

<div class="card">
  <div class="card-header">
    <h2>👥 المستخدمون (<?= count($rows) ?>)</h2>
    <a href="create.php" class="btn gold">+ مستخدم جديد</a>
  </div>
  <div class="table-wrap">
    <table class="data-table">
      <thead><tr><th>المستخدم</th><th>الإيميل</th><th>الصلاحية</th><th>آخر دخول</th><th></th></tr></thead>
      <tbody>
        <?php foreach ($rows as $u): ?>
        <tr>
          <td><strong><?= e($u['username']) ?></strong><?= $u['full_name'] ? ' — ' . e($u['full_name']) : '' ?></td>
          <td><?= e($u['email']) ?></td>
          <td><?= $u['role'] === 'super' ? 'مدير عام' : 'محرر' ?></td>
          <td><?= $u['last_login'] ? date('Y-m-d H:i', strtotime($u['last_login'])) : '—' ?></td>
          <td>
            <div class="actions-row">
              <a href="edit.php?id=<?= $u['id'] ?>" class="icon-btn">✏️</a>
              <?php if ($u['id'] != $_SESSION['admin_id']): ?>
              <a href="delete.php?id=<?= $u['id'] ?>&csrf=<?= csrf_token() ?>" class="icon-btn danger" data-confirm="حذف المستخدم؟">🗑️</a>
              <?php endif; ?>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>