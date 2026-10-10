<?php
$pageTitle = 'مستخدم جديد';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $u = trim($_POST['username']);
    $e = trim($_POST['email']);
    $p = $_POST['password'];
    $fn = trim($_POST['full_name']);
    $r = $_POST['role'] === 'super' ? 'super' : 'editor';

    if (strlen($u) < 3 || !filter_var($e, FILTER_VALIDATE_EMAIL) || strlen($p) < 8) {
        flash('تحقق من البيانات (كلمة مرور 8+ أحرف)','error');
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO admin_users (username,email,password_hash,full_name,role) VALUES (?,?,?,?,?)");
            $stmt->execute([$u,$e,password_hash($p, PASSWORD_BCRYPT),$fn,$r]);
            flash('تم إنشاء المستخدم');
            redirect('index.php');
        } catch (Exception $ex) {
            flash('اسم المستخدم أو الإيميل مستخدم مسبقاً','error');
        }
    }
}
?>

<div class="card">
  <div class="card-header"><h2>➕ إضافة مستخدم</h2></div>
  <form method="post">
    <?= csrf_field() ?>
    <div class="form-grid">
      <div><label>اسم المستخدم *</label><input type="text" name="username" required></div>
      <div><label>الاسم الكامل</label><input type="text" name="full_name"></div>
      <div><label>البريد الإلكتروني *</label><input type="email" name="email" required></div>
      <div><label>كلمة المرور * (8+ أحرف)</label><input type="password" name="password" required minlength="8"></div>
      <div><label>الصلاحية</label>
        <select name="role"><option value="editor">محرر</option><option value="super">مدير عام</option></select>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn gold" type="submit">💾 حفظ</button>
      <a href="index.php" class="btn outline">إلغاء</a>
    </div>
  </form>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>