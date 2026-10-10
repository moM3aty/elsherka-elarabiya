<?php
// services/painting.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'أفضل صباغ الكويت | الشركة العربية للمنازل للتجارة العامة والمقاولات';
$pageDescription = 'أفضل صباغ في الكويت - دهانات حوائط، صباغة شقق وفلل، دهانات داخلية وخارجية، معالجة رطوبة وتشطيب نظيف 100%. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>شركة أصباغ الكويت المعتمدة</span></div>
    <h1 class="hero-title"><span class="gold-text">أفضل صباغ الكويت</span></h1>
    <p class="hero-description" style="margin-bottom: 1.2rem;">
      إذا كنت تبحث عن صباغ الكويت يقدم شغل نظيف وتشطيب احترافي يدوم، فأنت في المكان الصحيح. نحن نوفر خدمات دهان وصباغة في الكويت للمنازل والشقق والفلل باستخدام أفضل الخامات وأحدث التقنيات للحصول على نتيجة مثالية تعكس ذوقك.
    </p>
    <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 2.5rem;">
      نحن في <strong style="color: var(--gold-light);">الشركة العربية للمنازل</strong> متخصصة في أعمال الدهانات والصباغة في الكويت ونضمن لك جودة عالية، سرعة في التنفيذ، وأسعار تنافسية تفرق من أول نظرة.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
        <span>احصل على استشارة مجانية</span>
      </a>
      <a href="#services-list" class="btn btn-outline"><span>اكتشف خدماتنا</span></a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا تختار صباغ محترف في الكويت؟</h2>
    <p class="section-subtitle">اختيار صباغ شاطر في الكويت يوفر عليك وقت وتكلفة ويضمن لك نتيجة أفضل تدوم طويلاً.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z"/></svg></div><div class="feature-box-content"><h4>دهانات عالية الجودة</h4><p>نستخدم أفضل الخامات المقاومة للرطوبة والعوامل الجوية بالكويت.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 011.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2z"/></svg></div><div class="feature-box-content"><h4>تناسق الألوان</h4><p>اختيار ألوان تناسب المساحة وتوزيع الإضاءة الطبيعية والصناعية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div><div class="feature-box-content"><h4>تنفيذ دقيق</h4><p>عمل مدروس هندسياً بدون أخطاء أو عيوب بفضل خبرتنا الطويلة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div class="feature-box-content"><h4>سرعة في الإنجاز</h4><p>التزام تام بتسليم العمل في الموعد المحدد دون أي تأخير.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/></svg></div><div class="feature-box-content"><h4>تشطيب نظيف 100%</h4><p>نحافظ على نظافة المكان والأرضيات وتغطية الأثاث والزجاج بالكامل.</p></div></div>
    </div>
  </div>
</section>

<section class="services-section" id="services-list">
  <div class="container">
    <h2 class="section-title">خدمات الصباغة في الكويت</h2>
    <p class="section-subtitle">نقدم جميع خدمات الدهان والصباغة الاحترافية التي تناسب كافة المساحات والأذواق.</p>
    <div class="subservices-grid">
      <div class="subservice-card"><div class="subservice-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="8" y1="6" x2="10" y2="6"/><line x1="14" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="10" y2="10"/><line x1="14" y1="10" x2="16" y2="10"/></svg></div><div><h4>دهان شقق الكويت</h4><p>تنفيذ كامل لجميع أعمال الدهان للشقق مع اختيار ألوان تناسب المساحات وتزيد من اتساعها البصري.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><h4>دهان فلل الكويت</h4><p>صباغة فلل بتشطيبات فخمة تناسب المساحات الكبيرة والديكور الراقي مع دمج الألوان بأسلوب عصري.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="7" rx="2"/><path d="M12 10v6a3 3 0 01-3 3H7a2 2 0 00-2 2v1"/></svg></div><div><h4>دهان داخلي</h4><p>دهانات حوائط داخلية بجودة عالية تعطي مظهراً أنيقاً ومريحاً، متوافقة مع الأثاث وتوزيع الإضاءة.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg></div><div><h4>دهان خارجي</h4><p>دهانات مقاومة للعوامل الجوية وحرارة الشمس والرطوبة مع عمر افتراضي طويل.</p></div></div>
      <div class="subservice-card" style="grid-column: 1 / -1; max-width: 600px; margin: 0 auto; width: 100%;"><div class="subservice-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 11-2.12-9.36L23 10"/></svg></div><div><h4>تجديد الدهانات</h4><p>إعادة دهان وتجديد المنازل القديمة بأحدث الألوان والتصاميم العصرية لتغيير جو المكان بالكامل.</p></div></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">خطوات شغلنا في الصباغة</h2>
    <p class="section-subtitle">نشتغل بخطوات مدروسة وتأسيس سليم لضمان أفضل نتيجة تعيش معك لسنوات.</p>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. تنظيف وتجهيز الجدران</h3><p class="timeline-desc">إزالة الأتربة والدهانات القديمة المتقشرة لضمان سطح نظيف وقابل للالتصاق التام.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. معالجة الشقوق والعيوب</h3><p class="timeline-desc">استخدام المعجون المخصص وسنفرة الجدران لتكون مستوية وناعمة تماماً وخالية من التموجات.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. وضع طبقة الأساس (Primer)</h3><p class="timeline-desc">تطبيق طلاء الأساس لسد المسام وضمان تشبع الجدار وتثبيت لون الدهان النهائي.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. تطبيق الدهان النهائي بدقة</h3><p class="timeline-desc">دهان الطبقات النهائية باللون المختار مع مراعاة دمج الألوان والحصول على ملمس ناعم.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. تسليم نظيف</h3><p class="timeline-desc">رفع التغطيات، تنظيف المكان من أي بقايا طلاء، وتسليمك الموقع وهو يلمع وبدون أي فوضى.</p></div>
    </div>
  </div>
