<!-- ===================== S  IDEBAR ===================== -->
<aside class="sidebar" id="sidebar">
  <div class="sb-head">
    <div class="sb-brand">
      <strong>BIGBREW</strong>
      <span>Smart Operations</span>
    </div>
    <button class="sb-collapse" id="sb-collapse" aria-label="Collapse sidebar">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M15 18l-6-6 6-6" />
      </svg>
    </button>
  </div>

  <nav class="nav">
    <!-- Add class "  active" to the link of the current page -->
    <a href="dashboard.php" class="nav-item active" title="Dashboard">
      <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2">
          <rect x="3" y="3" width="18" height="18" rx="1" />
          <path d="M3 12h18M12 3v18" />
        </svg></span>
      <span class="label">Dashboard</span>
    </a>
    <a href="new-sale.php" class="nav-item" title="New Sale">
      <span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round">
          <path d="M12 5v14M5 12h14" />
        </svg></span>
      <span class="label">New Sale</span>
    </a>
    <a href="order-queue.php" class="nav-item" title="Order Queue">
      <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round">
          <path d="M4 6h16M4 12h16M4 18h16" />
        </svg></span>
      <span class="label">Order Queue</span>
      <span class="nav-badge"><!-- pending orders count -->0</span>
    </a>
    <a href="sales.php" class="nav-item" title="Sales">
      <span class="ic" style="font-size:16px;font-weight:500">₱</span>
      <span class="label">Sales</span>
    </a>
    <a href="stock-alerts.php" class="nav-item" title="Stock Alerts">
      <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M10.3 3.9L1.8 18a2 2 0 001.7 3h17a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z" />
          <path d="M12 9v4M12 17h.01" />
        </svg></span>
      <span class="label">Stock Alerts</span>
      <span class="nav-badge"><!-- low/out-of-stock count -->0</span>
    </a>
  </nav>

  <div class="sb-user">
    <div class="who">
      <strong><!-- full name -->Full Name</strong>
      <span><!-- role -->Cashier</span>
    </div>
    <div class="sidebar-bottom">
      <div class="sidebar-bottom">
        <form action="<?= BASE_URL ?>/../logout.php" method="POST" id="logoutForm">
          <button type="button" class="logout-link" id="openLogoutModal">
            <svg class="i" width="16" height="16">
              <use href="#i-logout" />
            </svg>
            <span>Sign Out</span>
          </button>
        </form>
        <!-- Logout Confirmation Modal -->
        <div class="logout-modal-overlay" id="logoutModal">
          <div class="logout-modal-card">
            <div class="logout-modal-icon">
              <svg class="i" width="28" height="28">
                <use href="#i-logout" />
              </svg>
            </div>
            <h3>Sign Out?</h3>
            <p>Are you sure you want to sign out of your account?</p>
            <div class="logout-modal-actions">
              <button type="button" class="logout-cancel" id="cancelLogout">
                Cancel
              </button>
              <button type="submit" form="logoutForm" name="logout" value="1" class="logout-confirm">
                Yes, Sign Out
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
</aside>