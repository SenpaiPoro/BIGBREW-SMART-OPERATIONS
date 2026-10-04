<?php
/**
 * include/footer.php
 * -----------------------------------------------------------------
 * Closes what include/header.php opened (<main>, workspace, app shell)
 * and holds the script shared by every page (mobile sidebar).
 */
?>

      <footer class="page-footer">BigBrew Smart Operations · Putatan Branch · © <?= date('Y') ?></footer>
    </main>
  </div><!-- /.workspace -->
</div><!-- /.app-shell -->

<script>
/* Mobile sidebar - shared by every page */
(function () {
  var sidebar = document.getElementById('sidebar');
  var overlay = document.getElementById('nav-overlay');
  if (!sidebar || !overlay) return;

  window.openMenu  = function () { sidebar.classList.add('open'); overlay.hidden = false; };
  window.closeMenu = function () { sidebar.classList.remove('open'); overlay.hidden = true; };

  document.getElementById('menu-btn').addEventListener('click', window.openMenu);
  document.getElementById('menu-close').addEventListener('click', window.closeMenu);
  overlay.addEventListener('click', window.closeMenu);
})();
</script>
</body>
</html>
