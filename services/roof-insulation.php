<?php
// services/roof-insulation.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'عزل أسطح الكويت | فوم وشينكو وعوازل حرارية ومائية';
$pageDescription = 'عزل أسطح الكويت بأحدث المواد - فوم بولي يوريثان، شينكو عاكس، لياسة إيبوكسي مانعة للتسرب، وعوازل حرارية. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>حماية السطح من الحرارة والتسرب المائي</span></div>
    <h1 class="hero-title"><span class="gold-text">عزل أسطح الكويت</span></h1>
    <p class="hero-description">
      نوفر أفضل حلول عزل الأسطح في الكويت بمواد عالية الجودة تحمي منزلك من الحرارة الشديدة والتسرب المائي. نستخدم فوم البولي يوريثان، الشينكو العاكس، اللياسة الإيبوكسية المانعة للماء، وطلاء النانو العاكس للحرارة لضمان سطح متين وعازل يدوم لسنوات.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة مجانية: <?= e($SITE_PHONE) ?></a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة أعمال العزل المنجزة</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (5).jpeg" alt="عزل سطح فيلا كويتية بالفوم والشينكو" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">من أعمالنا الميدانية</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">عزل حراري ومائي متكامل بالفوم والشينكو</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        تطبيق طبقة فوم بولي يوريثان بسماكة 5 سم فوق طبقة شينكو عاكسة للحرارة مع معالجة فواصل واختراقات الأنابيب. النتيجة: خفض درجة حرارة المسكن 8-12 درجة وتوفير حتى 30% من فاتورة الكهرباء.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في عزل السطح بالفوم والشينكو') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">استفسر عن عزل سطحك</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">أنواع عزل الأسطح التي نقدمها</h2>
    <p class="section-subtitle">نختار لك المنتج الأنسب حسب نوع السطح والميزانية والحاجة الفعلية.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">🟡</div><div class="feature-box-content"><h4>فوم بولي يوريثان المرش (Spray Foam)</h4><p>أقوى عازل حراري ومائي متكامل. يُرش مباشرة على السطح ليغلق جميع المسامات والفجوات ويدوم 15+ سنة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔵</div><div class="feature-box-content"><h4>شينكو عاكس للحرارة (Reflective Foil)</h4><p>رقائق معدنية بطبقات ألومنيوم عاكسة تعكس أكثر من 95% من أشعة الشمس.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⚫</div><div class="feature-box-content"><h4>لياسة وطلاء إيبوكسي مقاوم للماء</h4><p>طلاء مطاطي مرن يتمدد مع السطح ويمنع تسرب المياه عبر الفواصل والترخيمات.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🟤</div><div class="feature-box-content"><h4>عزل بلاطات XPS الحرارية</h4><p>ألواح XPS بوليسترين مضغوط بسماكات متعددة توضع تحت الإسفلت أو الفرش.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔲</div><div class="feature-box-content"><h4>إسفلت ومشمع بيتومين</h4><p>طبقات بيتومين مُلتصق بالحرارة مع ألياف زجاجية، حل اقتصادي وموثوق.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">✨</div><div class="feature-box-content"><h4>طلاء نانو سيراميكي عاكس</h4><p>أحدث تقنية - طلاء سيراميكي نانو يُطبق كالدهان بالرولة ويعكس الحرارة.</p></div></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">خطوات عزل السطح مع الشركة العربية</h2>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. معاينة مجانية وتشخيص دقيق للسطح</h3><p class="timeline-desc">يزور فريقنا الفني الموقع ويفحص السطح للكشف عن مناطق التسرب وتحديد أنسب نوع عزل.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. تنظيف وتحضير السطح</h3><p class="timeline-desc">إزالة أي بقايا عزل قديم أو أوساخ وتسوية الشقوق والفواصل قبل التطبيق.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. تطبيق طبقات العزل بدقة احترافية</h3><p class="timeline-desc">تطبيق العوازل بالمعدات المتخصصة وبالسماكات المطلوبة مع معالجة زوايا الجدران.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. اختبار العزل واتساقه</h3><p class="timeline-desc">فحص السطح بالكامل باختبار الماء والتحقق من غلق جميع النقاط الحرجة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. ضمان على العمل والمواد</h3><p class="timeline-desc">تسليم السطح مع ضمان كتابي على العمل ومواد عالية الجودة مدة تتراوح بين 5 إلى 15 سنة.</p></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل سطحك يعاني من الحرارة أو التسرب؟</h3>
    <p>فريقنا المتخصص في عزل الأسطح جاهز لمعاينة موقعك وتقديم أنسب الحلول بأسعار تنافسية في جميع مناطق الكويت.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>