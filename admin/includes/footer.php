  </main>
</div>
<script>
// Mobile menu
document.addEventListener('DOMContentLoaded', function () {
  var btn = document.getElementById('mobileMenuBtn');
  var sidebar = document.querySelector('.sidebar');
  var overlay = document.getElementById('overlay');
  if (btn && sidebar && overlay) {
    btn.addEventListener('click', function () {
      sidebar.classList.toggle('open');
      overlay.classList.toggle('active');
    });
    overlay.addEventListener('click', function () {
      sidebar.classList.remove('open');
      overlay.classList.remove('active');
    });
  }
});
</script>
<script src="<?= ADMIN_URL ?>/assets/js/admin.js?v=<?= @filemtime(__DIR__ . '/../assets/js/admin.js') ?: time() ?>"></script>
</body>
</html>