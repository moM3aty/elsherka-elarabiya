<?php
// services/finishing.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'تشطيب داخلي الكويت تسليم مفتاح | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تشطيب داخلي متكامل للفلل والقسائم السكنية والشقق في الكويت - أعمال صحي، كهرباء، جبس، أرضيات، أصباغ وديكور تسليم مفتاح. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>تصنيف المناقصات المركزية الفئة الثالثة للأعمال المدنية</span></div>
    <h1 class="hero-title"><span class="gold-text">تشطيب داخلي الكويت (تسليم مفتاح)</span></h1>
    <p class="hero-description">
      الشركة العربية للمنازل تقدم خدمات التشطيب الداخلي المتكامل للفلل والقسائم السكنية والشقق الاستثمارية بأعلى المواصفات الهندسية. نلتزم بالعقود المعتمدة والجدول الزمني وضمان شامل على كافة الأعمال.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب مقايسة ومعاينة مجانية</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة فيديوهات التشطيب المباشرة</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا نحن خيارك الأول في التشطيب بالكويت؟</h2>
    <p class="section-subtitle">أكثر من 20 عاماً من المصداقية والالتزام في القسائم الحكومية والخاصة.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">📜</div><div class="feature-box-content"><h4>عقود قانونية وضمانات موثقة</h4><p>التزام تام ببنود العقد وجدول الدفعات الميسر حسب مراحل الإنجاز.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">👷</div><div class="feature-box-content"><h4>إشراف هندسي يومي</h4><p>مهندسون ومراقبون موقعيون يشرفون على العمالة لضمان صفر أخطاء.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🛠️</div><div class="feature-box-content"><h4>عمالة فنية متخصصة ومصنفة</h4><p>عمالة ماهرة لكل مهنة: مساح، سباك، كهربائي، صباغ، نجار، ومبلط.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💎</div><div class="feature-box-content"><h4>أفضل الخامات والمواد المعتمدة</h4><p>استخدام خامات مقاومة للحرارة والرطوبة ومعتمدة بالمؤسسة العامة للإسكان.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔑</div><div class="feature-box-content"><h4>تسليم مفتاح نظيف 100%</h4><p>استلم منزلك جاهزاً بالكامل للسكن مع تنظيف شامل لكافة المرافق.</p></div></div>
    </div>
  </div>
</section>

<section class="services-section">
  <div class="container">
    <h2 class="section-title">باقات وأعمال التشطيب الداخلي</h2>
    <p class="section-subtitle">خدمات تنفيذية شاملة تغطي كافة مراحل البناء والتشطيب الداخلي والخارجي.</p>
    <div class="subservices-grid">
      <div class="subservice-card"><div class="subservice-icon">⚡</div><div><h4>التأسيسات الكهربائية والإضاءة</h4><p>تمديد الوايرات المعتمدة، لوحات التوزيع الذكية، وتوزيع الإضاءات السقفية والليد بروفايل.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🚰</div><div><h4>أعمال الصحي والسباكة والعزل</h4><p>عزل الحمامات والمطابخ، تمديد بايبات ألمانية معتمدة، وتركيب أطقم صحية فاخرة مع كفالة.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🔲</div><div><h4>أرضيات البورسلان والسيراميك والرخام</h4><p>قص ليزر، تسوية بالليزر، وجلي وتلميع الرخام الإيطالي والسيراميك الإسباني بأعلى دقة.</p></div></div>
      <div class="subservice-card"><div class="subservice-icon">🧱</div><div><h4>الأسقف المعلقة والجبس بورد</h4><p>شاسيهات صاج ثقيل مقاوم للصدأ، ألواح جبس مقاومة للرطوبة، وتصاميم فندقية ساحرة.</p></div></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">مراحل وخطوات تنفيذ التشطيب الداخلي</h2>
    <p class="section-subtitle">جدول زمني محكم ومرحلي يتيح لك متابعة تقدم العمل في موقعك بكل شفافية.</p>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. المعاينة وإعداد جدول الكميات والمقايسة</h3><p class="timeline-desc">زيارة العقار ورفع الأبعاد وتقديم عرض سعر مفصل شفاف بدون أي بنود خفية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. توقيع العقد واعتماد المخططات والتصاميم</h3><p class="timeline-desc">تثبيت جدول المواصفات وتواريخ التسليم والمواد المتفق عليها مع العميل.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. مرحلة التأسيس (العزل، الصحي، الكهرباء)</h3><p class="timeline-desc">تنفيذ التمديدات الأساسية واختبار الضغط والعزل المائي لضمان الجودة قبل الإغلاق.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. مرحلة المساح والجبس والأرضيات</h3><p class="timeline-desc">تركيب شبكة الأسقف الجبسية، تمديد البورسلان والرخام ومحاذاة الزوايا الدقيقة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. التشطيب النهائي، الأصباغ والديكور والتسليم</h3><p class="timeline-desc">تطبيق الدهانات والبدائل والأبواب وتركيب المفاتيح والتنظيف الشامل وتسليم المفتاح.</p></div>
    </div>
  </div>
</section>

<section class="methodology-section" style="background: rgba(12, 18, 33, 0.4);">
  <div class="container">
    <div class="faq-features-grid">
      <div class="faq-card">
        <h2 style="font-size: 1.5rem; color: #fff; margin-bottom: 1.5rem;">❓ الأسئلة الشائعة حول التشطيب في الكويت</h2>
        <div class="accordion-item active">
          <div class="accordion-header"><span>ما هي آلية الدفعات المالية في عقود التشطيب؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">يتم تقسيم الدفعات على 5 إلى 7 مراحل مرتبطة بنسبة الإنجاز الفعلية، بحيث لا يدفع العميل دفعة إلا بعد معاينة واعتماد المرحلة السابقة.</div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header"><span>هل تقدمون ضماناً على أعمال التشطيب؟</span><svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="accordion-content">نعم، نوفر ضماناً شاملاً يصل إلى 10 سنوات على أعمال العزل والتأسيسات وضماناً على التشطيبات النهائية.</div>
        </div>
      </div>
      <div class="info-card">
        <h3 style="font-size: 1.3rem; color: #fff; margin-bottom: 1rem;">📞 احجز موعد لمعاينة قسيمتك أو شقتك</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">تواصل مباشرة مع المهندس التنفيذي بالشركة العربية للمنازل للحصول على دراسة تفصيلية لمشروعك.</p>
        <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold" style="width: 100%;">اتصل بنا: <?= e($SITE_PHONE) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>