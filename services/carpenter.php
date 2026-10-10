<?php
// services/carpenter.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'نجار الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'أشطر نجار في الكويت - تصنيع وتركيب أبواب خشب داخلية وخارجية، بارتشن خشبي، قواطع صالات، غرف نوم، وتصليح وصيانة كافة أعمال النجارة. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>ورشة نجارة متكاملة وفريق نجارين محترفين</span></div>
    <h1 class="hero-title"><span class="gold-text">أفضل نجار في الكويت</span></h1>
    <p class="hero-description">
      تنفيذ وتفصيل وتركيب كافة أعمال النجارة الخشبية للفلل والشقق والديوانيات. أبواب خشب قشرة طبيعية، بارتشن وقواطع مفرغة، صيانة الأبواب والأقفال، وتفصيل أحدث الموديلات بتشطيب دهان دوكو أو ورنيش إيطالي فاخر.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالنجار: <?= e($SITE_PHONE) ?></a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة أعمال النجارة المنفذة</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (16).jpeg" alt="بارتشن خشبي مفرغ للصالة من أعمالنا" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">تنفيذ مخصص للصالات الفسيحة</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">بارتشن خشبي رأسي مفرغ مع وحدة شاشة مركزية</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        فاصل ذكي بين الصالة وقسم الدرج يتيح مرور الضوء ويمنح خصوصية بصرية راقية مع تثبيت شاشة تلفزيون بوجهين وقاعدة معلقة متينة.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في تنفيذ بارتشن خشبي مثل هذا') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">طلب تفصيل بارتشن</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا يثق بنا عملاؤنا في أعمال النجارة؟</h2>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">🌲</div><div class="feature-box-content"><h4>أخشاب زان وموسكي وسويدي أصلية</h4><p>نستخدم أخشاباً مجففة لا تتأثر بالحرارة أو التقوس بمرور السنوات.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔐</div><div class="feature-box-content"><h4>أبواب كواتم صوت وأقفال أمان</h4><p>حشوات عازلة للصوت ومفصلات وأقفال إيطالية وأمريكية معتمدة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🎨</div><div class="feature-box-content"><h4>دهانات إيطالية نارية مقاومة</h4><p>دهانات دوكو واسترات بملمس حريري ولمعان يدوم طويلاً دون تشهيب.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⚡</div><div class="feature-box-content"><h4>سرعة حضور واستجابة فورية</h4><p>فنيو نجارة متنقلون في كافة المحافظات للتركيب والصيانة العاجلة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💰</div><div class="feature-box-content"><h4>أسعار مناسبة ومباشرة من الورشة</h4><p>بدون وساطة تجارية، أسعار تصنيع وتوريد منافسة تضمن لك أعلى جودة.</p></div></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل تحتاج لنجار شاطر لتركيب أبواب أو تفصيل قواطع في الكويت؟</h3>
    <p>فريقنا مستعد لتلبية طلبك في العاصمة، حولي، الفروانية، الجهراء، الأحمدي، ومبارك الكبير.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالنجار: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>