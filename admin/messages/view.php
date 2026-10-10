<?php
$pageTitle = 'تفاصيل الرسالة';
require_once __DIR__ . '/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM messages WHERE id=?");
$stmt->execute([$id]);
$m = $stmt->fetch();
if (!$m) { flash('غير موجودة','error'); redirect('index.php'); }

// mark read
$pdo->prepare("UPDATE messages SET is_read=1 WHERE id=?")->execute([$id]);

$wa = 'https://wa.me/965' . preg_replace('/\D/', '', $m['phone']) . '?text=' . urlencode("مرحباً {$m['name']}، بخصوص استفسارك عن {$m['service']}");
?>

<div class="card">
  <div class="card-header">
    <h2>📩 تفاصيل الرسالة</h2>
    <a href="index.php" class="btn outline sm">رجوع</a>
  </div>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:1.5rem">
    <div><strong style="color:var(--muted)">الاسم:</strong><br><?= e($m['name']) ?></div>
    <div><strong style="color:var(--muted)">الهاتف:</strong><br><a href="tel:<?= e($m['phone']) ?>"><?= e($m['phone']) ?></a></div>
    <div><strong style="color:var(--muted)">المحافظة:</strong><br><?= e($m['area']) ?></div>
    <div><strong style="color:var(--muted)">الخدمة:</strong><br><?= e($m['service']) ?></div>
    <div><strong style="color:var(--muted)">التاريخ:</strong><br><?= date('Y-m-d H:i', strtotime($m['created_at'])) ?></div>
    <div><strong style="color:var(--muted)">IP:</strong><br><?= e($m['ip_address']) ?></div>
  </div>

  <div style="background:var(--dark2);padding:1.4rem;border-radius:12px;border:1px solid var(--border)">
    <strong style="color:var(--gold-light);display:block;margin-bottom:.6rem">ملاحظات العميل:</strong>
    <p style="white-space:pre-wrap;line-height:1.9"><?= e($m['notes'] ?: '—') ?></p>
  </div>

  <div class="form-actions">
    <a href="tel:<?= e($m['phone']) ?>" class="btn gold">📞 اتصال</a>
    <a href="<?= $wa ?>" target="_blank" class="btn outline">💬 واتساب</a>
    <a href="delete.php?id=<?= $m['id'] ?>&csrf=<?= csrf_token() ?>" class="btn danger" data-confirm="حذف الرسالة؟">🗑️ حذف</a>
  </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>