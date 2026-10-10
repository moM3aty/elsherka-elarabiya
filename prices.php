<?php
// prices.php
require_once __DIR__ . '/config.php';

/* ============ إحصائيات سريعة (اختياري - لعرض شريط ثقة) ============ */
$stats = [
    'projects'   => $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn(),
    'blog'       => $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status='published'")->fetchColumn(),
    'messages'   => $pdo->query("SELECT COUNT(*) FROM messages")->fetchColumn(),
];

$pageTitle       = 'الأسعار وباقات التشطيب والديكور | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'عروض وأسعار التشطيب الفاخر، صباغ الكويت، جبس بورد، بديل الخشب والرخام بأسعار تنافسية تناسب جميع الميزانيات مع ضمان الجودة. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'prices';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>شفافية مطلقة وأسعار تنافسية تفرق من أول نظرة</span></div>
    <h1 class="hero-title">باقات وأسعار <span class="gold-text">التشطيب والديكور</span></h1>
    <p class="hero-description">
      نوفر خطط أسعار مرنة ومقايسات هندسية دقيقة تلائم جميع الميزانيات. اتصل بنا للحصول على مقايسة مجانية مخصصة لقسيمتك أو شقتك مع تفصيل كافة البنود.
    </p>
  </div>
</section>

<!-- Pricing Cards -->
<section class="container" style="margin-bottom: 5rem;">
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">

    <!-- Package 1: أصباغ -->
    <div class="stat-card" style="text-align: right; border-radius: var(--radius-lg); padding: 2.5rem 2rem;">
      <span class="pill-badge">باقة الأصباغ والديكور السريع</span>
      <h3 style="font-size: 1.5rem; color: #fff; margin-bottom: 0.8rem;">صباغة وتجديد الشقق والفلل</h3>
      <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 1.5rem;">مناسبة لتجديد ألوان الشقق والفلل القديمة والجاهزة للسكن.</p>
      <ul class="bullet-list" style="margin-bottom: 2rem;">
        <li class="bullet-item"><span class="bullet-icon">✔</span> صنفرة ومعالجة الشقوق وسحب معجون</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> دهانات ناشيونال وجوتن الأصلية القابلة للغسيل</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> تغطية الأرضيات والأثاث بالكامل</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> تسليم نظيف 100% خلال 3 - 5 أيام</li>
      </ul>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('أرغب في الاستفسار عن باقة الأصباغ') ?>" target="_blank" class="btn btn-outline" style="width: 100%;">طلب تسعير الأصباغ</a>
    </div>

    <!-- Package 2: VIP Featured -->
    <div class="stat-card" style="text-align: right; border: 2px solid var(--gold-primary); border-radius: var(--radius-lg); padding: 2.5rem 2rem; position: relative; background: var(--bg-card-hover); box-shadow: var(--shadow-hover);">
      <div style="position: absolute; top: -14px; right: 24px; background: var(--gold-gradient); color: #080c16; font-size: 0.78rem; font-weight: 800; padding: 0.25rem 1rem; border-radius: 50px;">الأكثر طلباً بالفلل</div>
      <span class="pill-badge" style="background: rgba(223,162,67,0.2);">باقة التشطيب الفاخر (VIP)</span>
      <h3 style="font-size: 1.5rem; color: #fff; margin-bottom: 0.8rem;">تشطيب متكامل تسليم مفتاح</h3>
      <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 1.5rem;">تشطيب هندسي شامل للقسائم الجديدة والفلل من الأسود إلى المفتاح.</p>
      <ul class="bullet-list" style="margin-bottom: 2rem;">
        <li class="bullet-item"><span class="bullet-icon">✔</span> تأسيس وتشطيب كهرباء وصحي مع كفالة</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> أسقف جبس بورد كناوف وبروفايل ليد</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> أرضيات بورسلان وسيراميك إسباني وهندي نخب أول</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> ديكورات بديل خشب ورخام لشاشات التلفزيون والمداخل</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> إشراف هندسي يومي وضمان موثق بالعقد</li>
      </ul>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('أرغب في حجز معاينة لتشطيب قسيمة تسليم مفتاح') ?>" target="_blank" class="btn btn-gold" style="width: 100%;">طلب مقايسة قسيمة تسليم مفتاح</a>
    </div>

    <!-- Package 3: ديوانيات -->
    <div class="stat-card" style="text-align: right; border-radius: var(--radius-lg); padding: 2.5rem 2rem;">
      <span class="pill-badge">باقة الديوانيات والمجالس</span>
      <h3 style="font-size: 1.5rem; color: #fff; margin-bottom: 0.8rem;">تجهيز ديوانية فندقية كاملة</h3>
      <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 1.5rem;">فخامة تليق باستقبال الضيوف مع عزل صوتي وتنسيق إضاءات سينمائية.</p>
      <ul class="bullet-list" style="margin-bottom: 2rem;">
        <li class="bullet-item"><span class="bullet-icon">✔</span> جدار ثلاثي الأبعاد 3D Wave أو تجاليد ملامين</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> أسقف معلقة مع إنارة مخفية سبوت لايت</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> تجهيز منافذ الشاشات العملاقة والصوتيات</li>
        <li class="bullet-item"><span class="bullet-icon">✔</span> تجهيز منطقة المغاسل الرخامية الفاخرة</li>
      </ul>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('أرغب في تسعير تصميم وتنفيذ ديوانية') ?>" target="_blank" class="btn btn-outline" style="width: 100%;">طلب تسعير ديوانية</a>
    </div>

  </div>
