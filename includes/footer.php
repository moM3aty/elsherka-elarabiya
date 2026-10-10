<?php
// includes/footer.php
$waContact = $WA_BASE . '?text=' . urlencode('مرحباً، أرغب في الاستفسار عن خدماتكم');
?>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-col">
        <div class="logo-brand" style="margin-bottom: 1rem;">
          <div class="logo-badge">ع</div>
          <div class="logo-text">
            <span class="logo-title" style="font-size: 1.1rem;">الشركة العربية للمنازل</span>
            <span class="logo-subtitle">للتجارة العامة والمقاولات ذ.م.م</span>
          </div>
        </div>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.8; margin-bottom: 1.2rem;">
          تأسست في عام 2004، مصنفة بالفئة الثالثة للأعمال المدنية والإنشاءات (لجنة المناقصات المركزية) والفئة (ج)
          ببلدية الكويت. رائدة في تنفيذ أعمال القسائم الخاصة والرعاية السكنية والتشطيب الفاخر.
        </p>
        <div style="color: var(--gold-light); font-weight: 700; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
          <span>📞</span>
          <a href="tel:<?= e($SITE_PHONE) ?>" style="color: inherit;"><?= e($SITE_PHONE) ?></a>
        </div>
      </div>

      <div class="footer-col">
        <h4>روابط سريعة</h4>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/index.php">الرئيسية</a></li>
          <li><a href="<?= SITE_URL ?>/about.php">من نحن والتصنيفات</a></li>
          <li><a href="<?= SITE_URL ?>/projects.php">معرض المشاريع والفيديوهات</a></li>
          <li><a href="<?= SITE_URL ?>/prices.php">الأسعار والباقات</a></li>
          <li><a href="<?= SITE_URL ?>/blog.php">مدونة الشركة</a></li>
          <li><a href="<?= SITE_URL ?>/contact.php">اتصل بنا</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>خدماتنا المتكاملة</h4>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/services/interior-design.php">التصميم الداخلي</a></li>
          <li><a href="<?= SITE_URL ?>/services/finishing.php">تشطيب داخلي الكويت</a></li>
          <li><a href="<?= SITE_URL ?>/services/painting.php">صباغ الكويت</a></li>
          <li><a href="<?= SITE_URL ?>/services/gypsum-board.php">جبس بورد وأسقف معلقة</a></li>
          <li><a href="<?= SITE_URL ?>/services/ceramics-parquet.php">سيراميك وباركيه</a></li>
          <li><a href="<?= SITE_URL ?>/services/dewaniya.php">تصميم وتنفيذ ديوانية</a></li>
          <li><a href="<?= SITE_URL ?>/services/reception-halls.php">صالات استقبال خارجية</a></li>
          <li><a href="<?= SITE_URL ?>/services/roof-insulation.php">عزل أسطح الكويت</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>مناطق الخدمة بالكويت</h4>
        <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.7; margin-bottom: 0.8rem;">
          نغطي جميع محافظات الكويت: الفروانية، حولي، الأحمدي، الجهراء، مبارك الكبير، والعاصمة بأطقم فنية مجهزة.
        </p>
        <div class="coverage-pill-row">
          <span class="coverage-pill">الفروانية</span>
          <span class="coverage-pill">حولي</span>
          <span class="coverage-pill">الأحمدي</span>
          <span class="coverage-pill">الجهراء</span>
          <span class="coverage-pill">العاصمة</span>
          <span class="coverage-pill">مبارك الكبير</span>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>جميع الحقوق محفوظة © 2004 - <?= date('Y') ?> الشركة العربية للتصميم الداخلي والديكور والمقاولات</p>
      <p class="designer-credit">تم التصميم بواسطة <a href="https://www.facebook.com/profile.php?id=100090592885243" target="_blank" rel="noopener noreferrer">GMTWEB</a></p>
    </div>
  </div>
</footer>

<!-- Lightbox Modal -->
<div class="modal-overlay" id="mediaModal">
  <div class="modal-content-box">
    <button class="modal-close-btn" id="modalClose" aria-label="إغلاق">✕</button>
    <div class="modal-media-holder" id="modalMediaHolder"></div>
    <div class="modal-caption-bar">
      <div>
        <h4 id="modalTitle" style="color:#fff; font-size:1.05rem;">تفاصيل المشروع</h4>
        <span style="color:var(--gold-light); font-size:0.85rem;">الشركة العربية للمنازل - الكويت</span>
      </div>
      <a href="#" id="modalWhatsapp" target="_blank" class="btn btn-gold" style="padding:0.5rem 1.2rem; font-size:0.88rem;">
        <span>استفسر عبر واتساب</span>
      </a>
    </div>
  </div>
</div>

<script src="<?= SITE_URL ?>/assets/js/main.js"></script>
</body>
</html>