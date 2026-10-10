<?php
// index.php
require_once __DIR__ . '/config.php';

/* ============ جلب السلايدر من المشاريع المميزة ============ */
$heroItems = $pdo->query("
    SELECT thumbnail, media_url, media_type, title
    FROM projects
    WHERE is_featured = 1 OR media_type = 'image'
    ORDER BY is_featured DESC, sort_order ASC, id DESC
    LIMIT 43
")->fetchAll();

/* لو لا توجد بيانات، استخدم صور احتياطية */
if (!$heroItems) {
    for ($i = 1; $i <= 43; $i++) {
        $heroItems[] = ['thumbnail' => SITE_URL . "/assets/css/p ($i).jpeg", 'media_url' => '', 'media_type' => 'image', 'title' => ''];
    }
}

/* ============ آخر مقالات المدونة ============ */
$blogPosts = $pdo->query("
    SELECT id,title,slug,excerpt,featured_image,category,published_at
    FROM blog_posts
    WHERE status='published'
    ORDER BY published_at DESC
    LIMIT 3
")->fetchAll();

/* ============ متغيرات الصفحة ============ */
$pageTitle       = 'الشركة العربية للمنازل للتجارة العامة والمقاولات ذ.م.م | تشطيب وتصميم داخلي الكويت';
$pageDescription = 'الشركة العربية للمنازل للمقاولات والتجارة العامة ذ.م.م - تأسست 2004 ومصنفة فئة ثالثة بالإنشاءات وفئة (ج) بالبلدية.';
$activeMenu      = 'home';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<!-- Hero Pure Showcase Slider -->
<section class="hero-pure-showcase" id="hero">
  <div class="hero-pure-slider">
    <?php foreach ($heroItems as $i => $h):
        $imgUrl = $h['thumbnail'] ?: $h['media_url'];
        if (!$imgUrl) continue;
    ?>
      <div class="hero-pure-slide<?= $i===0?' active':'' ?>" style="background-image: url('<?= e($imgUrl) ?>');"></div>
    <?php endforeach; ?>
  </div>

  <div class="hero-pure-vignette"></div>

  <div class="hero-pure-controls">
    <button class="hero-pure-arrow prev" aria-label="الصورة السابقة">‹</button>
    <div class="hero-pure-dots">
      <?php foreach ($heroItems as $i => $h): ?>
        <span class="hero-pure-dot<?= $i===0?' active':'' ?>" data-index="<?= $i ?>"></span>
      <?php endforeach; ?>
    </div>
    <button class="hero-pure-arrow next" aria-label="الصورة التالية">›</button>
  </div>
</section>

<!-- 2. About Section -->
<section class="about-section-luxury" id="about">
  <div class="container">
    <h2 class="section-title">نبذة عن الشركة العربية</h2>
    <p class="about-intro-text">
      منذ عام 2018، نقدم خدمات التصميم الداخلي والتشطيبات في الكويت، بخبرة تتجاوز 20 عاماً، نحول المساحات إلى تحف فنية
      تعكس شخصيتك بأسلوب إبداعي وجودة تنفيذ لا تقبل التنازل.
    </p>

    <div class="about-badges-row">
      <div class="about-badge-item"><span>🏅</span><span>تصنيف معتمد بالتشطيبات والديكور الداخلي</span></div>
      <div class="about-badge-item"><span>📐</span><span>طاقم مهندسين وفنيين تنفيذيين خبرة 20 عاماً</span></div>
      <div class="about-badge-item"><span>🏡</span><span>تنفيذ الفلل، القسائم، الشقق والمشاريع التجارية</span></div>
      <div class="about-badge-item"><span>✨</span><span>دقة في المواعيد وإتقان لا يقبل التنازل</span></div>
    </div>
  </div>
</section>

<!-- 3. Why Us -->
<section class="why-us-section" id="why-us">
  <div class="container">
    <h2 class="section-title">لماذا تختار الشركة العربية؟</h2>
    <div class="why-us-grid">
      <div class="why-us-card"><div class="why-us-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.71 8.71l-1.42-1.42a1 1 0 0 0-1.41 0L16 10.17l-1.29-1.3a1 1 0 0 0-1.42 0l-3.58 3.59-1.42-1.42a1 1 0 0 0-1.41 0L4.17 13.75a3 3 0 0 0 0 4.24l.09.09a3 3 0 0 0 4.24 0L10.5 16.08l1.41 1.42a1 1 0 0 0 1.42 0l3.58-3.59 1.29 1.3a1 1 0 0 0 1.42 0l2.09-2.1a1 1 0 0 0 0-1.42z"/></svg></div><h3 class="why-us-title">ثقة مبنية على خبرة</h3></div>
      <div class="why-us-card"><div class="why-us-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg></div><h3 class="why-us-title">تفاصيل تصنع الفرق</h3></div>
      <div class="why-us-card"><div class="why-us-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg></div><h3 class="why-us-title">فريق فني محترف</h3></div>
      <div class="why-us-card"><div class="why-us-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-1H9v1zm3-19C8.14 2 5 5.14 5 9c0 2.38 1.19 4.47 3 5.74V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2.26c1.81-1.27 3-3.36 3-5.74 0-3.86-3.14-7-7-7z"/></svg></div><h3 class="why-us-title">تصميم يعكس شخصيتك</h3></div>
      <div class="why-us-card"><div class="why-us-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z"/></svg></div><h3 class="why-us-title">تنفيذ بجودة عالية</h3></div>
      <div class="why-us-card"><div class="why-us-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2a7 7 0 0 1 14 0v2h-4v8h3c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9z"/></svg></div><h3 class="why-us-title">خدمة عملاء متميزة</h3></div>
    </div>
  </div>
</section>

<!-- 4. Featured Services (Static - same as original) -->
<section class="featured-services-section" id="services">
  <div class="container">
    <h2 class="section-title">خدماتنا المميزة</h2>
    <div class="featured-services-grid">

      <a href="<?= SITE_URL ?>/services/painting.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 4h-2V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8h2v5a1 1 0 0 1-1 1h-6v2.18a3 3 0 1 0 2 0V16h4a3 3 0 0 0 3-3V6a2 2 0 0 0-2-2z"/></svg></div>
        <h3 class="featured-service-title">دهانات داخلية وخارجية</h3>
        <p class="featured-service-desc">دهانات احترافية عالية الجودة مقاومة للعوامل الجوية.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/painting.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61L4.35 19H9v-2H6.42A7.02 7.02 0 0 1 5 12c0-3.87 3.13-7 7-7s7 3.13 7 7c0 1.13-.27 2.19-.75 3.13l1.78.9A8.96 8.96 0 0 0 21 12c0-4.97-4.03-9-9-9zm-2 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm4 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-6 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg></div>
        <h3 class="featured-service-title">دهانات ديكورية</h3>
        <p class="featured-service-desc">تشطيبات إيطالية وأصباغ مغربية غنية بالتفاصيل.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/melamine-wood.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 2H5c-1.1 0-2 .9-2 2v17c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-1.1-.9-2-2-2zm-1 18H6V4h12v16zm-3-8c-.55 0-1 .45-1 1s.45 1 1 1 1-.45 1-1-.45-1-1-1z"/></svg></div>
        <h3 class="featured-service-title">تشطيبات خشبية</h3>
        <p class="featured-service-desc">دهانات احترافية للأبواب والديكورات الخشبية.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/finishing.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M2 19.5L9.5 12l2.5 2.5L4.5 22H2v-2.5zm18.7-11.2l-3.9-3.9 1.4-1.4a1.996 1.996 0 0 1 2.83 0l1.07 1.07c.78.78.78 2.05 0 2.83l-1.4 1.4zm-5.3-2.5l3.9 3.9-7.1 7.1-3.9-3.9 7.1-7.1z"/></svg></div>
        <h3 class="featured-service-title">التشطيبات المتكاملة</h3>
        <p class="featured-service-desc">خدمة شاملة من الدهانات والجبس والكهرباء والسباكة.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/ceramics-parquet.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/></svg></div>
        <h3 class="featured-service-title">سيراميك وباركيه</h3>
        <p class="featured-service-desc">حلول أرضيات تجمع بين الجودة والجمال من السيراميك والباركيه.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/gypsum-board.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 4H5c-1.1 0-2 .9-2 2v14h18V6c0-1.1-.9-2-2-2zm-7 2h2v2h-2V6zm-4 0h2v2H8V6zm-2 4h2v2H6v-2zm4 0h2v2h-2v-2zm4 0h2v2h-2v-2zm4 0h2v2h-2v-2zm-8 4h2v2h-2v-2zm4 0h2v2h-2v-2zm4 0h2v2h-2v-2zm-8 4h2v2h-2v-2zm4 0h2v2h-2v-2zm4 0h2v2h-2v-2z"/></svg></div>
        <h3 class="featured-service-title">ديكورات الجبس</h3>
        <p class="featured-service-desc">تصاميم جبس بورد عصرية وكلاسيكية مع توزيع إضاءة دقيق.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/alternatives.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10H7v-2h10v2zm0-4H7V7h10v2zm0 8H7v-2h10v2z"/></svg></div>
        <h3 class="featured-service-title">ورق الجدران والبدائل</h3>
        <p class="featured-service-desc">أحدث تصاميم ورق الجدران وبديل الخشب والرخام.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/dewaniya.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg></div>
        <h3 class="featured-service-title">تصميم الديوانيات</h3>
        <p class="featured-service-desc">ديوانيات كويتية فاخرة مودرن وكلاسيكية بأعلى مستويات الجودة.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/reception-halls.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17h18v2H3zm0-7h18v5H3zm0-4h18v3H3z"/></svg></div>
        <h3 class="featured-service-title">صالات استقبال خارجية</h3>
        <p class="featured-service-desc">كرفانات وجلسات خارجية وديكورات فاخرة لمساحتك الخارجية.</p>
      </a>

      <a href="<?= SITE_URL ?>/services/roof-insulation.php" class="featured-service-card" style="text-decoration:none;display:block;">
        <div class="featured-service-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg></div>
        <h3 class="featured-service-title">عزل أسطح الكويت</h3>
        <p class="featured-service-desc">فوم وشينكو وعوازل حرارية ومائية تحمي سطحك وتوفر الطاقة.</p>
      </a>

    </div>
  </div>
</section>

<!-- 5. Leadership & Values -->
<section class="leadership-values-section" id="leadership">
  <div class="container">
    <div class="values-grid">
      <div class="value-card"><h3 class="value-card-title">الالتزام بالجودة</h3><p class="value-card-desc">نقدم أعلى مستويات الجودة في كل تفصيلة، من اختيار المواد حتى التسليم النهائي.</p></div>
      <div class="value-card"><h3 class="value-card-title">خبرة عريقة</h3><p class="value-card-desc">أكثر من 20 عاماً من الخبرة في مجال التشطيبات والديكورات الفاخرة.</p></div>
      <div class="value-card"><h3 class="value-card-title">تصميم فريد</h3><p class="value-card-desc">نحول مساحتك إلى تحفة فنية تعكس ذوقك وشخصيتك بأسلوب إبداعي.</p></div>
      <div class="value-card"><h3 class="value-card-title">إبداع وتجديد</h3><p class="value-card-desc">نواكب أحدث صيحات التصميم العالمية ونبتكر حلولاً فريدة تناسب تطلعاتك.</p></div>
    </div>

    <h2 class="section-title">قيادتنا الملهمة</h2>
    <div class="leadership-card">
      <div class="leadership-photo-wrap"><img src="<?= SITE_URL ?>/assets/css/p (13).jpeg" alt="أبو محمد - المدير التنفيذي"></div>
      <div class="leadership-text-content">
        <h3 class="leadership-name">أبو محمد</h3>
        <p class="leadership-bio">بخبرة تمتد لسنوات، يُحوّل أبو محمد المساحات إلى تجارب فريدة تعكس شخصية العميل بأسلوب راقٍ وجودة تنفيذ استثنائية.</p>
      </div>
    </div>
  </div>
</section>

<!-- 6. Testimonials -->
<section class="testimonials-section">
  <div class="container">
    <h2 class="section-title">نفخر بشهادة عملائنا</h2>
    <div class="testimonial-highlight-badge"><span>🎖️</span><span>ثقة حقيقية من عملاء حقيقيين</span></div>
    <p class="testimonial-desc">رأي عملائنا هو أعز جائزة نحصل عليها، اكتشف ما يقوله أصحاب المنازل والفلل والمكاتب الذين وثقوا بالشركة العربية.</p>

    <div class="testimonial-card-container">
      <div class="vertical-shorts-card open-shorts-video" data-video="<?= SITE_URL ?>/assets/css/v (4).mp4" data-title="ديكور تلفزيون مع عوازل كروزر هيد">
        <div class="shorts-header-overlay">
          <div>
            <div class="shorts-title-text">ديكور تلفزيون مع عوازل كروزر هيد</div>
            <span class="shorts-company-sub">الشركة العربية للتصميم الداخلي</span>
          </div>
        </div>
        <video preload="metadata" muted playsinline poster="<?= SITE_URL ?>/assets/css/p (14).jpeg" style="width:100%; height:100%; object-fit:cover;">
          <source src="<?= SITE_URL ?>/assets/css/v (4).mp4" type="video/mp4">
        </video>
        <div class="shorts-center-play"><svg viewBox="0 0 24 24"><polygon points="8 5 19 12 8 19 8 5"/></svg></div>
        <div class="shorts-bottom-overlay"><span>الكويت 📍</span><span><?= e($SITE_PHONE) ?> 📞</span></div>
      </div>
    </div>
  </div>
</section>

<!-- 7. Video Carousel -->
<section class="shorts-carousel-section" id="videos">
  <div class="container">
    <h2 class="section-title">أحدث أعمالنا في التصميم الداخلي</h2>
    <p class="section-subtitle">شاهد لحظات التحول الحقيقية التي صنعناها لعملائنا في الكويت.</p>

    <div class="carousel-container-outer">
      <button class="carousel-nav-btn prev-btn" aria-label="السابق">›</button>
      <div class="shorts-track-wrap">
        <div class="shorts-track">
          <?php
          $carousel = [
            ['v (7).mp4',  'p (32).jpeg', 'كوفي كورنر مع كنب وتلفزيون'],
            ['v (5).mp4',  'p (32).jpeg', 'ديكور شاشة تلفزيون خشب ملامين'],
            ['v (1).mp4',  'p (7).jpeg',  'مكتبة تلفزيون مع كرافي كروزر عازل'],
            ['v (4).mp4',  'p (14).jpeg', 'مكتبة تلفزيون مع تركي تويتر'],
            ['v (3).mp4',  'p (2).jpeg',  'تشطيب ديكور خشب ملامين'],
            ['v (2).mp4',  'p (28).jpeg', 'تجليد اعمدة زاوية 45 مع زجاج بلجيكي'],
            ['v (6).mp4',  'p (11).jpeg', 'أسقف جبس بورد وبروفايل ليد مخفي'],
          ];
          foreach ($carousel as $c): ?>
            <div class="carousel-card-item open-shorts-video"
                 data-video="<?= SITE_URL ?>/assets/css/<?= e($c[0]) ?>"
                 data-title="<?= e($c[2]) ?>">
              <div class="carousel-top-info">
                <span class="carousel-card-title"><?= e($c[2]) ?></span>
                <span class="shorts-watermark">#Shorts</span>
              </div>
              <div class="carousel-card-media">
                <video preload="metadata" muted playsinline poster="<?= SITE_URL ?>/assets/css/<?= e($c[1]) ?>">
                  <source src="<?= SITE_URL ?>/assets/css/<?= e($c[0]) ?>" type="video/mp4">
                </video>
              </div>
              <div class="carousel-play-center"><svg viewBox="0 0 24 24"><polygon points="8 5 19 12 8 19 8 5"/></svg></div>
              <div class="carousel-bottom-tag-wrap"><span class="swipe-tag-btn">اسحب للتقليب</span></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <button class="carousel-nav-btn next-btn" aria-label="التالي">‹</button>
    </div>
  </div>
</section>

<!-- 8. Projects Showcase -->
<section class="projects-showcase-section" id="projects">
  <div class="container">
    <h2 class="section-title">مشاريعنا</h2>
    <div class="projects-featured-card">
      <h3>شاهد جميع أعمالنا المميزة في معرض مشاريعنا</h3>
      <p>أكثر من 6000 مشروع تصميم داخلي وتشطيب فاخر في الكويت، من الفلل والشقق إلى المكاتب والمحلات التجارية.</p>
      <a href="<?= SITE_URL ?>/projects.php" class="btn btn-gold">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><polyline points="21 15 16 10 5 21"/></svg>
        <span>تصفح معرض مشاريعنا الكامل</span>
      </a>
    </div>
  </div>
</section>

<?php if ($blogPosts): ?>
<!-- 9. Blog Preview -->
<section class="projects-showcase-section" style="background: rgba(12,18,33,0.4);">
  <div class="container">
    <h2 class="section-title">أحدث مقالات المدونة</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:1.8rem;margin-top:2.5rem;">
      <?php foreach ($blogPosts as $p): ?>
        <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= urlencode($p['slug']) ?>"
           class="media-card" style="display:block;text-decoration:none;">
          <?php if ($p['featured_image']): ?>
            <div class="media-thumb-wrap">
              <img src="<?= e($p['featured_image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy">
            </div>
          <?php endif; ?>
          <div class="media-info">
            <span class="media-category">📁 <?= e($p['category']) ?> • <?= date('Y-m-d', strtotime($p['published_at'] ?? 'now')) ?></span>
            <h4 class="media-title" style="font-size:1.05rem;"><?= e($p['title']) ?></h4>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
    <div style="text-align:center;margin-top:2.5rem;">
      <a href="<?= SITE_URL ?>/blog.php" class="btn btn-outline">عرض جميع المقالات</a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- 10. Contact Section -->
<section class="contact-rwa-section" id="contact">
  <div class="container">
    <h2 class="section-title">تواصل معنا الآن</h2>

    <div class="contact-address-pill">
      <span>📍</span>
      <span><?= e(setting('site_address', 'الكويت خيطان دوار المخفر')) ?></span>
    </div>

    <div class="contact-direct-links">
      <a href="<?= e($WA_BASE) ?>" target="_blank" class="contact-item-link whatsapp-link" title="تواصل عبر واتساب: <?= e($SITE_PHONE) ?>">
        <span><?= e($SITE_PHONE) ?></span>
        <svg viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2zm5.83 14.28c-.24.69-1.42 1.32-1.97 1.38-.5.06-1.12.08-3.62-.95-3.08-1.28-5.07-4.41-5.23-4.62-.15-.21-1.25-1.66-1.25-3.17 0-1.51.79-2.26 1.07-2.56.28-.3.62-.37.83-.37.21 0 .41.01.59.02.19.01.44-.07.69.52.25.6.86 2.1.94 2.25.08.15.13.33.03.54-.1.21-.15.34-.3.51-.15.17-.32.39-.46.52-.15.15-.31.31-.13.62.18.31.79 1.3 1.7 2.11 1.17 1.04 2.15 1.37 2.46 1.52.31.15.49.13.67-.08.18-.21.78-.91.99-1.22.21-.31.41-.26.69-.15.28.1 1.79.84 2.1 1 .31.15.51.23.59.36.08.13.08.77-.16 1.46z"/></svg>
      </a>
    </div>

    <div class="contact-map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13915.289246187687!2d47.96659847552525!3d29.29152487531135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9b5b90f4c3a7%3A0x6b4ef8d167fbf7b0!2z2LTYsdmD2Kkg2K_ZitmD2YjYsdin2Kog2KfZhNix2YjYudipINin2YTZg9mI2YrYqtmK2Kkg2YTYp9i52YXYp9mEINmI2KrYsdmD2YrYqCDYr9mK2YPZiNix2KfYqtiMINin2YTZgdix2YjYp9mG2YrYqdiMINin2YTZg9mI2YrYqg!5e0!3m2!1sar!2skw!4v1700000000000!5m2!1sar!2skw" allowfullscreen loading="lazy" title="موقع الشركة"></iframe>
    </div>

    <div class="social-follow-row">
      <span class="social-follow-label">تابعنا</span>
      <div class="social-follow-icons">
        <a href="<?= e(setting('instagram','#')) ?>" target="_blank" class="social-circle-link" title="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
        <a href="<?= e(setting('tiktok','#')) ?>" target="_blank" class="social-circle-link" title="TikTok"><svg viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.29 0 .58.04.86.12V9.4a6.33 6.33 0 00-.86-.06A6.34 6.34 0 003.1 15.68a6.34 6.34 0 0010.82 4.48c1.69-1.68 2.63-3.95 2.63-6.33V8.65c1.47.96 3.2 1.5 5.04 1.5v-3.46z"/></svg></a>
        <a href="<?= e(setting('snapchat','#')) ?>" target="_blank" class="social-circle-link" title="Snapchat"><svg viewBox="0 0 24 24"><path d="M12.001 2c-4.418 0-8 3.582-8 8 0 2.287.965 4.35 2.508 5.803-.046.223-.131.67-.32 1.341-.219.782-.44 1.139-.214 1.393.205.232.748.163 1.631-.207.697-.292 1.458-.45 2.261-.45.717 0 1.394.126 2.019.358.337.126.702.195 1.077.195.421 0 .827-.086 1.199-.239.569-.234 1.199-.364 1.859-.364.792 0 1.543.156 2.23.443.882.37 1.425.439 1.63.207.227-.254.005-.611-.214-1.393-.189-.671-.274-1.118-.32-1.341 1.543-1.453 2.508-3.516 2.508-5.803 0-4.418-3.582-8-8-8z"/></svg></a>
        <a href="<?= e(setting('facebook','#')) ?>" target="_blank" class="social-circle-link" title="Facebook"><svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
      </div>
    </div>

    <div class="contact-blog-banner">
      <p>اطلع على أحدث أخبار الشركة العربية ونصائح التصميم عبر المدونة.</p>
      <a href="<?= SITE_URL ?>/blog.php" class="btn-blog-visit">زيارة المدونة الآن</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>