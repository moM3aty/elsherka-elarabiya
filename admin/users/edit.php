<?php
$pageTitle = 'تعديل مستخدم';
require_once __DIR__ . '/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id=?");
$stmt->execute([$id]);
$u = $stmt->fetch();
if (!$u) { flash('غير موجود','error'); redirect('index.php'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $fn = trim($_POST['full_name']);
    $role = $_POST['role'] === 'super' ? 'super' : 'editor';
    $pass = $_POST['password'];

    try {
        if ($pass) {
            if (strlen($pass) < 8) throw new Exception('كلمة مرور قصيرة');
            $pdo->prepare("UPDATE admin_users SET username=?,email=?,full_name=?,role=?,password_hash=? WHERE id=?")
                ->execute([$user,$email,$fn,$role,password_hash($pass, PASSWORD_BCRYPT),$id]);
        } else {
            $pdo->prepare("UPDATE admin_users SET username=?,email=?,full_name=?,role=? WHERE id=?")
                ->execute([$user,$email,$fn,$role,$id]);
        }
        flash('تم التحديث');
        redirect('index.php');
    } catch (Exception $e) {
        flash('خطأ: ' . $e->getMessage(), 'error');
    }
}
?>

<div class="card">
  <div class="card-header"><h2>✏️ تعديل المستخدم</h2></div>
  <form method="post">
    <?= csrf_field() ?>
    <div class="form-grid">
      <div><label>اسم المستخدم</label><input type="text" name="username" value="<?= e($u['username']) ?>" required></div>
      <div><label>الاسم الكامل</label><input type="text" name="full_name" value="<?= e($u['full_name']) ?>"></div>
      <div><label>البريد</label><input type="email" name="email" value="<?= e($u['email']) ?>" required></div>
      <div><label>كلمة مرور جديدة (اترك فارغاً للإبقاء)</label><input type="password" name="password"></div>
      <div><label>الصلاحية</label>
        <select name="role">
          <option value="editor" <?= $u['role']==='editor'?'selected':'' ?>>محرر</option>
          <option value="super" <?= $u['role']==='super'?'selected':'' ?>>مدير عام</option>
        </select>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn gold" type="submit">💾 حفظ</button>
      <a href="index.php" class="btn outline">إلغاء</a>
    </div>
  </form>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>