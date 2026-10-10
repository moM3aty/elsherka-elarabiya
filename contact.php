<?php
// contact.php
require_once __DIR__ . '/config.php';

$pageTitle       = 'اتصل بنا | الشركة العربية للمنازل ذ.م.م';
$pageDescription = 'تواصل مع الشركة العربية للمنازل للمقاولات والتشطيبات بالكويت - هاتف: ' . $SITE_PHONE;
$activeMenu      = 'contact';

$success = isset($_GET['sent']) && $_GET['sent'] == 1;
$error   = isset($_GET['error']) && $_GET['error'] == 1;

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container hero-content">
    <div class="pill-badge"><span>خدمة فورية واستجابة على مدار الساعة</span></div>
    <h1 class="hero-title">تواصل مع <span class="gold-text">الشركة العربية للمنازل</span></h1>
    <p class="hero-description">
      يسعدنا دائماً استقبال استفساراتكم وحجز المعاينات الميدانية المجانية في أي وقت. مهندسونا وفنيونا متاحون لخدمتكم في كافة محافظات الكويت.
    </p>
  </div>
</section>

<section class="container" style="margin-bottom: 5rem;">
  <div class="contact-grid">
    <!-- Map & Info -->
    <div class="map-card-wrap">
      <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3479.686740171372!2d47.96659847552525!3d29.29152487531135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDE3JzI5LjUiTiA0N8KwNTgnMDkuMCJF!5e0!3m2!1sen!2seg!4v1791384742917!5m2!1sen!2seg" allowfullscreen loading="lazy" title="موقع الشركة في الكويت"></iframe>
      <div style="padding: 1.5rem; background: var(--bg-card); border-top: 1px solid var(--border-subtle);">
        <div style="display: flex; flex-direction: column; gap: 0.8rem;">
          <div style="display: flex; align-items: center; gap: 0.8rem;">
            <span style="font-size: 1.4rem;">📞</span>
            <div>
              <strong style="color: #fff; display: block;">رقم الهاتف والواتساب المباشر:</strong>
              <a href="tel:<?= e($SITE_PHONE) ?>" style="color: var(--gold-light); font-weight: 700; font-size: 1.15rem;"><?= e($SITE_PHONE) ?> (+965)</a>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 0.8rem;">
            <span style="font-size: 1.4rem;">📍</span>
            <div>
              <strong style="color: #fff; display: block;">تغطية الخدمة:</strong>
              <span style="color: var(--text-muted); font-size: 0.92rem;">جميع محافظات الكويت: الفروانية، حولي، الأحمدي، الجهراء، مبارك الكبير، العاصمة</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Form -->
    <div class="form-card">
      <h3 style="font-size: 1.4rem; color: #fff; margin-bottom: 0.5rem;">أرسل طلب استشارة ومقايسة</h3>
      <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 1.8rem;">سيقوم المهندس التنفيذي بالتواصل معك فوراً لتحديد موعد الزيارة.</p>

      <?php if ($success): ?>
        <div class="alert success" style="background:rgba(62,207,142,.15);color:#66e3b0;padding:1rem;border-radius:10px;margin-bottom:1.2rem;border:1px solid rgba(62,207,142,.35)">
          ✅ تم استلام طلبك بنجاح، سيتواصل معك فريقنا قريباً.
        </div>
      <?php elseif ($error): ?>
        <div class="alert error" style="background:rgba(224,85,85,.15);color:#ff9494;padding:1rem;border-radius:10px;margin-bottom:1.2rem;border:1px solid rgba(224,85,85,.35)">
          ⚠️ حدث خطأ أثناء الإرسال. حاول مجدداً.
        </div>
      <?php endif; ?>

      <form class="inquiry-form" method="post" action="<?= SITE_URL ?>/contact-submit.php">
        <div class="form-group">
          <label class="form-label">الاسم الكريم</label>
          <input type="text" name="name" class="form-control" placeholder="أدخل اسمك" required>
        </div>
        <div class="form-group">
          <label class="form-label">رقم الهاتف / الواتساب</label>
          <input type="tel" name="phone" class="form-control" placeholder="<?= e($SITE_PHONE) ?>" required>
        </div>
        <div class="form-group">
          <label class="form-label">المحافظة / المنطقة</label>
          <select name="area" class="form-control">
            <option value="محافظة الفروانية">محافظة الفروانية</option>
            <option value="محافظة حولي">محافظة حولي</option>
            <option value="محافظة الأحمدي">محافظة الأحمدي</option>
            <option value="محافظة الجهراء">محافظة الجهراء</option>
            <option value="محافظة العاصمة">محافظة العاصمة</option>
            <option value="محافظة مبارك الكبير">محافظة مبارك الكبير</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">الخدمة المطلوبة</label>
          <select name="service" class="form-control" required>
            <option value="تشطيب داخلي متكامل">تشطيب داخلي متكامل (تسليم مفتاح)</option>
            <option value="صباغ وأصباغ وديكورات">صباغ الكويت وأصباغ وديكورات</option>
            <option value="تصميم داخلي 3D">تصميم داخلي ثلاثي الأبعاد 3D</option>
            <option value="جبس بورد وأسقف معلقة">جبس بورد وأسقف معلقة</option>
            <option value="بديل الخشب والرخام">بديل الخشب والرخام</option>
            <option value="تصميم وتنفيذ ديوانية">تصميم وتنفيذ ديوانية</option>
            <option value="ورق جدران">ورق جدران كوري وأوروبي</option>
            <option value="خشب ملامين ونجارة">خشب ملامين وأعمال نجارة</option>
            <option value="سيراميك وباركيه">سيراميك وبورسلان وباركيه</option>
            <option value="رخام إيطالي وجلي">رخام إيطالي وجلي وتلميع</option>
            <option value="عزل أسطح">عزل أسطح</option>
            <option value="كشف تسربات المياه">كشف تسربات المياه</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">ملاحظات إضافية عن المشروع</label>
          <textarea name="notes" class="form-control" placeholder="المساحة، مواصفات العمل، التوقيت المفضل..."></textarea>
        </div>
        <button type="submit" class="btn btn-gold" style="width: 100%;">إرسال الطلب الآن</button>
      </form>

      <div style="margin-top: 2rem; border-top: 1px solid var(--border-subtle); padding-top: 1.5rem;">
        <span style="font-size: 0.9rem; color: var(--text-muted); display: block; margin-bottom: 0.8rem;">قنوات التواصل الاجتماعي الرسمية:</span>
        <div class="social-links">
          <?php
          $socials = [
            ['instagram', 'Instagram', '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>'],
            ['tiktok', 'TikTok', '<path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.29 0 .58.04.86.12V9.4a6.33 6.33 0 00-.86-.06A6.34 6.34 0 003.1 15.68a6.34 6.34 0 0010.82 4.48c1.69-1.68 2.63-3.95 2.63-6.33V8.65c1.47.96 3.2 1.5 5.04 1.5v-3.46z"/>'],
            ['snapchat', 'Snapchat', '<path d="M12.001 2c-4.418 0-8 3.582-8 8 0 2.287.965 4.35 2.508 5.803-.046.223-.131.67-.32 1.341-.219.782-.44 1.139-.214 1.393.205.232.748.163 1.631-.207.697-.292 1.458-.45 2.261-.45.717 0 1.394.126 2.019.358.337.126.702.195 1.077.195.421 0 .827-.086 1.199-.239.569-.234 1.199-.364 1.859-.364.792 0 1.543.156 2.23.443.882.37 1.425.439 1.63.207.227-.254.005-.611-.214-1.393-.189-.671-.274-1.118-.32-1.341 1.543-1.453 2.508-3.516 2.508-5.803 0-4.418-3.582-8-8-8z"/>'],
            ['twitter', 'X (Twitter)', '<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>'],
            ['pinterest', 'Pinterest', '<path d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"/>'],
          ];
          foreach ($socials as $s):
            $url = setting($s[0], '');
            if (!$url) continue;
          ?>
            <a href="<?= e($url) ?>" target="_blank" class="social-icon-btn" title="<?= e($s[1]) ?>">
              <svg viewBox="0 0 24 24"><?= $s[2] ?></svg>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>