</section>

<section class="methodology-section" style="background: rgba(12, 18, 33, 0.4);">
  <div class="container">
    <div class="faq-features-grid">
      <div class="faq-card">
        <h2 style="font-size: 1.5rem; color: #fff; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.6rem;"><span>❓</span><span>الأسئلة الشائعة (FAQ)</span></h2>
        <div class="accordion-item active">
          <div class="accordion-header"><span>كم سعر الصباغ في الكويت؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">السعر يختلف حسب المساحة وحالة الجدران ونوع الدهان المطلوب، لكننا نوفر دائماً أسعاراً تنافسية جداً تناسب جميع الميزانيات.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header"><span>ما أفضل نوع دهان في الكويت؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">نستخدم أفضل العلامات التجارية والدهانات عالية الجودة والمقاومة للرطوبة والحرارة، القابلة للغسيل.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header"><span>هل تقدمون خدمة صباغة شقق كاملة؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">نعم بالتأكيد، نحن متخصصون في تقديم دهان كامل وتجديد شامل للشقق والفلل مع إشراف كامل وتسليم مفتاح.</div>
        </div>
      </div>

      <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <div class="info-card">
          <h3 style="font-size: 1.3rem; color: #fff; margin-bottom: 1.2rem; display: flex; align-items: center; gap: 0.6rem;"><span>⭐</span><span>مميزات شغلنا</span></h3>
          <ul class="bullet-list">
            <li class="bullet-item"><span class="bullet-icon">✔</span> خبرة طويلة في السوق الكويتي منذ 2004.</li>
            <li class="bullet-item"><span class="bullet-icon">✔</span> فريق صباغين محترفين وماهرين ومدربين.</li>
            <li class="bullet-item"><span class="bullet-icon">✔</span> التزام صارم بالمواعيد والتسليم في الوقت المحدد.</li>
            <li class="bullet-item"><span class="bullet-icon">✔</span> أسعار مناسبة ومنافسة تفرق من أول نظرة.</li>
            <li class="bullet-item"><span class="bullet-icon">✔</span> خامات عالمية عالية الجودة ومقاومة للرطوبة.</li>
            <li class="bullet-item"><span class="bullet-icon">✔</span> تشطيب نظيف وبدون أي أخطاء أو بهدلة بالمكان.</li>
          </ul>
        </div>
        <div class="info-card">
          <h3 style="font-size: 1.3rem; color: #fff; margin-bottom: 0.8rem; display: flex; align-items: center; gap: 0.6rem;"><span>📍</span><span>المناطق التي نخدمها</span></h3>
          <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1rem;">نقدم خدمات صباغ الكويت في جميع المناطق بسرعة واستجابة فورية:</p>
          <div class="coverage-pill-row">
            <span class="coverage-pill">الفروانية</span>
            <span class="coverage-pill">حولي</span>
            <span class="coverage-pill">الجهراء</span>
            <span class="coverage-pill">الأحمدي</span>
            <span class="coverage-pill">العاصمة</span>
            <span class="coverage-pill">مبارك الكبير</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container" style="padding: 4rem 1.5rem 0;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تغيير وتجديد دهانات منزلك بأعلى جودة؟</h3>
    <p>تواصل معنا الآن للحصول على معاينة مجانية وكتالوج أحدث ألوان <?= date('Y') ?> بأسعار مناسبة لجميع الميزانيات.</p>
    <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold"><span>اتصل بالصباغ: <?= e($SITE_PHONE) ?></span></a>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في حجز معاينة لأعمال الصباغة') ?>" target="_blank" class="btn btn-outline"><span>محادثة واتساب سريعة</span></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>