<?php
// about.php
require_once __DIR__ . '/config.php';

$pageTitle       = 'من نحن | الشركة العربية للمنازل للتجارة العامة والمقاولات ذ.م.م';
$pageDescription = 'تاريخ الشركة العربية للمنازل منذ 2004، تصنيف بلدية الكويت فئة (ج)، ولجنة المناقصات المركزية الفئة الثالثة للأعمال المدنية والإنشاءات.';
$activeMenu      = 'about';

/* ============ جلب صور المكتب من المشاريع (إن وُجدت) ============ */
$officeImages = $pdo->query("
    SELECT thumbnail, media_url, title
    FROM projects
    WHERE media_type = 'image'
    ORDER BY id ASC
    LIMIT 2
")->fetchAll();

/* فallback إن لم توجد صور مرفوعة بعد */
if (count($officeImages) < 2) {
    $officeImages = [
        ['thumbnail' => SITE_URL . '/assets/css/p (1).jpeg',  'media_url' => '', 'title' => 'قسم الدراسات الهندسية وحصر الكميات'],
        ['thumbnail' => SITE_URL . '/assets/css/p (43).jpeg', 'media_url' => '', 'title' => 'قسم العقود والمناقصات الحكومية'],
    ];
}

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>مسيرة ريادة تمتد لأكثر من عقدين في الكويت</span></div>
    <h1 class="hero-title">نبذة عن <span class="gold-text">الشركة العربية للمنازل</span></h1>
    <p class="hero-description">
      الشركة العربية للمنازل للتجارة العامة والمقاولات ذ.م.م - صرح هندسي وإنشائي كويتي معتمد، رائد في بناء وترميم وتشطيب القسائم السكنية والتجارية والمشاريع الحكومية.
    </p>
  </div>
</section>

<section class="container" style="margin-bottom: 5rem;">
  <div class="about-card">
    <div class="about-logo-seal">
      <span class="seal-icon">🏛️</span>
      <span class="seal-text">العربية للمنازل<br>2004</span>
    </div>

    <!-- Arabic Official Bio -->
    <div class="about-text-content" style="font-size: 1.15rem; line-height: 2.2;">
      <h3 style="color: var(--gold-light); margin-bottom: 1rem; font-size: 1.4rem;">نشأة الشركة وتطورها:</h3>
      <p style="margin-bottom: 1.4rem;">
        نشأت <strong>الشركة العربية للمنازل للتجارة العامة والمقاولات ذ . م . م</strong> في عام 2004 ، وبدأت تعمل في مجال المقاولات وأعمال الترميمات والإنشاءات مع تنفيذ أعمال التشطيبات .
      </p>
      <p style="margin-bottom: 1.4rem;">
        وتم ترخيصها بتصنيف البلدية بالفئة ( ج ) في عام 2007 ، وبدأت أعمالها أعمال القسائم الخاصة مع زيادة العمالة الفنية المدربة لديها والالتزام بالعقود الإنشائية وأعمال التشطيب لعدد كبير من القسائم الداخلية وقسائم المؤسسة العامة للرعاية السكنية .
      </p>
      <p style="margin-bottom: 2rem;">
        ثم تم تصنيفها من لجنة المناقصات المركزية بالفئة الثالثة للأعمال المدنية والإنشاءات عام 2014 ، وبدأت في توسعة أعمالها وزيادة العمالة الفنية الماهرة والمدربة مع جهاز إشراف بالشركة من مهندسين ومراقبين وإحضار عمالة فنية لجميع المهن المطلوبة بالعمال .
      </p>

      <!-- English Official Bio -->
      <div style="border-top: 1px solid var(--border-gold); padding-top: 1.5rem; margin-top: 1.5rem; direction: ltr; text-align: left; color: #a2b1cc; font-size: 1rem; line-height: 1.9;">
        <h4 style="color: var(--gold-light); margin-bottom: 0.8rem; font-size: 1.2rem;">Company Profile (English):</h4>
        <p style="margin-bottom: 1rem;">
          <strong>Arabia Building Co. for General Trading and Contracting W.L.L.</strong> was established in 2004, it started working in the field of contracting works of repairs and construction works with the implementation of finishing works.
        </p>
        <p style="margin-bottom: 1rem;">
          It was licensed to classify the municipality as category (C) in 2007, and started its work with special houses constructions with the increase of its trained technical manpower and commitment to construction contracts and finishing works for a large number of internal houses and the houses of the Public Authority For Housing Welfare.
        </p>
        <p>
          Then it was classified by the Central Tenders Committee in the third category of civil works and construction in 2014 and began to expand its work and increase the skilled and trained technical manpower with the supervision of the company from engineers and observers and bring technical labor for all occupations required by the works.
        </p>
      </div>
    </div>

    <div class="about-badges-row" style="margin-top: 3rem;">
      <div class="about-badge-item" style="font-size: 1rem; padding: 0.8rem 1.6rem;">
        <span>🏅</span>
        <span>ترخيص بلدية الكويت فئة (ج) 2007</span>
      </div>
      <div class="about-badge-item" style="font-size: 1rem; padding: 0.8rem 1.6rem;">
        <span>🏢</span>
        <span>لجنة المناقصات المركزية الفئة الثالثة 2014</span>
      </div>
      <div class="about-badge-item" style="font-size: 1rem; padding: 0.8rem 1.6rem;">
        <span>🏡</span>
        <span>المؤسسة العامة للرعاية السكنية</span>
      </div>
      <div class="about-badge-item" style="font-size: 1rem; padding: 0.8rem 1.6rem;">
        <span>👷</span>
        <span>جهاز إشراف هندسي متكامل ومراقبين</span>
      </div>
    </div>
  </div>
</section>

<!-- Values & Leadership -->
<section class="leadership-values-section" style="padding-top: 0;">
  <div class="container">
    <div class="values-grid">
      <div class="value-card">
        <h3 class="value-card-title">الالتزام بالجودة</h3>
        <p class="value-card-desc">نقدم أعلى مستويات الجودة في كل تفصيلة، من اختيار المواد حتى التسليم النهائي.</p>
      </div>
      <div class="value-card">
        <h3 class="value-card-title">خبرة عريقة</h3>
        <p class="value-card-desc">أكثر من 20 عاماً من الخبرة في مجال التشطيبات والديكورات الفاخرة.</p>
      </div>
      <div class="value-card">
        <h3 class="value-card-title">تصميم فريد</h3>
        <p class="value-card-desc">نحول مساحتك إلى تحفة فنية تعكس ذوقك وشخصيتك بأسلوب إبداعي.</p>
      </div>
      <div class="value-card">
        <h3 class="value-card-title">إبداع وتجديد</h3>
        <p class="value-card-desc">نواكب أحدث صيحات التصميم العالمية ونبتكر حلولاً فريدة تناسب تطلعاتك.</p>
      </div>
    </div>
  </div>
</section>

<!-- Office Photos (Dynamic) -->
<section class="container" style="margin-bottom: 5rem;">
  <h2 class="section-title">مقر الشركة وإدارة المشاريع</h2>
  <p class="section-subtitle">صور حية من مقر الشركة وقسم الدراسات الفنية والمخططات الهندسية بدولة الكويت</p>

  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
    <?php foreach (array_slice($officeImages, 0, 2) as $idx => $img):
        $url = $img['thumbnail'] ?: $img['media_url'];
    ?>
      <div class="media-card">
        <div class="media-thumb-wrap">
          <img src="<?= e($url) ?>" alt="<?= e($img['title'] ?: 'مقر الشركة') ?>" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="media-info">
          <h4 class="media-title"><?= e($img['title'] ?: ($idx === 0 ? 'قسم الدراسات الهندسية وحصر الكميات' : 'قسم العقود والمناقصات الحكومية')) ?></h4>
          <span class="media-category">مقر الشركة - الكويت</span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- CTA -->
<section class="container" style="padding: 0 1.5rem 5rem;">
  <div class="projects-featured-card" style="margin-bottom: 0;">
    <h3>هل ترغب في التعامل مع شركة موثوقة ومعتمدة؟</h3>
    <p>نحن في خدمتك منذ عام 2004 بتصنيفات معتمدة من بلدية الكويت ولجنة المناقصات المركزية.</p>
    <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
      <a href="tel:<?= e($SITE_PHONE) ?>" class="btn btn-gold">اتصل بنا: <?= e($SITE_PHONE) ?></a>
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="btn btn-outline">تواصل عبر واتساب</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>