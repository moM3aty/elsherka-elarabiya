<?php
// services/alternatives.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'بديل الخشب والرخام الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تركيب وتوريد بديل الخشب وبديل الرخام (PVC / WPC) في الكويت - شاشات تلفزيون معلقة، مداخل فلل، إضاءات مخفية وألواح مضادة للرطوبة والحرارة. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>أفضل خامات PVC & WPC الكورية والألمانية</span></div>
    <h1 class="hero-title"><span class="gold-text">بديل الخشب والرخام في الكويت</span></h1>
    <p class="hero-description">
      الحل الديكوري الأحدث والأكثر طلباً لتزيين الجدران ومداخل الفلل وخلفيات شاشات التلفزيون. مظهر فخم يطابق الخشب الطبيعي والرخام الإيطالي بوزن خفيف، ومقاومة 100% للرطوبة وسهولة فائقة في التنظيف.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة وكتالوج العينات</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة صور التجاليد المنجزة</a>
    </div>
  </div>
</section>

<!-- Real Work Highlight -->
<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (32).jpeg" alt="تجاليد شاشة وبديل خشب مضيء من أعمالنا" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">تنفيذ ميداني مباشر</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">تجاليد مضلعة لشاشة التلفزيون مع كونسول معلق</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        دمج احترافي بين ألواح بديل الخشب المضلع ذات اللون الأبيض العاجي مع لوح خشبي بارز بإضاءة ليد وورم محيطية وكونسول أرضي طائر يوفر تناسقاً فائق النقاء والأناقة.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في تنفيذ تجاليد شاشة مثل هذه الصورة') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">احصل على نفس التصميم</a>
    </div>
  </div>
</section>

<!-- Features Grid -->
<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا يفضل العملاء بدائل الخشب والرخام؟</h2>
    <p class="section-subtitle">مزايا عملية واقتصادية متفوقة على المواد التقليدية.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">💧</div><div class="feature-box-content"><h4>مقاومة مطلقة للماء والرطوبة</h4><p>لا تتأثر بالرطوبة أو مياه الغسيل، ومثالية لمناخ الكويت والمداخل.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🐜</div><div class="feature-box-content"><h4>مضادة للأرضة والحشرات</h4><p>مصنوعة من بوليمرات معالجة لا تجذب النمل الأبيض أو الفطريات نهائياً.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔥</div><div class="feature-box-content"><h4>مقاومة للاشتعال والحرارة</h4><p>خامات ذاتية الإطفاء ومعتمدة بمعايير الأمان والسلامة الدولية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⚡</div><div class="feature-box-content"><h4>سرعة فائقة في التركيب</h4><p>يتم تركيب الجدار بالكامل خلال ساعات معدودة بدون تكسير أو غبار مزعج.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💰</div><div class="feature-box-content"><h4>تكلفة اقتصادية مع فخامة باهرة</h4><p>تمنحك مظهر الرخام الإيطالي الفاخر بنسبة توفير تفوق 60% من التكلفة.</p></div></div>
    </div>
  </div>
</section>

<!-- Subservices -->
<section class="services-section">
  <div class="container">
    <h2 class="section-title">أشهر استخدامات بدائل الخشب والرخام</h2>
    <div class="subservices-grid">
      <div class="subservice-card"><div class="subservice-icon">📺</div><div><h4>خلفيات شاشات التلفزيون (TV Units)</h4><p>دمج بديل الرخام اللامع مع شرائح بديل الخشب المضلع وبروفايل ليد ذهبي أو أسود.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🚪</div><div><h4>مداخل الفلل والشقق والصالات</h4><p>تكسية كاملة للمداخل مع مرايا مموجة وأعمدة ديكورية تعطي انطباعاً أولاً مبهراً.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🚿</div><div><h4>تجاليد المغاسل ودورات المياه</h4><p>ألواح PVC رخامية متصلة خالية من فواصل الترويبة سهلة التنظيف والتعقيم.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🏛️</div><div><h4>الديوانيات والمجالس الكويتية</h4><p>تنسيق ألوان عصرية ودمج الإضاءات المخفية مع الرفوف المعلقة واللوحات الفنية.</p></div></div>
    </div>
  </div>
</section>

<!-- Timeline -->
<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">خطوات التركيب الاحترافي</h2>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. أخذ المقاسات واختيار النقشة</h3><p class="timeline-desc">معاينة الموقع وعرض عينات ألوان الرخام (أبيض كلكتا، أسود ماركينا، بيج إمبرادور) والبدائل الخشبية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. تجهيز وتأسيس الحائط وتمديد الإضاءات</h3><p class="timeline-desc">سحب كابلات ومحولات الليد المخفي وتحديد أماكن المقابس والتلفزيون.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. القص الليزري الدقيق للألواح</h3><p class="timeline-desc">قص الألواح بما يضمن تطابق العروق الرخامية وعدم وجود أي فوارق.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. التثبيت بسيليكون ألماني خاص عالي القوة</h3><p class="timeline-desc">تثبيت متين ومحكم يضمن ثبات الألواح لعشرات السنين دون أي انفصال.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. تركيب الإكسسوارات والشريط الليد والتسليم</h3><p class="timeline-desc">تشغيل الإنارة وتركيب الزوايا النحاسية أو الذهبية وتنظيف السطح تماماً.</p></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تحويل صالتك أو مدخلك مع بدائل الخشب والرخام؟</h3>
    <p>فنيونا في خدمتك بجميع مناطق الكويت مع أحدث كتالوجات <?= date('Y') ?> وأفضل أسعار المتر.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>