<?php
// services/melamine-wood.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'خشب ملامين الكويت | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تفصيل وتوريد خشب ملامين ألماني وتركي في الكويت - خزائن ملابس، مطابخ، تجاليد حوائط، رفوف ديكورية. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>خامات ملامين MDF & HDF معالجة ضد الرطوبة</span></div>
    <h1 class="hero-title"><span class="gold-text">خشب ملامين الكويت</span></h1>
    <p class="hero-description">
      تفصيل وتنفيذ أرقى وحدات خشب الملامين للفلل والشقق والديوانيات في الكويت. خزائن ملابس بلت إن (Walk-in Closets)، مطابخ حديثة، تجاليد شاشات تلفزيون، ومكاتب بتشطيب فائق النعومة ومقاوم للخدش والحرارة.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة ورفع المقاسات</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة أعمال الخشب المنفذة</a>
    </div>
  </div>
</section>

<section class="container" style="margin-bottom: 3.5rem;">
  <div style="background: var(--bg-card); border: 1px solid var(--border-gold); border-radius: var(--radius-xl); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; gap: 0; box-shadow: var(--shadow-card);">
    <div style="position: relative; min-height: 380px;">
      <img src="<?= SITE_URL ?>/assets/css/p (20).jpeg" alt="تفصيل رفوف ووحدة تلفزيون ملامين من أعمالنا" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="padding: 2.5rem; display: flex; flex-direction: column; justify-content: center;">
      <span class="pill-badge" style="width: fit-content;">تفصيل وتنفيذ بالورشة المركزية</span>
      <h3 style="font-size: 1.6rem; color: #fff; margin-bottom: 1rem;">رفوف ديكورية ووحدة شاشة بملامين الجوز الفاخر</h3>
      <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem;">
        تنفيذ هندسي رفيع يجمع بين الرفوف المنحنية المعلقة، أدراج هيدروليك بنظام Soft Close، وتجاليد جدارية بأبعاد دقيقة تناسب مقاس الشاشة والأجهزة الذكية.
      </p>
      <a href="<?= e($WA_BASE) ?>?text=<?= urlencode('مرحباً، أرغب في تفصيل وحدة خشب ملامين للشاشة') ?>" target="_blank" class="btn btn-gold" style="width: fit-content;">استفسر عن تكلفة هذا الموديل</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">مميزات خشب الملامين لدينا</h2>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">🛡️</div><div class="feature-box-content"><h4>مقاومة عالية للخدش والاحتكاك</h4><p>طبقة ملامين قاسية تتحمل الاستخدام اليومي الشاق دون أن تتأثر.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">💧</div><div class="feature-box-content"><h4>قلب خشب مقاوم للرطوبة Green Core</h4><p>خشب معالج خصيصاً للمطابخ ومناخ الكويت الحار والرطب.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🎨</div><div class="feature-box-content"><h4>عشرات النقشات الخشبية والرخامية</h4><p>نقشات بلوط، جوز، سنديان، رمادي اسمنتي، وأبيض رخامي غير لامع.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">⚙️</div><div class="feature-box-content"><h4>إكسسوارات بلوم ألمانية وهيدروليك</h4><p>مفصلات وسكك إيطالية وألمانية تغلق بنعومة تامة وبكفالة طويلة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">📐</div><div class="feature-box-content"><h4>تفصيل دقيق بالمليمتر بالليزر</h4><p>قص ولصق حواف شريط القشاط بماكينات CNC أوتوماتيكية متطورة.</p></div></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تفصيل خزائن أو مكتبة ملامين مخصصة لمساحتك؟</h3>
    <p>فريق النجارة والتفصيل في خدمتك بجميع مناطق الكويت لرفع القياسات وتقديم مخطط 3D قبل التنفيذ.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل الآن: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>