<?php
// services/dewaniya.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'تصميم ديوانية الكويت فخمة ومودرن | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تصميم وتنفيذ ديوانيات كويتية فاخرة - جلسات أرضية ومرتفعة، بدائل خشب ورخام، ألواح 3D، إضاءات مخفية. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>فخامة الضيافة الكويتية الأصيلة بروح عصرية</span></div>
    <h1 class="hero-title"><span class="gold-text">تصميم وتنفيذ ديوانية الكويت</span></h1>
    <p class="hero-description">
      الديوانية هي قلب البيت الكويتي وواجهة الكرم والضيافة. نصمم وننفذ ديوانيات تجمع بين الهيبة والفخامة التراثية وأحدث معايير الديكور المودرن مع معالجة صوتية وعزل وإضاءة سينمائية مريحة.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة وتصميم ديوانية</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة صور ديوانيات منجزة</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (14).jpeg" alt="ديوانية كويتية فخمة من أعمالنا" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">من أعمالنا الميدانية الموثقة</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">ديوانية كويتية بجدار ثلاثي الأبعاد 3D Wave</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        تنفيذ جدار ديكوري مموج بتقنية ثلاثية الأبعاد مع إضاءات ليد وورم مدمجة، ثريا كريستال فاخرة، وأطقم كنب منخفضة بتوزيع هندسي يتيح استيعاب أكبر عدد من الضيوف براحة تامة.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في تنفيذ ديوانية بتصميم 3D Wave') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">استفسر عن تكلفة هذا التصميم</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">مميزات ديوانيات الشركة العربية للمنازل</h2>
    <p class="section-subtitle">دقة في كل تفصيل من مدخل الديوانية والمغاسل وحتى أماكن تقديم القهوة والشاي.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">🛋️</div><div class="feature-box-content"><h4>جلسات مريحة وتوزيع ذكي</h4><p>جلسات كويتية مرتفعة أو أرضية تمنح الضيوف أقصى درجات الراحة لساعات طويلة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔊</div><div class="feature-box-content"><h4>عزل صوتي وتنسيق صوتيات</h4><p>حوائط acoustic عازلة لمنع الصدى وتمديد أنظمة صوتية وشاشات عملاقة بدقة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">☕</div><div class="feature-box-content"><h4>مطبخ تحضيري ومغاسل فخمة</h4><p>تصميم أركان ضيافة ومغاسل رخامية فاخرة تليق باستقبال الضيوف والشخصيات.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💡</div><div class="feature-box-content"><h4>تحكم ذكي بالإضاءة والتكييف</h4><p>أنظمة Smart Home للتحكم في السيناريوهات الضوئية ودرجات التبريد بسهولة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⏱️</div><div class="feature-box-content"><h4>سرعة تسليم والتزام تام</h4><p>تسليم الديوانية جاهزة على المفتاح مع تركيب كافة الديكورات والأصباغ والفرش.</p></div></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">خطوات تصميم وتنفيذ الديوانية</h2>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. معاينة المساحة وتحديد الطاقة الاستيعابية</h3><p class="timeline-desc">معرفة عدد الضيوف المستهدف وتحديد مدخل الضيوف والمغاسل والخدمات.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. تقديم مقترح 3D فندقي</h3><p class="timeline-desc">عرض محاكاة كاملة للديوانية بالألوان والأخشاب ووحدة الشاشة والجلسات.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. أعمال الجبس بورد والعزل والإضاءات</h3><p class="timeline-desc">تنفيذ ديكورات الأسقف، بروفايل ليد، عزل الصوت وتمديد التكييف المخفي.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. تركيب بدائل الرخام والأخشاب والتجاليد</h3><p class="timeline-desc">تكسية الجدران ببديل الرخام، بديل الخشب، البانوهات، والمرايا العاكسة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. التسليم النهائي مع تجهيز المفاتيح والإنارة</h3><p class="timeline-desc">فحص كامل لكافة الأنظمة وتسليم الموقع في أبهى حلة تليق بك وبضيوفك.</p></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل تخطط لبناء أو تجديد ديوانيتك في الكويت؟</h3>
    <p>فريقنا المختص جاهز لتقديم المشورة الهندسية وكتالوجات أحدث ديوانيات <?= date('Y') ?> مجاناً.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالمهندس: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>