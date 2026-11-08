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


document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("logoutModal");
    const openButton = document.getElementById("openLogoutModal");
    const cancelButton = document.getElementById("cancelLogout");

    if (!modal || !openButton || !cancelButton) return;

    openButton.addEventListener("click", function () {
        modal.classList.add("show");
    });

    cancelButton.addEventListener("click", function () {
        modal.classList.remove("show");
    });

    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.remove("show");
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            modal.classList.remove("show");
        }
    });
});

</script>
</body>
</html>
