<?php
// services/reception-halls.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'صالات استقبال خارجية وديكورات كرفانات الكويت | الشركة العربية للمنازل';
$pageDescription = 'تصميم وتنفيذ صالات استقبال خارجية فاخرة مع ديكورات كرفانات في الكويت - جلسات خارجية، مظلات، تنسيق حدائق. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>ضيافة خارجية راقية بأسلوب كويتي فاخر</span></div>
    <h1 class="hero-title"><span class="gold-text">صالات الاستقبال الخارجية وديكورات الكرفانات</span></h1>
    <p class="hero-description">
      نصمم وننفذ صالات استقبال خارجية فاخرة تليق بفللك وقسيمتك في الكويت. من الجلسات المظللة وديكورات الكرفانات المميزة إلى الأرضيات الخارجية والإضاءة الليلية الساحرة، نحول مساحتك الخارجية إلى فضاء ضيافة لا يُنسى.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب تصميم ومعاينة: <?= e($SITE_PHONE) ?></a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة صالات منجزة</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (14).jpeg" alt="صالة استقبال خارجية فاخرة مع كرفان ديكوري" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">من أعمالنا الفعلية الموثقة</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">صالة استقبال خارجية مكيفة مع كرفان ديكوري فاخر</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        تنفيذ كرفان مكيف بواجهة خشبية ملامين مع جلسة خارجية مظللة بسقف خشبي، إضاءة دافئة مخفية، وأرضيات بورسلان خارجية. المساحة تتسع لـ 30 ضيفاً براحة تامة في مختلف الفصول.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في تصميم صالة استقبال خارجية مع كرفان') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">استفسر عن تكلفة التصميم</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">ماذا تشمل صالات الاستقبال الخارجية؟</h2>
    <p class="section-subtitle">حلول متكاملة من التصميم حتى التسليم النهائي على المفتاح.</p>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">🏕️</div><div class="feature-box-content"><h4>كرفانات مكيفة بواجهات ديكورية</h4><p>كرفانات بمواصفات عالية بواجهات خشب ملامين أو بديل الرخام مع نوافذ وأبواب عازلة للحرارة والصوت.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">☂️</div><div class="feature-box-content"><h4>مظلات وأسقف خشبية مظللة</h4><p>هياكل خشبية أو حديدية مكسوة بخشب أو برجولة مع أقمشة مظللة UV مقاومة للأشعة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🪑</div><div class="feature-box-content"><h4>جلسات خارجية وكنب مقاوم للطقس</h4><p>ترتيب الجلسات الخارجية بكنب راتان وأثاث أوتدور مقاوم للشمس والرطوبة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💡</div><div class="feature-box-content"><h4>إضاءة ليلية احترافية</h4><p>إضاءة LED مخفية في البروفايل وأعمدة إضاءة حدائق وإضاءة اسبوت لوكس.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🪴</div><div class="feature-box-content"><h4>تنسيق حدائق وزراعة خضراء</h4><p>تصميم حدائق ومساحات خضراء حول الصالة مع أحواض زراعة مزخرفة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🔲</div><div class="feature-box-content"><h4>أرضيات خارجية مقاومة للانزلاق</h4><p>تركيب بورسلان خارجي anti-slip بمقاسات كبيرة أو حجر طبيعي أو خشب ديكينج.</p></div></div>
    </div>
  </div>
</section>

<section class="leadership-values-section">
  <div class="container">
    <h2 class="section-title">أنماط التصميم التي ننفذها</h2>
    <div class="values-grid">
      <div class="value-card"><h3 class="value-card-title">🏛️ الطراز الكلاسيكي الفاخر</h3><p class="value-card-desc">أعمدة رخامية، تيجان جبس، أرضيات بورسلان رخامي كبير، وديكورات ذهبية.</p></div>
      <div class="value-card"><h3 class="value-card-title">🌿 الطراز الطبيعي العضوي</h3><p class="value-card-desc">خشب دافئ، حجر طبيعي، نباتات خضراء كثيفة، وإضاءة هادئة لأجواء هادئة وعصرية.</p></div>
      <div class="value-card"><h3 class="value-card-title">⚡ الطراز المودرن المعاصر</h3><p class="value-card-desc">خطوط نظيفة، مواد صناعية راقية، إضاءة LED عصرية، وأثاث أوتدور مودرن.</p></div>
      <div class="value-card"><h3 class="value-card-title">🏮 الطراز الكويتي التراثي</h3><p class="value-card-desc">مشربيات خشبية، وسائد أرضية تراثية، فوانيس وإضاءة شرقية لفضاء يعكس الهوية.</p></div>
    </div>
  </div>
</section>

<section class="timeline-section">
  <div class="container">
    <h2 class="section-title">كيف ننفذ مشروع صالة الاستقبال الخارجية؟</h2>
    <div class="timeline-list">
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">1. زيارة الموقع وقياس المساحة</h3><p class="timeline-desc">نزور القسيمة أو الفيلا، نقيس المساحة ونستشير صاحب المشروع لفهم الذوق والميزانية.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">2. تقديم مخطط ثلاثي الأبعاد</h3><p class="timeline-desc">نعرض رسومات 3D كاملة للصالة من الخارج والداخل مع كافة التفاصيل.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">3. تنفيذ الهيكل الإنشائي والكرفان</h3><p class="timeline-desc">بناء وتجهيز هيكل الكرفان والمظلات والأسقف المظللة وتمديدات الكهرباء.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">4. تشطيب الديكورات الداخلية والخارجية</h3><p class="timeline-desc">تركيب الأرضيات والواجهات والجدران الديكورية مع طلاء الأصباغ وتركيب الإضاءة.</p></div>
      <div class="timeline-item"><div class="timeline-node"></div><h3 class="timeline-title">5. التسليم النهائي وتنسيق الحديقة</h3><p class="timeline-desc">تسليم الصالة جاهزة مع تنسيق المساحة الخضراء والإضاءة الليلية.</p></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل تخطط لصالة استقبال خارجية لفيلتك أو قسيمتك؟</h3>
    <p>فريقنا المتخصص في التصميم الخارجي وديكورات الكرفانات متواجد في جميع مناطق الكويت ويقدم استشارة مجانية.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بنا: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>