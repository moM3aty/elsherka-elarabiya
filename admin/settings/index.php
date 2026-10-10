<?php
$pageTitle = 'الإعدادات';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $fields = ['site_name','site_phone','site_whatsapp','site_email','site_address',
               'instagram','tiktok','snapchat','facebook','twitter','pinterest','blog_page_size'];
    $stmt = $pdo->prepare("INSERT INTO settings (`key`,`value`) VALUES (?,?) ON DUPLICATE KEY UPDATE `value`=VALUES(`value`)");
    foreach ($fields as $k) {
        $stmt->execute([$k, trim($_POST[$k] ?? '')]);
    }
    flash('تم حفظ الإعدادات');
    redirect('index.php');
}
?>

<div class="card">
  <div class="card-header"><h2>⚙️ إعدادات الموقع</h2></div>
  <form method="post">
    <?= csrf_field() ?>
    <div class="form-grid">
      <div><label>اسم الشركة</label><input type="text" name="site_name" value="<?= e(setting('site_name')) ?>"></div>
      <div><label>رقم الهاتف</label><input type="text" name="site_phone" value="<?= e(setting('site_phone')) ?>"></div>
      <div><label>رقم واتساب (بدون +)</label><input type="text" name="site_whatsapp" value="<?= e(setting('site_whatsapp')) ?>"></div>
      <div><label>البريد الإلكتروني</label><input type="email" name="site_email" value="<?= e(setting('site_email')) ?>"></div>
      <div class="full"><label>العنوان</label><input type="text" name="site_address" value="<?= e(setting('site_address')) ?>"></div>

      <div><label>انستغرام</label><input type="url" name="instagram" value="<?= e(setting('instagram')) ?>"></div>
      <div><label>تيك توك</label><input type="url" name="tiktok" value="<?= e(setting('tiktok')) ?>"></div>
      <div><label>سناب شات</label><input type="url" name="snapchat" value="<?= e(setting('snapchat')) ?>"></div>
      <div><label>فيسبوك</label><input type="url" name="facebook" value="<?= e(setting('facebook')) ?>"></div>
      <div><label>تويتر/X</label><input type="url" name="twitter" value="<?= e(setting('twitter')) ?>"></div>
      <div><label>بنترست</label><input type="url" name="pinterest" value="<?= e(setting('pinterest')) ?>"></div>
      <div><label>عدد المقالات بالصفحة</label><input type="number" name="blog_page_size" value="<?= e(setting('blog_page_size','9')) ?>"></div>
    </div>
    <div class="form-actions"><button class="btn gold" type="submit">💾 حفظ الإعدادات</button></div>
  </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>