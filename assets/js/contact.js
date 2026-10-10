// assets/js/contact.js
// يعترض إرسال نموذج الاتصال ويرسله عبر AJAX بدون تغيير HTML
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.inquiry-form');
  if (!form) return;

  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    const btn = form.querySelector('button[type=submit]');
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '... جارٍ الإرسال';

    const fd = new FormData(form);
    try {
      const res = await fetch('contact-submit.php', {
        method: 'POST',
        body: fd,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      const data = await res.json();

      let msgBox = form.querySelector('.form-msg');
      if (!msgBox) {
        msgBox = document.createElement('div');
        msgBox.className = 'form-msg';
        form.appendChild(msgBox);
      }
      msgBox.style.cssText = 'padding:1rem;border-radius:10px;margin-top:1rem;font-weight:600;text-align:center';
      if (data.ok) {
        msgBox.style.background = 'rgba(62,207,142,.15)';
        msgBox.style.color = '#66e3b0';
        msgBox.style.border = '1px solid rgba(62,207,142,.35)';
        msgBox.textContent = '✅ ' + data.message;
        form.reset();
      } else {
        msgBox.style.background = 'rgba(224,85,85,.15)';
        msgBox.style.color = '#ff9494';
        msgBox.style.border = '1px solid rgba(224,85,85,.35)';
        msgBox.textContent = '⚠️ ' + data.message;
      }
    } catch (err) {
      alert('حدث خطأ في الاتصال بالخادم. حاول مجدداً.');
    } finally {
      btn.disabled = false;
      btn.innerHTML = originalText;
    }
  });
});