</section>

<!-- Stats Bar -->
<section class="container" style="margin-bottom: 5rem;">
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.5rem;">
    <div class="stat-card" style="text-align: center;">
      <span style="font-size: 1.8rem; display: block; margin-bottom: .4rem;">🏗️</span>
      <span style="font-size: 1.8rem; font-weight: 800; color: var(--gold);">6000+</span>
      <span style="color: var(--text-muted); font-size: .88rem; display: block; margin-top: .3rem;">مشروع منفذ</span>
    </div>
    <div class="stat-card" style="text-align: center;">
      <span style="font-size: 1.8rem; display: block; margin-bottom: .4rem;">⭐</span>
      <span style="font-size: 1.8rem; font-weight: 800; color: var(--gold);">20+</span>
      <span style="color: var(--text-muted); font-size: .88rem; display: block; margin-top: .3rem;">سنة خبرة</span>
    </div>
    <div class="stat-card" style="text-align: center;">
      <span style="font-size: 1.8rem; display: block; margin-bottom: .4rem;">🏅</span>
      <span style="font-size: 1.8rem; font-weight: 800; color: var(--gold);">فئة (ج)</span>
      <span style="color: var(--text-muted); font-size: .88rem; display: block; margin-top: .3rem;">تصنيف بلدية الكويت</span>
    </div>
    <div class="stat-card" style="text-align: center;">
      <span style="font-size: 1.8rem; display: block; margin-bottom: .4rem;">🏢</span>
      <span style="font-size: 1.8rem; font-weight: 800; color: var(--gold);">الثالثة</span>
      <span style="color: var(--text-muted); font-size: .88rem; display: block; margin-top: .3rem;">تصنيف المناقصات</span>
    </div>
  </div>
</section>

<!-- FAQ Section (اختياري - يمكن حذفه إن لم تحتجه) -->
<section class="methodology-section" style="background: rgba(12, 18, 33, 0.4); margin-bottom: 5rem;">
  <div class="container">
    <div class="faq-features-grid">
      <div class="faq-card">
        <h2 style="font-size: 1.5rem; color: #fff; margin-bottom: 1.5rem;">❓ الأسئلة الشائعة حول الأسعار</h2>
        <div class="accordion-item active">
          <div class="accordion-header">
            <span>كيف يتم تحديد سعر التشطيب أو الصباغة؟</span>
            <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
          <div class="accordion-content">السعر يتحدد حسب المساحة، المواصفات المطلوبة، نوع الخامات، ومستوى التشطيب. نقوم بالمعاينة المجانية ثم نقدم عرض سعر تفصيلي بالبنود.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header">
            <span>هل المعاينة والمقايسة مجانية فعلاً؟</span>
            <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
          <div class="accordion-content">نعم، المعاينة ورفع المقاسات وتقديم المقايسة التفصيلية مجانية 100% وبدون أي التزام مالي عليك.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header">
            <span>هل توفرون جدول دفعات ميسّر؟</span>
            <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
          <div class="accordion-content">نعم، يتم تقسيم الدفعات على مراحل الإنجاز (5 إلى 7 دفعات) بحيث لا تدفع إلا بعد اعتماد كل مرحلة على أرض الواقع.</div>
        </div>
      </div>

      <div class="info-card">
        <h3 style="font-size: 1.3rem; color: #fff; margin-bottom: 1rem;">📞 احجز معاينتك المجانية الآن</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
          فريقنا الهندسي جاهز لزيارة موقعك في جميع محافظات الكويت وتقديم عرض سعر دقيق بلا أي التزام.
        </p>
        <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold" style="width: 100%;">اتصل بنا: <?= e($SITE_PHONE) ?></a>
      </div>
    </div>
  </div>
</section>

<!-- CTA Box -->
<section class="container" style="padding: 0 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>المعاينة والمقايسة الهندسية مجانية 100% وبدون أي التزام</h3>
    <p>يقوم مهندسنا بزيارة موقعك ورفع القياسات وتقديم جدول مواصفات تفصيلي بالمواد والتكلفة.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالمهندس: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>