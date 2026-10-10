<?php
// services/marble.php
require_once __DIR__ . '/../config.php';

$pageTitle       = 'الرخام الإيطالي وأعمال الجلي والتلميع الكويت | الشركة العربية للمنازل';
$pageDescription = 'توريد وتركيب الرخام الإيطالي الفاخر في الكويت - كلكتا، ستاتوارو، إمبرادور، درج رخام، مغاسل، جلي وتلميع بالكريستال. اتصل: ' . $SITE_PHONE;
$activeMenu      = 'services';

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>نخب أول من أشهر المحاجر الإيطالية واليونانية</span></div>
    <h1 class="hero-title"><span class="gold-text">الرخام الإيطالي في الكويت</span></h1>
    <p class="hero-description">
      توريد وتركيب أفخم أنواع الرخام الطبيعي للأرضيات والمداخل والمغاسل والسلالم (درج الفلل). تركيب بالطريقة الميكانيكية بالمسامير أو بالخلطة الأسمنتية مع جلي وتلميع بالكريستال الإيطالي يمنحك بريق المرآة.
    </p>
    <div class="hero-actions">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">طلب معاينة وأسعار الرخام</a>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-outline">مشاهدة صور الرخام المنفذ</a>
    </div>
  </div>
</section>

<section class="methodology-section">
  <div class="container">
    <h2 class="section-title">لماذا تختارنا في توريد وتركيب الرخام؟</h2>
    <div class="features-grid">
      <div class="feature-box"><div class="feature-box-icon">💎</div><div class="feature-box-content"><h4>رخام نخب أول خالٍ من العيوب</h4><p>ألواح وسلابات متجانسة العروق خالية من الشروخ أو الترقيع.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">📐</div><div class="feature-box-content"><h4>قص ليزر وحساب Bookmatch</h4><p>تطابق عروق الرخام كصفحات الكتاب المفتوح لتعطي لوحة فنية جدارية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">✨</div><div class="feature-box-content"><h4>أحدث ماكينات الجلي بالماس</h4><p>تسوية الفواصل وجلي بـ 7 مراحل وتلميع بمادة الكريستال الإيطالية.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🛡️</div><div class="feature-box-content"><h4>معالجة العزل النانوي (Nano Sealer)</h4><p>حماية السطح من امتصاص القهوة والشاي والزيوت والسوائل الملونة.</p></div></div>
      <div class="feature-box"><div class="feature-box-icon">🏛️</div><div class="feature-box-content"><h4>تنفيذ الدرج والمغاسل المودرن</h4><p>شطف زوايا 45 درجة وتركيب مغاسل طائرة بتصاميم فندقية راقية.</p></div></div>
    </div>
  </div>
</section>

<section class="container" style="padding: 2rem 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في تركيب رخام إيطالي لقسيمتك أو فيلتك؟</h3>
    <p>فريقنا المختص مستعد لمرافقتك واختيار أجود السلابات وتقديم عروض أسعار تنافسية بالكويت.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بالمهندس: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>