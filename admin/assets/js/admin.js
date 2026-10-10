/* ============================================================
   Admin Panel — Quill Editor + Utilities
   ============================================================ */

/* ============ Quill Editor Initialization ============ */
function initEditor(selector = '.rich-editor') {
  if (typeof Quill === 'undefined') {
    console.warn('Quill not loaded');
    return;
  }

  document.querySelectorAll(selector).forEach(function (textarea) {
    // غلّف الـ textarea بحاوية
    var wrap = document.createElement('div');
    wrap.className = 'rich-editor-wrap';
    textarea.parentNode.insertBefore(wrap, textarea);
    wrap.appendChild(textarea);
    textarea.style.display = 'none';

    // أنشئ حاوية Quill
    var editorDiv = document.createElement('div');
    editorDiv.innerHTML = textarea.value || '';
    wrap.appendChild(editorDiv);

    var quill = new Quill(editorDiv, {
      theme: 'snow',
      placeholder: textarea.placeholder || 'اكتب المحتوى هنا...',
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, 4, false] }],
          [{ font: [] }],
          [{ size: ['small', false, 'large', 'huge'] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ color: [] }, { background: [] }],
          [{ list: 'ordered' }, { list: 'bullet' }],
          [{ indent: '-1' }, { indent: '+1' }],
          [{ align: [] }],
          [{ direction: 'rtl' }],
          ['blockquote', 'code-block'],
          ['link', 'image', 'video'],
          ['clean']
        ]
      }
    });

    // تحديث الـ textarea عند كل تغيير
    quill.on('text-change', function () {
      var html = quill.root.innerHTML;
      textarea.value = (html === '<p><br></p>') ? '' : html;
    });

    // تأكد من تحديث القيمة الأولية
    quill.on('text-change', function () {}, 'silent');
    textarea.value = (quill.root.innerHTML === '<p><br></p>') ? '' : quill.root.innerHTML;
  });
}

/* ============ Confirm Delete ============ */
document.addEventListener('click', function (e) {
  var el = e.target.closest('[data-confirm]');
  if (el && !confirm(el.dataset.confirm || 'هل أنت متأكد؟')) {
    e.preventDefault();
  }
});

/* ============ Slug Auto-Generate ============ */
document.addEventListener('input', function (e) {
  var t = e.target;
  if (t.matches('[data-slug-source]')) {
    var target = document.querySelector(t.dataset.slugSource);
    if (target && !target.dataset.touched) {
      target.value = t.value.trim()
        .replace(/\s+/g, '-')
        .replace(/[^\p{L}\p{N}\-]/gu, '')
        .toLowerCase();
    }
  }
  if (t.matches('[data-slug-target]')) t.dataset.touched = '1';
});

/* ============ Image Preview ============ */
document.querySelectorAll('input[type=file][data-preview]').forEach(function (inp) {
  inp.addEventListener('change', function () {
    var prev = document.querySelector(inp.dataset.preview);
    if (prev && inp.files[0]) {
      prev.src = URL.createObjectURL(inp.files[0]);
      prev.style.display = 'block';
    }
  });
});

/* ============ Mobile Menu + Auto-hide Alerts ============ */
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.getElementById('mobileMenuBtn');
  var sidebar = document.querySelector('.sidebar');
  var overlay = document.getElementById('overlay');

  if (toggle && sidebar && overlay) {
    toggle.addEventListener('click', function () {
      sidebar.classList.toggle('open');
      overlay.classList.toggle('active');
    });
    overlay.addEventListener('click', function () {
      sidebar.classList.remove('open');
      overlay.classList.remove('active');
    });
  }

  // Auto-hide alerts
  document.querySelectorAll('.alert').forEach(function (alert) {
    setTimeout(function () {
      alert.style.transition = 'opacity 0.5s, transform 0.5s';
      alert.style.opacity = '0';
      alert.style.transform = 'translateY(-10px)';
      setTimeout(function () { alert.remove(); }, 500);
    }, 5000);
  });
});