<?php
$pageTitle = 'لوحة المعلومات';
require_once __DIR__ . '/includes/header.php';

/* ============ إحصائيات ============ */
$stats = [
  'blog'      => 0,
  'published' => 0,
  'projects'  => 0,
  'messages'  => 0,
  'unread'    => 0,
  'views'     => 0,
];

try {
  $stats['blog']      = (int)$pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn();
  $stats['published'] = (int)$pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status='published'")->fetchColumn();
  $stats['projects']  = (int)$pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();
  $stats['messages']  = (int)$pdo->query("SELECT COUNT(*) FROM messages")->fetchColumn();
  $stats['unread']    = (int)$pdo->query("SELECT COUNT(*) FROM messages WHERE is_read=0")->fetchColumn();
  $stats['views']     = (int)$pdo->query("SELECT COALESCE(SUM(views),0) FROM blog_posts")->fetchColumn();
} catch (Throwable $e) { /* تجاهل */ }

/* ============ آخر 7 أيام ============ */
$days = [];
$dailyMessages = [];
$daysAr = ['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];

for ($i = 6; $i >= 0; $i--) {
    $d = date('Y-m-d', strtotime("-$i days"));
    $days[] = $daysAr[(int)date('w', strtotime($d))];
    try {
        $st = $pdo->prepare("SELECT COUNT(*) FROM messages WHERE DATE(created_at)=?");
        $st->execute([$d]);
        $dailyMessages[] = (int)$st->fetchColumn();
    } catch (Throwable $e) {
        $dailyMessages[] = 0;
    }
}

/* ============ توزيع المشاريع ============ */
$catLabels = ['فلل', 'ديوانيات', 'ديكور', 'أخشاب', 'أصباغ', 'فيديوهات'];
$catCounts = [];
$catKeys = ['villas', 'dewaniya', 'decor', 'wood', 'paint', 'videos'];

foreach ($catKeys as $c) {
    try {
        $st = $pdo->prepare("SELECT COUNT(*) FROM projects WHERE category LIKE ?");
        $st->execute(["%$c%"]);
        $catCounts[] = (int)$st->fetchColumn();
    } catch (Throwable $e) {
        $catCounts[] = 0;
    }
}

/* ============ أحدث المحتوى ============ */
$recentPosts = [];
$recentMsgs = [];
try {
    $recentPosts = $pdo->query("SELECT id,title,status,created_at,views FROM blog_posts ORDER BY created_at DESC LIMIT 5")->fetchAll();
    $recentMsgs  = $pdo->query("SELECT id,name,phone,service,created_at,is_read FROM messages ORDER BY created_at DESC LIMIT 6")->fetchAll();
} catch (Throwable $e) {}
?>

<div class="welcome-banner">
  <h2>مرحباً بك في <span class="gold-text">لوحة تحكم الشركة العربية</span></h2>
  <p>إدارة كاملة لكل محتوى الموقع من مكان واحد — تابع الإحصائيات، أضف محتوى جديد، وتواصل مع عملائك في الوقت الفعلي.</p>
</div>

<div class="quick-actions">
  <a href="<?= ADMIN_URL ?>/blog/create.php" class="quick-action-card">
    <div class="qa-icon"><?= icon('plus', 20) ?></div>
    <div class="qa-content">
      <span class="qa-title">مقال جديد</span>
      <span class="qa-desc">أضف مقالاً للمدونة</span>
    </div>
  </a>
  <a href="<?= ADMIN_URL ?>/projects/create.php" class="quick-action-card">
    <div class="qa-icon"><?= icon('image', 20) ?></div>
    <div class="qa-content">
      <span class="qa-title">مشروع جديد</span>
      <span class="qa-desc">ارفع صورة أو فيديو</span>
    </div>
  </a>
  <a href="<?= ADMIN_URL ?>/messages/index.php" class="quick-action-card">
    <div class="qa-icon"><?= icon('messages', 20) ?></div>
    <div class="qa-content">
      <span class="qa-title">الرسائل</span>
      <span class="qa-desc"><?= $stats['unread'] ?> رسالة جديدة</span>
    </div>
  </a>
  <a href="<?= ADMIN_URL ?>/settings/index.php" class="quick-action-card">
    <div class="qa-icon"><?= icon('settings', 20) ?></div>
    <div class="qa-content">
      <span class="qa-title">الإعدادات</span>
      <span class="qa-desc">تعديل بيانات الموقع</span>
    </div>
  </a>
</div>

<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon"><?= icon('blog', 18) ?></div>
    <span class="stat-value"><?= $stats['blog'] ?></span>
    <span class="stat-label">إجمالي المقالات</span>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><?= icon('check', 18) ?></div>
    <span class="stat-value"><?= $stats['published'] ?></span>
    <span class="stat-label">مقالات منشورة</span>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><?= icon('projects', 18) ?></div>
    <span class="stat-value"><?= $stats['projects'] ?></span>
    <span class="stat-label">عناصر المعرض</span>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><?= icon('messages', 18) ?></div>
    <span class="stat-value"><?= $stats['messages'] ?></span>
    <span class="stat-label">إجمالي الرسائل</span>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><?= icon('bell', 18) ?></div>
    <span class="stat-value"><?= $stats['unread'] ?></span>
    <span class="stat-label">رسائل غير مقروءة</span>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><?= icon('eye', 18) ?></div>
    <span class="stat-value"><?= number_format($stats['views']) ?></span>
    <span class="stat-label">مشاهدات المدونة</span>
  </div>
</div>

<!-- Charts Row -->
<div class="charts-row">
  <div class="card">
    <div class="card-header">
      <h2><?= icon('trend-up', 18) ?> حركة الرسائل (آخر 7 أيام)</h2>
    </div>
    <div class="chart-container">
      <canvas id="messagesChart"></canvas>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h2><?= icon('filter', 18) ?> توزيع المشاريع</h2>
    </div>
    <div class="chart-container">
      <canvas id="projectsChart"></canvas>
    </div>
  </div>
</div>

<!-- Recent Posts -->
<div class="card">
  <div class="card-header">
    <h2><?= icon('blog', 18) ?> أحدث المقالات</h2>
    <a href="blog/create.php" class="btn gold sm"><?= icon('plus', 14) ?> مقال جديد</a>
  </div>
  <?php if ($recentPosts): ?>
  <div class="table-wrap">
    <table class="data-table">
      <thead><tr><th>العنوان</th><th>الحالة</th><th>المشاهدات</th><th>التاريخ</th><th></th></tr></thead>
      <tbody>
        <?php foreach ($recentPosts as $p): ?>
        <tr>
          <td><strong style="color:var(--text-1)"><?= e($p['title']) ?></strong></td>
          <td><span class="badge <?= $p['status'] ?>"><?= $p['status'] === 'published' ? 'منشور' : 'مسودة' ?></span></td>
          <td><?= (int)$p['views'] ?></td>
          <td><?= time_ago_ar($p['created_at']) ?></td>
          <td><a href="blog/edit.php?id=<?= $p['id'] ?>" class="icon-btn" title="تعديل"><?= icon('edit', 15) ?></a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <p style="color:var(--text-3);text-align:center;padding:2rem 0">لا توجد مقالات بعد.</p>
  <?php endif; ?>
</div>

<!-- Recent Messages -->
<div class="card">
  <div class="card-header">
    <h2><?= icon('messages', 18) ?> آخر الرسائل</h2>
    <a href="messages/index.php" class="btn outline sm">عرض الكل</a>
  </div>
  <?php if ($recentMsgs): ?>
  <div class="table-wrap">
    <table class="data-table">
      <thead><tr><th>الاسم</th><th>الهاتف</th><th>الخدمة</th><th>الحالة</th><th>التاريخ</th><th></th></tr></thead>
      <tbody>
        <?php foreach ($recentMsgs as $m): ?>
        <tr>
          <td><strong><?= e($m['name']) ?></strong></td>
          <td><a href="tel:<?= e($m['phone']) ?>"><?= e($m['phone']) ?></a></td>
          <td><?= e($m['service']) ?></td>
          <td><span class="badge <?= $m['is_read'] ? 'read' : 'unread' ?>"><?= $m['is_read'] ? 'مقروءة' : 'جديدة' ?></span></td>
          <td><?= time_ago_ar($m['created_at']) ?></td>
          <td><a href="messages/view.php?id=<?= $m['id'] ?>" class="icon-btn" title="عرض"><?= icon('eye', 15) ?></a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <p style="color:var(--text-3);text-align:center;padding:2rem 0">لا توجد رسائل بعد.</p>
  <?php endif; ?>
</div>

<!-- Chart Scripts — تُنفّذ بعد تحميل Chart.js -->
<script>
(function waitForChart() {
  if (typeof Chart === 'undefined') {
    return setTimeout(waitForChart, 100);
  }

  function initCharts() {
    /* ===== Line Chart ===== */
    var lineCtx = document.getElementById('messagesChart');
    if (lineCtx) {
      var ctx = lineCtx.getContext('2d');
      var gradient = ctx.createLinearGradient(0, 0, 0, 300);
      gradient.addColorStop(0, 'rgba(212, 168, 83, 0.35)');
      gradient.addColorStop(1, 'rgba(212, 168, 83, 0)');

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?= json_encode($days, JSON_UNESCAPED_UNICODE) ?>,
          datasets: [{
            label: 'الرسائل',
            data: <?= json_encode($dailyMessages) ?>,
            borderColor: '#d4a853',
            backgroundColor: gradient,
            borderWidth: 2.5,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#d4a853',
            pointBorderColor: '#0d0f14',
            pointBorderWidth: 3,
            pointRadius: 5,
            pointHoverRadius: 7,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: '#12141b',
              borderColor: '#d4a853',
              borderWidth: 1,
              padding: 12,
              titleColor: '#f4f5f7',
              bodyColor: '#b4b8c2',
              titleFont: { family: 'Tajawal', size: 13, weight: 'bold' },
              bodyFont: { family: 'Tajawal', size: 12 },
              displayColors: false,
            }
          },
          scales: {
            x: {
              grid: { color: 'rgba(255,255,255,0.04)', drawBorder: false },
              ticks: { color: '#6e7381', font: { family: 'Tajawal', size: 11 } }
            },
            y: {
              beginAtZero: true,
              grid: { color: 'rgba(255,255,255,0.04)', drawBorder: false },
              ticks: {
                color: '#6e7381',
                font: { family: 'Tajawal', size: 11 },
                precision: 0,
                stepSize: 1
              }
            }
          }
        }
      });
    }

    /* ===== Doughnut Chart ===== */
    var doughnutCtx = document.getElementById('projectsChart');
    if (doughnutCtx) {
      var labels = <?= json_encode($catLabels, JSON_UNESCAPED_UNICODE) ?>;
      var data = <?= json_encode($catCounts) ?>;
      var total = data.reduce(function(a, b) { return a + b; }, 0);

      if (total === 0) {
        // لا توجد بيانات — اعرض رسالة
        doughnutCtx.parentElement.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#6e7381;font-family:Tajawal;font-size:0.9rem;flex-direction:column;gap:.5rem"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#494e59" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg><span>لا توجد مشاريع بعد</span></div>';
      } else {
        new Chart(doughnutCtx.getContext('2d'), {
          type: 'doughnut',
          data: {
            labels: labels,
            datasets: [{
              data: data,
              backgroundColor: ['#d4a853', '#8b7355', '#4a5b7a', '#3d6650', '#7a4a5c', '#5c4a7a'],
              borderWidth: 2,
              borderColor: '#0d0f14',
              hoverOffset: 8,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '68%',
            plugins: {
              legend: {
                position: 'bottom',
                labels: {
                  color: '#b4b8c2',
                  font: { family: 'Tajawal', size: 11, weight: '600' },
                  padding: 10,
                  usePointStyle: true,
                  pointStyle: 'circle',
                  boxWidth: 8,
                }
              },
              tooltip: {
                backgroundColor: '#12141b',
                borderColor: '#d4a853',
                borderWidth: 1,
                padding: 12,
                titleColor: '#f4f5f7',
                bodyColor: '#b4b8c2',
                titleFont: { family: 'Tajawal', size: 13, weight: 'bold' },
                bodyFont: { family: 'Tajawal', size: 12 },
              }
            }
          }
        });
      }
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCharts);
  } else {
    initCharts();
  }
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>