<?php
// services/wallpaper.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'تركيب ورق جدران الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تركيب وتوريد أحدث ورق جدران كوري وأوروبي ثلاثي الأبعاد 3D في الكويت - خامات قماش وفينيل قابلة للغسيل. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>كتالوجات حصرية لورق الجدران لعام <?= date('Y') ?></span></div>
    <h1 class="hero-title"><span class="gold-text">ورق جدران الكويت (كوري وأوروبي)</span></h1>
    <p class="hero-description">
      تشكيلة حصرية من أرقى خامات ورق الجدران ثلاثي الأبعاد والخامات القماشية والفينيل المقاوم للرطوبة وقابل للغسيل. نوفر أحدث الموديلات الكلاسيكية والمودرن بأيدي معلمين محترفين يضمنون إخفاء الفواصل بنسبة 100%.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة الكتالوج بالمنزل</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة عينات الكتالوج</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (39).jpeg" alt="كتالوج وعينات ورق جدران فاخر" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">عينات وخامات حية من الشركة</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">خامات قماشية منسوجة وفينيل مقاوم للرطوبة</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        ملمس نسيجي غني يعكس الفخامة ويعطي الجدران دفئاً مبهراً. لا يتغير لونه مع الإضاءة أو مرور السنين ويتحمل المسح والغسيل بالماء والصابون بسهولة.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في معاينة عينات ورق الجدران القماشية') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">اطلب زيارة الفني بالكتالوجات</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا تختار ورق الجدران من الشركة العربية؟</h2>
    <p class="section-subtitle">دقة في التركيب وخامات معمرة تضمن استثماراً جمالياً لمنزلك.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">🧼</div><div class="feature-box-content"><h4>قابل للغسيل والمسح 100%</h4><p>طبقة حماية عازلة تسمح بتنظيف الأتربة والبقع دون التأثير على لمعان الألوان.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔍</div><div class="feature-box-content"><h4>تركيب بدون فواصل ظاهرة</h4><p>معلمون ذوو خبرة طويلة يقومون بتطابق النقشات وضبط اللحامات بدقة متناهية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🧴</div><div class="feature-box-content"><h4>غراء ألماني أصلي مضاد للعفن</h4><p>نستخدم أفضل مواد اللصق الأوروبية التي تضمن ثبات الورق دون روائح كريهة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">📚</div><div class="feature-box-content"><h4>مئات الكتالوجات الحصرية</h4><p>خيارات تناسب غرف الأطفال، المجالس، غرف النوم الرئيسية، والصالات المودرن.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⚡</div><div class="feature-box-content"><h4>إنجاز الغرفة في ساعتين فقط</h4><p>تجديد كامل للمكان بسرعة فائقة وبدون أي بهدلة أو تعطيل لحياتك اليومية.</p></div></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تغيير ديكور غرفتك أو مجلسك بورق جدران راقي؟</h3>
    <p>فنيونا يحضرون الكتالوجات إلى باب منزلك في أي منطقة بالكويت لاختيار الأنسب لك.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>