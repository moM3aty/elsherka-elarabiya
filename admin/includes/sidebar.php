<?php
require_once __DIR__ . '/icons.php';

function menu_active($path) {
    return strpos($_SERVER['PHP_SELF'], $path) !== false ? 'active' : '';
}

global $pdo;
$unreadCount = 0;
try {
    $unreadCount = (int)$pdo->query("SELECT COUNT(*) FROM messages WHERE is_read=0")->fetchColumn();
} catch (Throwable $e) {}
?>
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="logo-badge">ع</div>
    <div class="brand-text">
      <h2>الشركة العربية</h2>
      <span>لوحة التحكم</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <div class="sidebar-section-label">الرئيسية</div>
    <ul class="sidebar-menu">
      <li>
        <a class="<?= menu_active('/admin/index.php') ?>" href="<?= ADMIN_URL ?>/index.php">
          <span class="ico"><?= icon('dashboard') ?></span>
          <span class="label">لوحة المعلومات</span>
        </a>
      </li>
    </ul>

    <div class="sidebar-section-label">إدارة المحتوى</div>
    <ul class="sidebar-menu">
      <li>
        <a class="<?= menu_active('/admin/blog/') ?>" href="<?= ADMIN_URL ?>/blog/index.php">
          <span class="ico"><?= icon('blog') ?></span>
          <span class="label">المدونة</span>
        </a>
      </li>
      <li>
        <a class="<?= menu_active('/admin/projects/') ?>" href="<?= ADMIN_URL ?>/projects/index.php">
          <span class="ico"><?= icon('projects') ?></span>
          <span class="label">المشاريع والمعرض</span>
        </a>
      </li>
      <li>
        <a class="<?= menu_active('/admin/services/') ?>" href="<?= ADMIN_URL ?>/services/index.php">
          <span class="ico"><?= icon('services') ?></span>
          <span class="label">الخدمات</span>
        </a>
      </li>
    </ul>

    <div class="sidebar-section-label">التواصل</div>
    <ul class="sidebar-menu">
      <li>
        <a class="<?= menu_active('/admin/messages/') ?>" href="<?= ADMIN_URL ?>/messages/index.php">
          <span class="ico"><?= icon('messages') ?></span>
          <span class="label">الرسائل</span>
          <?php if ($unreadCount > 0): ?>
            <span class="badge-count"><?= $unreadCount ?></span>
          <?php endif; ?>
        </a>
      </li>
    </ul>

    <div class="sidebar-section-label">النظام</div>
    <ul class="sidebar-menu">
      <li>
        <a class="<?= menu_active('/admin/settings/') ?>" href="<?= ADMIN_URL ?>/settings/index.php">
          <span class="ico"><?= icon('settings') ?></span>
          <span class="label">الإعدادات</span>
        </a>
      </li>
      <li>
        <a class="<?= menu_active('/admin/users/') ?>" href="<?= ADMIN_URL ?>/users/index.php">
          <span class="ico"><?= icon('users') ?></span>
          <span class="label">المستخدمون</span>
        </a>
      </li>
    </ul>
  </nav>

  <div class="sidebar-bottom">
    <a href="<?= SITE_URL ?>" target="_blank" class="sidebar-link-external">
      <span class="ico"><?= icon('globe', 16) ?></span>
      <span>عرض الموقع</span>
    </a>
    <a href="<?= ADMIN_URL ?>/logout.php" class="sidebar-link-logout">
      <span class="ico"><?= icon('logout', 16) ?></span>
      <span>تسجيل الخروج</span>
    </a>
  </div>
</aside>