<?php
// includes/header.php
// متغير متوقع: $activeMenu (home | services | projects | prices | blog | about | contact)
$activeMenu = $activeMenu ?? 'home';

$navItems = [
  'services' => ['label' => 'الخدمات ▾', 'dropdown' => [
      ['services/interior-design.php',   '🛋️ التصميم الداخلي'],
      ['services/finishing.php',          '👷 تشطيب داخلي الكويت'],
      ['services/painting.php',           '🎨 صباغ الكويت'],
      ['services/gypsum-board.php',       '🧱 جبس بورد الكويت'],
      ['services/wallpaper.php',          '📜 ورق جدران الكويت'],
      ['services/melamine-wood.php',      '🚪 خشب ملامين الكويت'],
      ['services/carpenter.php',          '🔨 نجار الكويت'],
      ['services/marble.php',             '💎 الرخام الإيطالي'],
      ['services/alternatives.php',       '📑 بديل الخشب والرخام'],
      ['services/ceramics-parquet.php',   '🔲 سيراميك وباركيه'],
      ['services/dewaniya.php',           '👥 تصميم ديوانية'],
      ['services/reception-halls.php',    '🏕️ صالات استقبال خارجية'],
      ['services/roof-insulation.php',    '🏠 عزل أسطح الكويت'],
      ['services/water-leak.php',         '💧 كشف تسربات المياه'],
  ]],
];
?>

<!-- Floating Contact Buttons -->
<div class="floating-contacts">
  <a href="tel:<?= e($SITE_PHONE) ?>" class="floating-btn floating-phone" title="اتصل بنا: <?= e($SITE_PHONE) ?>">
    <svg viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
  </a>
  <a href="<?= e($WA_BASE) ?>" target="_blank" class="floating-btn floating-whatsapp" title="تواصل عبر واتساب">
    <svg viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2zm5.83 14.28c-.24.69-1.42 1.32-1.97 1.38-.5.06-1.12.08-3.62-.95-3.08-1.28-5.07-4.41-5.23-4.62-.15-.21-1.25-1.66-1.25-3.17 0-1.51.79-2.26 1.07-2.56.28-.3.62-.37.83-.37.21 0 .41.01.59.02.19.01.44-.07.69.52.25.6.86 2.1.94 2.25.08.15.13.33.03.54-.1.21-.15.34-.3.51-.15.17-.32.39-.46.52-.15.15-.31.31-.13.62.18.31.79 1.3 1.7 2.11 1.17 1.04 2.15 1.37 2.46 1.52.31.15.49.13.67-.08.18-.21.78-.91.99-1.22.21-.31.41-.26.69-.15.28.1 1.79.84 2.1 1 .31.15.51.23.59.36.08.13.08.77-.16 1.46z"/></svg>
  </a>
</div>

<!-- Header Navigation -->
<header class="header">
  <div class="header-container">
    <a href="<?= SITE_URL ?>/index.php" class="logo-brand">
      <div class="logo-badge">ع</div>
      <div class="logo-text">
        <span class="logo-title">الشركة العربية للمنازل</span>
        <span class="logo-subtitle">للتجارة العامة والمقاولات ذ.م.م</span>
      </div>
    </a>

    <nav>
      <ul class="nav-menu">
        <li>
          <a href="<?= SITE_URL ?>/index.php" class="nav-link<?= $activeMenu==='home'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span>الرئيسية</span>
          </a>
        </li>
        <li class="nav-item-dropdown">
          <a href="<?= SITE_URL ?>/index.php#services" class="nav-link<?= $activeMenu==='services'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            <span>الخدمات ▾</span>
          </a>
          <div class="dropdown-menu">
            <?php foreach ($navItems['services']['dropdown'] as $item): ?>
              <a href="<?= SITE_URL ?>/<?= e($item[0]) ?>" class="dropdown-link"><?= $item[1] ?></a>
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <a href="<?= SITE_URL ?>/projects.php" class="nav-link<?= $activeMenu==='projects'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <span>المشاريع</span>
          </a>
        </li>
        <li>
          <a href="<?= SITE_URL ?>/prices.php" class="nav-link<?= $activeMenu==='prices'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
            <span>الأسعار</span>
          </a>
        </li>
        <li>
          <a href="<?= SITE_URL ?>/blog.php" class="nav-link<?= $activeMenu==='blog'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>
            <span>المدونة</span>
          </a>
        </li>
        <li>
          <a href="<?= SITE_URL ?>/about.php" class="nav-link<?= $activeMenu==='about'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            <span>من نحن</span>
          </a>
        </li>
        <li>
          <a href="<?= SITE_URL ?>/contact.php" class="nav-link<?= $activeMenu==='contact'?' active':'' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>اتصل بنا</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="header-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn-header-call">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
        <span><?= e($SITE_PHONE) ?></span>
      </a>
      <button class="mobile-toggle" aria-label="القائمة">
        <svg width="26" height="26" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
  </div>
</header>