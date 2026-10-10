<?php
// admin/login.php
require_once __DIR__ . '/functions.php';

if (is_logged_in()) redirect(ADMIN_URL . '/index.php');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    // Throttle بسيط
    $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
    if ($_SESSION['login_attempts'] > 12) {
        $error = 'تم تجاوز عدد المحاولات. حاول لاحقاً.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? OR email = ? LIMIT 1");
        $stmt->execute([$u, $u]);
        $user = $stmt->fetch();

        if ($user && password_verify($p, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_user'] = $user['username'];
            $_SESSION['admin_role'] = $user['role'];
            $_SESSION['login_attempts'] = 0;
            $pdo->prepare("UPDATE admin_users SET last_login=NOW() WHERE id=?")->execute([$user['id']]);
            redirect(ADMIN_URL . '/index.php');
        } else {
            $error = 'بيانات الدخول غير صحيحة.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>تسجيل الدخول - لوحة التحكم</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220%22%20%22100%22%20%22100%22><text y=%22.9em%22 font-size=%2290%22>🔐</text></svg>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
<style>
/* ============ Reset ============ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --gold-1:#d4af37;
  --gold-2:#f7e08a;
  --gold-3:#b8860b;
  --gold-glow:rgba(212,175,55,.45);
  --bg-0:#07090f;
  --bg-1:#0d1017;
  --bg-2:#131720;
  --text-1:#f5f6f8;
  --text-2:#a8afbd;
  --text-3:#6b7280;
  --danger:#ff4d5e;
  --danger-bg:rgba(255,77,94,.12);
  --border:rgba(255,255,255,.08);
  --radius:18px;
}
html,body{height:100%}
body{
  font-family:'Tajawal','Cairo',system-ui,-apple-system,sans-serif;
  background:var(--bg-0);
  color:var(--text-1);
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:1.5rem;
  overflow-x:hidden;
  position:relative;
  -webkit-font-smoothing:antialiased;
}

/* ============ Animated background ============ */
.bg-wrap{
  position:fixed;inset:0;z-index:0;overflow:hidden;
  background:
    radial-gradient(1000px 600px at 15% -10%,rgba(212,175,55,.10),transparent 60%),
    radial-gradient(900px 600px at 90% 110%,rgba(212,175,55,.08),transparent 60%),
    linear-gradient(180deg,#07090f 0%,#0a0d14 100%);
}
.orb{
  position:absolute;border-radius:50%;filter:blur(90px);opacity:.55;
  will-change:transform;
}
.orb.a{
  width:520px;height:520px;top:-180px;right:-140px;
  background:radial-gradient(circle at 30% 30%,#d4af37,#7a5b0f 60%,transparent 70%);
  animation:float1 18s ease-in-out infinite;
}
.orb.b{
  width:460px;height:460px;bottom:-180px;left:-120px;
  background:radial-gradient(circle at 30% 30%,#8b6a12,#3d2c05 60%,transparent 70%);
  animation:float2 22s ease-in-out infinite;
}
.orb.c{
  width:340px;height:340px;top:40%;left:55%;
  background:radial-gradient(circle at 30% 30%,#1e3a8a,#0b142b 60%,transparent 70%);
  opacity:.35;animation:float3 26s ease-in-out infinite;
}
@keyframes float1{
  0%,100%{transform:translate(0,0) scale(1)}
  50%{transform:translate(-40px,50px) scale(1.08)}
}
@keyframes float2{
  0%,100%{transform:translate(0,0) scale(1)}
  50%{transform:translate(50px,-40px) scale(1.1)}
}
@keyframes float3{
  0%,100%{transform:translate(0,0) scale(1)}
  50%{transform:translate(-60px,-30px) scale(1.15)}
}
/* grid overlay */
.grid-overlay{
  position:absolute;inset:0;opacity:.35;
  background-image:
    linear-gradient(rgba(212,175,55,.05) 1px,transparent 1px),
    linear-gradient(90deg,rgba(212,175,55,.05) 1px,transparent 1px);
  background-size:52px 52px;
  mask-image:radial-gradient(circle at center,#000 20%,transparent 75%);
  -webkit-mask-image:radial-gradient(circle at center,#000 20%,transparent 75%);
}
/* noise */
.noise{
  position:absolute;inset:0;opacity:.035;pointer-events:none;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

/* ============ Login card ============ */
.login-box{
  position:relative;z-index:2;
  width:100%;max-width:440px;
  background:linear-gradient(180deg,rgba(20,24,33,.85),rgba(13,16,23,.92));
  backdrop-filter:blur(24px) saturate(140%);
  -webkit-backdrop-filter:blur(24px) saturate(140%);
  border:1px solid var(--border);
  border-radius:24px;
  padding:2.75rem 2.25rem 2rem;
  box-shadow:
    0 30px 80px -20px rgba(0,0,0,.8),
    0 0 0 1px rgba(255,255,255,.02) inset,
    0 1px 0 rgba(255,255,255,.06) inset;
  animation:cardIn .8s cubic-bezier(.2,.9,.3,1.2) both;
  overflow:hidden;
}
.login-box::before{
  content:'';position:absolute;top:0;left:0;right:0;height:1px;
  background:linear-gradient(90deg,transparent,var(--gold-1),transparent);
  opacity:.7;
}
.login-box::after{
  content:'';position:absolute;inset:-2px;border-radius:26px;padding:1px;
  background:linear-gradient(140deg,rgba(212,175,55,.4),transparent 30%,transparent 70%,rgba(212,175,55,.25));
  -webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);
  -webkit-mask-composite:xor;
  mask-composite:exclude;
  pointer-events:none;
}
@keyframes cardIn{
  from{opacity:0;transform:translateY(30px) scale(.96)}
  to{opacity:1;transform:translateY(0) scale(1)}
}

/* ============ Logo ============ */
.login-logo{text-align:center;margin-bottom:2rem}
.brand-badge{
  width:72px;height:72px;margin:0 auto 1.1rem;
  border-radius:20px;
  display:grid;place-items:center;
  font-size:2rem;font-weight:800;
  color:#1a1305;
  font-family:'Cairo',sans-serif;
  background:linear-gradient(140deg,var(--gold-2),var(--gold-1) 45%,var(--gold-3));
  box-shadow:
    0 10px 30px -8px var(--gold-glow),
    0 0 0 1px rgba(255,255,255,.2) inset,
    0 1px 0 rgba(255,255,255,.5) inset;
  position:relative;
  animation:badgePop .9s cubic-bezier(.2,.9,.3,1.4) .15s both;
}
.brand-badge::after{
  content:'';position:absolute;inset:-6px;border-radius:26px;
  border:1px solid rgba(212,175,55,.35);
  animation:pulseRing 3s ease-out infinite;
}
@keyframes badgePop{
  from{opacity:0;transform:scale(.4) rotate(-15deg)}
  to{opacity:1;transform:scale(1) rotate(0)}
}
@keyframes pulseRing{
  0%{transform:scale(1);opacity:.7}
  70%{transform:scale(1.18);opacity:0}
  100%{opacity:0}
}
.login-logo h1{
  font-size:1.35rem;font-weight:800;letter-spacing:-.01em;
  background:linear-gradient(180deg,#fff,#b8bfcc);
  -webkit-background-clip:text;background-clip:text;color:transparent;
  margin-bottom:.35rem;
}
.login-logo p{
  font-size:.85rem;color:var(--text-2);font-weight:400;letter-spacing:.02em;
}
.login-logo p::before,
.login-logo p::after{
  content:'';display:inline-block;width:26px;height:1px;
  background:linear-gradient(90deg,transparent,var(--gold-1));
  vertical-align:middle;margin:0 .6rem;
}
.login-logo p::after{
  background:linear-gradient(90deg,var(--gold-1),transparent);
}

/* ============ Error alert ============ */
.alert{
  padding:.85rem 1rem;
  border-radius:12px;
  font-size:.85rem;
  font-weight:500;
  margin-bottom:1.25rem;
  display:flex;align-items:center;gap:.6rem;
  animation:shake .5s cubic-bezier(.36,.07,.19,.97) both;
}
.alert::before{
  content:'';flex-shrink:0;width:18px;height:18px;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ff4d5e' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'/%3E%3Cline x1='12' y1='8' x2='12' y2='12'/%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'/%3E%3C/svg%3E");
  background-size:contain;background-repeat:no-repeat;
}
.alert.error{
  background:var(--danger-bg);
  border:1px solid rgba(255,77,94,.28);
  color:#ffb3bb;
}
@keyframes shake{
  10%,90%{transform:translateX(-2px)}
  20%,80%{transform:translateX(4px)}
  30%,50%,70%{transform:translateX(-6px)}
  40%,60%{transform:translateX(6px)}
}

/* ============ Form ============ */
form{display:flex;flex-direction:column;gap:1.1rem}
.field{position:relative}
.field label{
  display:block;
  font-size:.78rem;font-weight:600;
  color:var(--text-2);
  margin-bottom:.5rem;
  letter-spacing:.02em;
  transition:color .25s;
}
.field:focus-within label{color:var(--gold-2)}
.field .input-wrap{position:relative}
.field .input-icon{
  position:absolute;top:50%;right:14px;transform:translateY(-50%);
  width:18px;height:18px;
  color:var(--text-3);
  transition:color .25s,transform .25s;
  pointer-events:none;
}
.field:focus-within .input-icon{color:var(--gold-1)}

.field input{
  width:100%;
  padding:.95rem 2.9rem .95rem 2.9rem;
  background:rgba(9,11,17,.7);
  border:1px solid var(--border);
  border-radius:14px;
  color:var(--text-1);
  font-size:.95rem;
  font-family:inherit;
  font-weight:500;
  transition:border-color .25s,background .25s,box-shadow .25s;
  outline:none;
}
.field input::placeholder{color:var(--text-3);font-weight:400}
.field input:hover{border-color:rgba(255,255,255,.15)}
.field input:focus{
  border-color:rgba(212,175,55,.6);
  background:rgba(15,18,26,.9);
  box-shadow:0 0 0 4px rgba(212,175,55,.12),0 0 24px -6px var(--gold-glow);
}
.field input:-webkit-autofill{
  -webkit-box-shadow:0 0 0 1000px #0f121a inset !important;
  -webkit-text-fill-color:var(--text-1) !important;
  caret-color:var(--text-1);
}

/* password toggle */
.toggle-pw{
  position:absolute;top:50%;left:10px;transform:translateY(-50%);
  width:34px;height:34px;
  display:grid;place-items:center;
  background:transparent;border:none;cursor:pointer;
  color:var(--text-3);border-radius:8px;
  transition:color .2s,background .2s;
}
.toggle-pw:hover{color:var(--gold-2);background:rgba(212,175,55,.08)}
.toggle-pw svg{width:18px;height:18px}
.toggle-pw .eye-off{display:none}
.toggle-pw.is-visible .eye-on{display:none}
.toggle-pw.is-visible .eye-off{display:block}

/* ============ Button ============ */
.btn{
  position:relative;
  margin-top:.5rem;
  padding:1rem 1.25rem;
  border:none;border-radius:14px;
  font-family:inherit;font-size:1rem;font-weight:700;
  color:#1a1305;
  background:linear-gradient(140deg,var(--gold-2) 0%,var(--gold-1) 45%,var(--gold-3) 100%);
  cursor:pointer;
  overflow:hidden;
  letter-spacing:.01em;
  box-shadow:
    0 12px 28px -10px var(--gold-glow),
    0 1px 0 rgba(255,255,255,.5) inset;
  transition:transform .2s,box-shadow .25s,filter .25s;
}
.btn:hover{
  transform:translateY(-2px);
  filter:brightness(1.06);
  box-shadow:
    0 18px 40px -12px var(--gold-glow),
    0 1px 0 rgba(255,255,255,.6) inset;
}
.btn:active{transform:translateY(0) scale(.99)}
.btn::before{
  content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.55),transparent);
  transition:left .7s;
}
.btn:hover::before{left:100%}
.btn[disabled]{cursor:wait;filter:brightness(.9)}
.btn .spinner{
  display:none;width:18px;height:18px;
  border:2.5px solid rgba(26,19,5,.3);
  border-top-color:#1a1305;
  border-radius:50%;
  animation:spin .7s linear infinite;
  margin-left:.55rem;vertical-align:middle;
}
.btn.loading .spinner{display:inline-block}
@keyframes spin{to{transform:rotate(360deg)}}

/* ============ Footer ============ */
.login-footer{
  text-align:center;
  margin-top:1.75rem;
  padding-top:1.25rem;
  border-top:1px solid var(--border);
  font-size:.78rem;
  color:var(--text-3);
  letter-spacing:.02em;
}
.login-footer span{color:var(--gold-1);font-weight:600}

/* ============ Security note ============ */
.secure-note{
  display:flex;align-items:center;justify-content:center;gap:.5rem;
  margin-top:1rem;font-size:.72rem;color:var(--text-3);
}
.secure-note svg{width:12px;height:12px;color:var(--gold-1)}

/* ============ Responsive ============ */
@media (max-width:480px){
  .login-box{padding:2rem 1.5rem 1.5rem;border-radius:20px}
  .brand-badge{width:62px;height:62px;font-size:1.7rem}
  .login-logo h1{font-size:1.15rem}
  .orb.a,.orb.b{filter:blur(70px)}
}
@media (prefers-reduced-motion:reduce){
  *,*::before,*::after{animation:none!important;transition:none!important}
}
</style>
</head>
<body>

<!-- Animated background -->
<div class="bg-wrap" aria-hidden="true">
  <div class="orb a"></div>
  <div class="orb b"></div>
  <div class="orb c"></div>
  <div class="grid-overlay"></div>
  <div class="noise"></div>
</div>

<div class="login-box">
  <div class="login-logo">
    <div class="brand-badge">ع</div>
    <h1>الشركة العربية للمنازل</h1>
    <p>لوحة التحكم الإدارية</p>
  </div>

  <?php if ($error): ?>
    <div class="alert error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" autocomplete="off" id="loginForm">
    <div class="field">
      <label for="username">اسم المستخدم أو البريد الإلكتروني</label>
      <div class="input-wrap">
        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
        <input type="text" id="username" name="username" placeholder="أدخل اسم المستخدم" required autofocus>
      </div>
    </div>

    <div class="field">
      <label for="password">كلمة المرور</label>
      <div class="input-wrap">
        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
          <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
        </svg>
        <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
        <button type="button" class="toggle-pw" id="togglePw" aria-label="إظهار كلمة المرور">
          <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
          <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
            <line x1="1" y1="1" x2="23" y2="23"/>
          </svg>
        </button>
      </div>
    </div>

    <button class="btn" type="submit" id="submitBtn">
      <span class="btn-text">دخول آمن</span>
      <span class="spinner"></span>
    </button>
  </form>

  <div class="secure-note">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
    </svg>
    اتصال مشفّر ومحمي
  </div>

  <p class="login-footer">© 2004 - <span><?= date('Y') ?></span> جميع الحقوق محفوظة</p>
</div>

<script>
// Password visibility toggle
const toggle = document.getElementById('togglePw');
const pwInput = document.getElementById('password');
toggle.addEventListener('click', () => {
  const visible = pwInput.type === 'text';
  pwInput.type = visible ? 'password' : 'text';
  toggle.classList.toggle('is-visible', !visible);
  toggle.setAttribute('aria-label', visible ? 'إظهار كلمة المرور' : 'إخفاء كلمة المرور');
  pwInput.focus();
});

// Loading state
const form = document.getElementById('loginForm');
const btn  = document.getElementById('submitBtn');
form.addEventListener('submit', () => {
  btn.classList.add('loading');
  btn.disabled = true;
  btn.querySelector('.btn-text').textContent = 'جارٍ التحقق...';
});
</script>

</body>
</html>