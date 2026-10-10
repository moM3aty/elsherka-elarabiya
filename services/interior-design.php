<?php
// services/interior-design.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'التصميم الداخلي 3D في الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'خدمات التصميم الداخلي 3D والمخططات التنفيذية للفلل والديوانيات والشقق والمحلات التجارية في الكويت. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>تصاميم معمارية ثلاثية الأبعاد 3D</span></div>
    <h1 class="hero-title"><span class="gold-text">التصميم الداخلي في الكويت</span></h1>
    <p class="hero-description">
      نحول المساحات الصامتة إلى تحف فنية تنبض بالحياة والجمال. تصاميم داخلية عصرية ومدروسة هندسياً تعكس ذوقك الخاص وتستغل كل متر مربع بأقصى فاعلية ممكنة.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">احصل على استشارة تصميم مجانية</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">تصفح مشاريع التصميم</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا تختارنا في التصميم الداخلي؟</h2>
    <p class="section-subtitle">خبرتنا الممتدة منذ عام 2004 تضمن لك تصاميم قابلة للتنفيذ على أرض الواقع دون هدر أو تكاليف غير محسوبة.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">💡</div><div class="feature-box-content"><h4>رؤية ثلاثية الأبعاد 3D واقعية</h4><p>تشاهد منزلك كما سيكون بدقة متناهية قبل البدء بأي أعمال تنفيذية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">📐</div><div class="feature-box-content"><h4>مخططات تنفيذية تفصيلية</h4><p>مخططات كهرباء، سباكة، أسقف، وأرضيات دقيقة للعمال والمهندسين.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🎨</div><div class="feature-box-content"><h4>اختيار دقيق للمواد والخامات</h4><p>تحديد الألوان والبدائل والأخشاب المتوفرة بالسوق الكويتي بأفضل الأسعار.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⏱️</div><div class="feature-box-content"><h4>تسليم سريع وتعديلات مرنة</h4><p>نعمل معك خطوة بخطوة حتى الوصول إلى الرضا التام عن التصميم.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💰</div><div class="feature-box-content"><h4>توفير حقيقي في الميزانية</h4><p>التصميم السليم يمنع الأخطاء في مرحلة التشطيب ويوفر عليك آلاف الدنانير.</p></div></div>
    </div>
  </div>
</section>

<section class="services-section">
  <div class="container">
    <h2 class="section-title">خدمات التصميم الداخلي المتوفرة</h2>
    <p class="section-subtitle">حلول تصميمية تغطي مختلف أنواع العقارات السكنية والتجارية في دولة الكويت.</p>
    <div class="subservices-grid">
      <div class="subservice-card"><div class="subservice-icon">🏡</div><div><h4>تصميم داخلي للفلل والقسائم</h4><p>تصميم متكامل للواجهات والصالات وغرف النوم الرئيسية والماستر مع الإضاءات والأسقف.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">👥</div><div><h4>تصميم ديوانيات وصالات استقبال</h4><p>أجواء كويتية أصيلة ومودرن تجمع بين الفخامة والضيافة الراقية وتوزيع الجلسات المريح.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🏢</div><div><h4>تصميم الشقق والمكاتب التجارية</h4><p>استغلال ذكي للمساحات الصغيرة والمتوسطة لمنح شعور بالاتساع والراحة العصرية.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🍽️</div><div><h4>تصميم المطابخ وغرف الملابس (Dressing)</h4><p>تصميم وحدات ملامين وأخشاب تفصيلية مخصصة تناسب حركة الاستخدام اليومية.</p></div></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">مراحل وخطوات إعداد التصميم</h2>
    <p class="section-subtitle">منهجية علمية تضمن تحويل أفكارك إلى واقع ملموس.</p>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. جلسة الاستماع وتحديد الطراز المطلوب</h3><p class="timeline-desc">معرفة الطراز المفضل (مودرن، كلاسيك، نيوكلاسيك، بوهيمي) والميزانية التقديرية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. رفع المقاسات وزيارة الموقع</h3><p class="timeline-desc">رفع مساحي دقيق للمكان وتحديد أماكن التكييف والإضاءات والنوافذ.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. تقديم المخطط المبدئي (Moodboard & Layout)</h3><p class="timeline-desc">توزيع الأثاث والفراغات ومناقشة مقترحات الحركة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. الرندرة ثلاثية الأبعاد 3D Render</h3><p class="timeline-desc">إخراج صور فائقة الدقة تحاكي الواقع بالخامات والألوان والإضاءات الحقيقية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. تسليم حزمة المخططات التنفيذية وجدول الكميات</h3><p class="timeline-desc">تسليم مخططات المقاول وجداول كودات الدهانات والمواد للبدء الفوري بالتنفيذ.</p></div>
    </div>
  </div>
</section>

<section class="methodology-section" style="background: rgba(12, 18, 33, 0.4);">
  <div class="container">
    <div class="faq-features-grid">
      <div class="faq-card">
        <h2 style="font-size: 1.5rem; color: #fff; margin-bottom: 1.5rem;">❓ الأسئلة الشائعة حول التصميم الداخلي</h2>
        <div class="accordion-item active">
          <div class="accordion-header"><span>كم يستغرق إعداد التصميم الداخلي ثلاثي الأبعاد؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">يستغرق التصميم من 7 إلى 14 يوم عمل حسب حجم المشروع ومساحته مع تسليم مسودات أولية للمراجعة.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header"><span>هل التصميم يشمل الإشراف على التنفيذ؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">نعم، في حال تعاقدكم معنا على تنفيذ التشطيب، يكون التصميم مجانياً أو بخصم خاص مع إشراف هندسي كامل.</div>
        </div>
      </div>
      <div class="info-card">
        <h3 style="font-size: 1.3rem; color: #fff; margin-bottom: 1rem;">📍 نخدم جميع مناطق ومحافظات الكويت</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.2rem;">
          مهندسونا مستعدون لزيارة موقعك في: العاصمة، حولي، الفروانية، الجهراء، مبارك الكبير، والأحمدي.
        </p>
        <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold" style="width: 100%;">اتصل بنا للحجز: <?= e($SITE_PHONE) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>