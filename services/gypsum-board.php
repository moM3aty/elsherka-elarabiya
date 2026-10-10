<?php
// services/gypsum-board.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'جبس بورد وأسقف معلقة الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تركيب أسقف جبس بورد، قواطع جدارية، ديكورات شاشات وبروفايل ليد في الكويت بخامات فرنسية وكناوف. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>شاسيهات صاج ثقيل وألواح كناوف معتمدة</span></div>
    <h1 class="hero-title"><span class="gold-text">جبس بورد وأسقف معلقة الكويت</span></h1>
    <p class="hero-description">
      تصميم وتركيب أحدث ديكورات الأسقف الجبسية المعلقة، شاشات التلفزيون، والقواطع الجدارية العازلة للصوت والحرارة. استواء 100% بالليزر وضمان تام ضد الهبوط أو التشققات.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة وأسعار المتر</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة صور وفيديوهات الأسقف</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا تختارنا في أعمال الجبس بورد؟</h2>
    <p class="section-subtitle">شغل هندسي متقن يحمي أسقفك ويمنح المكان فخامة استثنائية.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">📏</div><div class="feature-box-content"><h4>وزن وتطابق بالليزر 360 درجة</h4><p>لا مجال للميول أو التعرجات، سطح مستوٍ تماماً كالمسطرة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🛡️</div><div class="feature-box-content"><h4>شاسيهات أوميجا وحديد مجلفن ثقيل</h4><p>هيكل حديدي صلب معلق بتثبيت خرساني يتحمل الثريات والأوزان الثقيلة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💧</div><div class="feature-box-content"><h4>ألواح خضراء مقاومة للرطوبة</h4><p>مخصصة للمطابخ والحمامات الكويتية معالجة ضد التعفن والرطوبة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💡</div><div class="feature-box-content"><h4>تأسيس مسارات الليد بروفايل بدقة</h4><p>تجهيز مخابئ الإضاءة المخفية بدون ظهور أشرطة الإنارة بشكل عشوائي.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🧼</div><div class="feature-box-content"><h4>معالجة فواصل بشاش فرنسي ومعجون ممتاز</h4><p>يمنع ظهور أي شروخ أو تشققات مع تغير فصول السنة ودرجات الحرارة.</p></div></div>
    </div>
  </div>
</section>

<section class="services-section">
  <div class="container">
    <h2 class="section-title">خدمات الجبس بورد المتكاملة</h2>
    <div class="subservices-grid">
      <div class="subservice-card"><div class="subservice-icon">🏛️</div><div><h4>أسقف الصالات والفلل المودرن</h4><p>تصاميم فندقية، أسقف مسطحة (فلات) بدون فواصل، وكورنيش مخفي مع إنارة وورم دافئة.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🧱</div><div><h4>قواطع جدارية عازلة (Partitions)</h4><p>فصل الغرف والمكاتب والعيادات بقواطع سريعة التركيب محشوة بصوف صخري عازل للصوت.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">📺</div><div><h4>ديكورات شاشات وبدائل خشب مدمجة</h4><p>مكتبات وتجاويف جدارية (Niches) مضيئة تعطي بعداً جمالياً راقياً لصالة المعيشة.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🚰</div><div><h4>أسقف المطابخ والحمامات</h4><p>فتحات صيانة مخفية لشفاطات ومكائن التكييف المركزي وسخانات المياه المركزية.</p></div></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">خطوات تركيب الجبس بورد</h2>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. رسم المسار ومناسيب الليزر</h3><p class="timeline-desc">تحديد ارتفاع السقف ومراعاة فتحات التكييف والستائر المخفية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. تثبيت الشاسيه الحديدي المجلفن</h3><p class="timeline-desc">تثبيت تيوبات وزوايا الحديد في الخرسانة بمسامير صلب متينة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. تثبيت ألواح الجبس بورد الأصلية</h3><p class="timeline-desc">ربط الألواح ببراغي مجلفنة مع غاطس ميكرو لتسهيل التغطية بالمعجون.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. سحب معجون الفواصل وشريط الفايبر</h3><p class="timeline-desc">تطبيق 3 طبقات معجون وسنفرة آلية للحصول على نعومة فائقة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. فتح أماكن الإضاءات والتسليم للصباغ</h3><p class="timeline-desc">تخريم فتحات السبوت لايت والتسليم التام لبدء أعمال الطلاء.</p></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل تبحث عن معلم جبس بورد شاطر وسريع في الكويت؟</h3>
    <p>فريقنا جاهز لمعاينة موقعك فوراً وتقديم عروض أسعار شاملة التوريد والتركيب والمعجون.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>