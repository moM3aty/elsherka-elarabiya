<?php
// services/water-leak.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'كشف تسربات المياه وإصلاحها الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'كشف تسربات المياه وإصلاحها بدون تكسير في الكويت - أجهزة حديثة لكشف خرير المياه والرطوبة. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>
<style>
  @keyframes drip { 0%{transform:translateY(-8px);opacity:0}20%{opacity:1}80%{opacity:1}100%{transform:translateY(18px);opacity:0} }
  @keyframes ripple { 0%{transform:scale(0.8);opacity:0.7}100%{transform:scale(2.2);opacity:0} }
  .water-hero-anim{position:relative;display:inline-flex;align-items:center;justify-content:center;width:90px;height:90px;margin:0 auto 1.5rem}
  .water-hero-anim .ripple-ring{position:absolute;width:80px;height:80px;border-radius:50%;border:2px solid rgba(56,182,255,0.45);animation:ripple 2s cubic-bezier(0.4,0,0.2,1) infinite}
  .water-hero-anim .ripple-ring:nth-child(2){animation-delay:.7s}
  .water-hero-anim .ripple-ring:nth-child(3){animation-delay:1.4s}
  .water-hero-anim .drop-icon{position:relative;z-index:2;font-size:2.8rem;animation:drip 2s ease-in-out infinite;filter:drop-shadow(0 0 12px rgba(56,182,255,0.6))}
  @keyframes soundBar{from{transform:scaleY(.4);opacity:.5}to{transform:scaleY(1);opacity:1}}
  .sound-wave-row{display:flex;align-items:flex-end;gap:4px;height:28px;margin:0 auto .4rem;justify-content:center}
  .sound-bar{width:4px;border-radius:4px;background:linear-gradient(180deg,#38b6ff,#1a6bff);animation:soundBar 1.2s ease-in-out infinite alternate}
  .sound-bar:nth-child(1){height:10px;animation-delay:0s}
  .sound-bar:nth-child(2){height:20px;animation-delay:.15s}
  .sound-bar:nth-child(3){height:28px;animation-delay:.3s}
  .sound-bar:nth-child(4){height:20px;animation-delay:.45s}
  .sound-bar:nth-child(5){height:10px;animation-delay:.6s}
  .service-highlight-grid{background:var(--bg-card);border:1px solid var(--border-gold);border-radius:var(--radius-xl);overflow:hidden;display:grid;grid-template-columns:1fr 1fr;gap:0;box-shadow:var(--shadow-card)}
  .service-highlight-img{position:relative;min-height:380px}
  .service-highlight-img img{width:100%;height:100%;object-fit:cover;display:block}
  .service-highlight-text{padding:2.5rem;display:flex;flex-direction:column;justify-content:center}
  @media (max-width:768px){.service-highlight-grid{grid-template-columns:1fr}.service-highlight-img{min-height:240px}.service-highlight-text{padding:1.8rem 1.4rem}}
  .leak-problems-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem;margin-top:2rem}
  @media (max-width:900px){.leak-problems-grid{grid-template-columns:repeat(2,1fr)}}
  @media (max-width:560px){.leak-problems-grid{grid-template-columns:1fr}}
  .leak-problem-card{background:linear-gradient(135deg,rgba(18,27,47,.9),rgba(10,18,36,.95));border:1px solid rgba(56,182,255,.2);border-radius:16px;padding:1.6rem 1.4rem;text-align:center;transition:all .3s ease;position:relative;overflow:hidden}
  .leak-problem-card:hover{border-color:rgba(56,182,255,.5);transform:translateY(-4px);box-shadow:0 12px 28px rgba(0,0,0,.5),0 0 20px rgba(56,182,255,.15)}
  .leak-problem-icon{font-size:2.2rem;margin-bottom:.8rem;display:block}
  .leak-problem-title{font-size:1.05rem;font-weight:700;color:#fff;margin-bottom:.4rem}
  .leak-problem-desc{font-size:.88rem;color:var(--text-muted);line-height:1.6}
  .detect-methods-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem;margin-top:2rem}
  @media (max-width:700px){.detect-methods-grid{grid-template-columns:1fr}}
  .detect-method-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-lg);padding:1.8rem 1.6rem;display:flex;align-items:flex-start;gap:1.2rem;transition:var(--transition)}
  .detect-method-card:hover{border-color:var(--border-gold);transform:translateY(-4px);box-shadow:var(--shadow-hover)}
  .detect-method-icon-wrap{width:52px;height:52px;border-radius:14px;background:rgba(56,182,255,.1);border:1px solid rgba(56,182,255,.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.5rem}
  .detect-method-title{font-size:1.1rem;font-weight:700;color:#fff;margin-bottom:.4rem}
  .detect-method-desc{font-size:.9rem;color:var(--text-muted);line-height:1.65}
  .promise-row{display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center;margin-top:2rem}
  .promise-badge{display:inline-flex;align-items:center;gap:.5rem;padding:.55rem 1.3rem;border-radius:50px;background:rgba(56,182,255,.08);border:1px solid rgba(56,182,255,.3);color:#7dd4fc;font-size:.9rem;font-weight:600}
  .blue-text{background:linear-gradient(135deg,#7dd4fc 0%,#38b6ff 50%,#0ea5e9 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;display:inline-block}
</style>

<section class="hero">
  <div class="container hero-content">
    <div class="water-hero-anim">
      <div class="ripple-ring"></div><div class="ripple-ring"></div><div class="ripple-ring"></div>
      <span class="drop-icon">💧</span>
    </div>
    <div class="pill-badge"><span>كشف دقيق بدون تكسير • إصلاح فوري • ضمان مكتوب</span></div>
    <h1 class="hero-title"><span class="blue-text">كشف تسربات المياه وخرير الأنابيب</span></h1>
    <p class="hero-description">
      نكشف تسربات المياه المخفية في الحوائط والأسقف والأرضيات باستخدام أحدث أجهزة الكشف الإلكترونية بدون تكسير أو هدم. خبرة 20 عاماً في معالجة التسربات والرطوبة وخرير المياه في الكويت بضمان موثق.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل لكشف فوري: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أريد كشف تسرب مياه') ?>" target="_blank" class="btn btn-outline">تواصل واتساب الآن</a>
    </div>
    <div style="margin-top: 2rem;">
      <div class="sound-wave-row">
        <div class="sound-bar"></div><div class="sound-bar"></div><div class="sound-bar"></div><div class="sound-bar"></div><div class="sound-bar"></div>
      </div>
      <p style="color: rgba(125,212,252,0.7); font-size: 0.82rem; font-weight: 600; letter-spacing: 0.5px;">جهاز الاستماع الإلكتروني لكشف خرير المياه</p>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div class="service-highlight-grid">
    <div class="service-highlight-img">
      <img src="<?= SITE_URL ?>/assets/css/p (8).jpeg" alt="كشف تسربات مياه بأجهزة متطورة">
    </div>
    <div class="service-highlight-text">
      <span class="pill-badge" style="background: rgba(56,182,255,0.1); border-color: rgba(56,182,255,0.35); color: #7dd4fc; width: fit-content;">كشف دقيق بدون هدم أو تكسير</span>
      <h3 style="font-size: 1.55rem; color: #fff; margin-bottom: 1rem; line-height: 1.45; margin-top: 0.8rem;">إيجاد التسرب في 30 دقيقة بتقنية الموجات الصوتية</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.85; margin-bottom: 1.2rem;">
        باستخدام جهاز Correlator الإلكتروني وجهاز الاستماع الأرضي، نحدد موقع خرير المياه والتسرب بدقة سنتيمترية دون الحاجة لكسر الجدران أو فتح الأسقف. بعد الكشف نقدم عرضاً للإصلاح بضمان كتابي.
      </p>
      <div class="promise-row" style="justify-content: flex-start; margin-top: 0; margin-bottom: 1.5rem;">
        <span class="promise-badge">✅ بدون تكسير</span>
        <span class="promise-badge">⚡ نتيجة خلال 30 دقيقة</span>
        <span class="promise-badge">📋 تقرير مكتوب</span>
      </div>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أريد كشف تسرب مياه بأجهزة إلكترونية') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">احجز كشفاً مجانياً الآن</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">أنواع التسربات التي نكشفها ونعالجها</h2>
    <p class="section-subtitle">نتعامل مع جميع أنواع مشاكل المياه في المنازل والفلل والمباني التجارية في الكويت.</p>
    <div class="leak-problems-grid">
      <div class="leak-problem-card"><span class="leak-problem-icon">🏠</span><div class="leak-problem-title">تسربات السطح والخزان</div><div class="leak-problem-desc">تسرب المياه من خزان الأسطح أو من الملحق السطحي إلى السقف الداخلي.</div></div>
      <div class="leak-problem-card"><span class="leak-problem-icon">🚿</span><div class="leak-problem-title">تسربات الحمامات والمطابخ</div><div class="leak-problem-desc">تسرب من صواني الدش والبانيو والمغاسل وأنابيب الصرف المخفية.</div></div>
      <div class="leak-problem-card"><span class="leak-problem-icon">🔧</span><div class="leak-problem-title">خرير الأنابيب الداخلية</div><div class="leak-problem-desc">صوت خرير مياه داخل الجدران أو الأسقف ناتج عن تشقق الأنابيب.</div></div>
      <div class="leak-problem-card"><span class="leak-problem-icon">💦</span><div class="leak-problem-title">رطوبة وتعرق الجدران</div><div class="leak-problem-desc">رطوبة مزمنة مع تقشر الدهان وظهور فطريات وعفن.</div></div>
      <div class="leak-problem-card"><span class="leak-problem-icon">🏊</span><div class="leak-problem-title">تسربات المسبح والخزانات</div><div class="leak-problem-desc">انخفاض منسوب مياه المسبح أو الخزانات الأرضية.</div></div>
      <div class="leak-problem-card"><span class="leak-problem-icon">🌊</span><div class="leak-problem-title">تسربات شبكة الري الخارجية</div><div class="leak-problem-desc">تسريب أنابيب الحديقة والري تحت الأرض مع تراكم مياه الصرف.</div></div>
    </div>
  </div>
</section>

<section style="padding: 5rem 0; background-color: #080d18; border-top: 1px solid var(--border-subtle);">
  <div class="container">
    <h2 class="section-title">تقنياتنا المتطورة للكشف بدون تكسير</h2>
    <p class="section-subtitle">نستخدم أحدث المعدات الإلكترونية الأوروبية للكشف عن التسربات بدقة عالية.</p>
    <div class="detect-methods-grid">
      <div class="detect-method-card"><div class="detect-method-icon-wrap">🎧</div><div><div class="detect-method-title">جهاز الاستماع الإلكتروني (Acoustic Detector)</div><div class="detect-method-desc">يكشف عن صوت خرير المياه المنقولة عبر الأنابيب والجدران بحساسية عالية.</div></div></div>
      <div class="detect-method-card"><div class="detect-method-icon-wrap">📡</div><div><div class="detect-method-title">جهاز Correlator لتقاطع التسربات</div><div class="detect-method-desc">يُحدد موقع التسرب بالتقاطع الإلكتروني بين نقطتين بدقة سنتيمترية.</div></div></div>
      <div class="detect-method-card"><div class="detect-method-icon-wrap">🌡️</div><div><div class="detect-method-title">كاميرا الحرارة الحرارية (Thermal Imaging)</div><div class="detect-method-desc">تصوير حراري يكشف مناطق الرطوبة والتسرب خلف الجدران.</div></div></div>
      <div class="detect-method-card"><div class="detect-method-icon-wrap">💨</div><div><div class="detect-method-title">ضخ الغاز الخامل (Tracer Gas)</div><div class="detect-method-desc">ضخ غاز الهيدروجين غير الضار وتتبع موقع تسربه بجهاز الاستشعار.</div></div></div>
      <div class="detect-method-card"><div class="detect-method-icon-wrap">📷</div><div><div class="detect-method-title">كاميرا التفتيش الداخلي للأنابيب</div><div class="detect-method-desc">كاميرا مرنة مزودة بإضاءة LED تدخل داخل الأنبوب لفحص الشقوق.</div></div></div>
      <div class="detect-method-card"><div class="detect-method-icon-wrap">🔍</div><div><div class="detect-method-title">اختبار ضغط الأنابيب</div><div class="detect-method-desc">اختبار مقاومة الشبكة للضغط لتحديد انخفاض الضغط الدال على تسرب.</div></div></div>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا تختار الشركة العربية لكشف التسربات؟</h2>
    <p class="section-subtitle">نجمع بين الخبرة الطويلة والتقنيات الحديثة لنقدم أدق وأسرع خدمة كشف تسربات في الكويت.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">⚡</div><div class="feature-box-content"><h4>استجابة فورية 24 ساعة</h4><p>فريقنا متاح على مدار الساعة في جميع أيام الأسبوع للحالات الطارئة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔬</div><div class="feature-box-content"><h4>أجهزة كشف ألمانية متخصصة</h4><p>نستخدم أجهزة SEWERIN وRothenberger الألمانية المعتمدة عالمياً.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🏠</div><div class="feature-box-content"><h4>صفر تكسير وصفر فوضى</h4><p>الكشف الإلكتروني بدون هدم مع ضمان الحفاظ على الديكور والتشطيب.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">📋</div><div class="feature-box-content"><h4>تقرير كشف مفصل مكتوب</h4><p>نقدم تقريراً مفصلاً بموقع التسرب وسببه مع توصيات الإصلاح.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🛡️</div><div class="feature-box-content"><h4>ضمان مكتوب على الإصلاح</h4><p>جميع أعمال الإصلاح مضمونة كتابياً لمدة سنة كاملة.</p></div></div>
    </div>
    <div class="promise-row" style="margin-top: 1rem;">
      <span class="promise-badge">💧 جميع مناطق الكويت</span>
      <span class="promise-badge">🏗️ فلل وشقق ومباني تجارية</span>
      <span class="promise-badge">✅ ضمان سنة كاملة</span>
      <span class="promise-badge">📞 طوارئ 24/7</span>
      <span class="promise-badge">🔬 أجهزة ألمانية معتمدة</span>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">كيف نكشف ونعالج التسرب؟</h2>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. الاتصال والتشخيص الأولي عن بُعد</h3><p class="timeline-desc">نستمع لوصفك لمشكلة المياه ونطرح أسئلة تشخيصية لتحديد نوع التسرب.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. زيارة الموقع وفحص الأجهزة الإلكترونية</h3><p class="timeline-desc">يصل الفني المتخصص بالأجهزة ويبدأ الفحص بمنهجية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. تحديد موقع التسرب بدقة</h3><p class="timeline-desc">نحدد الموقع الدقيق للتسرب بالسنتيمتر ونضع علامة واضحة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. تقرير مفصل وعرض الإصلاح</h3><p class="timeline-desc">نقدم تقريراً مكتوباً يشمل سبب التسرب وموقعه وعرض سعر محدد.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. الإصلاح والعزل والضمان المكتوب</h3><p class="timeline-desc">تنفيذ الإصلاح مع تسليم شهادة ضمان كتابية لمدة سنة كاملة.</p></div>
    </div>
  </div>
</section>

<section style="padding: 5rem 0; border-top: 1px solid var(--border-subtle);">
  <div class="container">
    <h2 class="section-title">أسئلة شائعة عن كشف التسربات</h2>
    <div style="max-width: 780px; margin: 2.5rem auto 0;">
      <div class="faq-card">
        <div class="accordion-item">
          <div class="accordion-header">كم يستغرق الكشف عن التسرب؟<svg class="accordion-icon" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">في أغلب الحالات يستغرق الكشف من 30 إلى 60 دقيقة حسب حجم المساحة وتعقيد شبكة الأنابيب.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header">هل يوجد فتح في الجدران أثناء الكشف؟<svg class="accordion-icon" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">لا، الكشف يتم بالكامل بدون أي تكسير. نستخدم الأجهزة الإلكترونية التي تستشعر صوت المياه من خلال الجدران.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header">ما تكلفة كشف التسرب؟<svg class="accordion-icon" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">رسوم الكشف تحدد حسب نوع الجهاز المستخدم وحجم المساحة. اتصل للحصول على سعر محدد: <?= e($SITE_PHONE) ?></div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header">هل تعملون في حالات الطوارئ؟<svg class="accordion-icon" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">نعم، نحن متاحون للطوارئ على مدار 24 ساعة وفي جميع أيام الأسبوع.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header">هل تعملون في جميع مناطق الكويت؟<svg class="accordion-icon" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">نعم، نصل لجميع مناطق الكويت: العاصمة، حولي، الفروانية، مبارك الكبير، الأحمدي، الجهراء، السالمية، الرميثية.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0; border-color: rgba(56,182,255,0.3);">
    <h3>🔧 هل تسمع خرير مياه أو تلاحظ رطوبة في جدرانك؟</h3>
    <p>لا تؤجل! كل يوم تأخير يعني ضرراً أكبر في التشطيب والبنية. فريقنا جاهز للوصول إليك اليوم في أي منطقة بالكويت.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">واتساب طوارئ 24/7</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>