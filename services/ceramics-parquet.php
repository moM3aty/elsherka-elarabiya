<?php
// services/ceramics-parquet.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'سيراميك وباركيه الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تركيب سيراميك، بورسلان، باركيه خشب ألماني وبورسلان خشبي في الكويت - تسوية بالليزر، غراء أصلي وترويبة إيبوكسي. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>تسوية بالليزر وكلبسات مانعة للتسنن</span></div>
    <h1 class="hero-title"><span class="gold-text">سيراميك وبورسلان وباركيه الكويت</span></h1>
    <p class="hero-description">
      تركيب احترافي للأرضيات والحوائط بكافة المقاسات الكبيرة (120×120 و 160×320 سم). أرضيات بورسلان رخامي للصالات، سيراميك حمامات ومطابخ، وباركيه ألماني HDF عالي التحمل ضد الماء والخدوش.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالمعلم: <?= e($SITE_PHONE) ?></a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة صور الأرضيات المنفذة</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (7).jpeg" alt="أرضيات باركيه خشبية لصالة فخمة من أعمالنا" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">تركيب متقن مع ضمان</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">أرضيات باركيه ألماني عازل للحرارة والصوت</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        مظهر الخشب الطبيعي الدافئ مع بطانة فوم عازلة وطبقة حماية AC4/AC5 ضد الاحتكاك والأثاث الثقيل ومقاومة للسوائل بنسبة 100%.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في تركيب باركيه مثل هذه الصالة') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">طلب تركيب باركيه</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا نحن الأفضل في تركيب السيراميك والباركيه؟</h2>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">📐</div><div class="feature-box-content"><h4>استخدام كلبسات التسوية (Leveling Clips)</h4><p>تمنع ظهور أي تسنن أو بروز بين البلاطات وتضمن سطحاً مسطحاً تماماً.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🧴</div><div class="feature-box-content"><h4>غراء بورسلان ألماني سي فليكس</h4><p>قوة التصاق خارقة تمنع تطبيل أو انفصال البلاط مهما طال الزمن.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🛡️</div><div class="feature-box-content"><h4>ترويبة إيبوكسي عازلة للمياه</h4><p>فواصل نظيفة ومقاومة للبكتيريا والتعفن والاصفرار وتتحمل المنظفات القوية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⚡</div><div class="feature-box-content"><h4>سرعة ودقة وإنجاز بالميعاد</h4><p>فريق مبلطين محترفين يلتزمون بتسليم العمل في التوقيت المحدد دون تأخير.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🧼</div><div class="feature-box-content"><h4>تسليم نظيف وجلي فواصل</h4><p>تنظيف الأرضيات من بقايا الأسمنت والغراء وتسليمها ببريق لامع.</p></div></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تبليط فيلتك أو تجديد أرضيات شقتك؟</h3>
    <p>معلمو السيراميك والباركيه متواجدون في كافة مناطق الكويت لخدمتكم بأفضل الأسعار.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>