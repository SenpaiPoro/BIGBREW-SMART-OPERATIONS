<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reports · BigBrew Smart Operations</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Icon sprite (used with <svg class="i"><use href="#i-name"/></svg>) -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <symbol id="i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></symbol>
    <symbol id="i-plus-circle" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></symbol>
    <symbol id="i-list" viewBox="0 0 24 24"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></symbol>
    <symbol id="i-box" viewBox="0 0 24 24"><path d="M21 8l-9-5-9 5v8l9 5 9-5z"/><path d="M3.3 7.5L12 12l8.7-4.5M12 22V12"/></symbol>
    <symbol id="i-book" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 016.5 17H20V3H6.5A2.5 2.5 0 004 5.5z"/><path d="M4 19.5A2.5 2.5 0 006.5 22H20v-5"/></symbol>
    <symbol id="i-cart" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></symbol>
    <symbol id="i-inbox" viewBox="0 0 24 24"><path d="M22 12h-6l-2 3h-4l-2-3H2"/><path d="M5.5 5.1L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.5-6.9A2 2 0 0016.8 4H7.2a2 2 0 00-1.7 1.1z"/></symbol>
    <symbol id="i-chart" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 15l4-4 3 3 5-6"/></symbol>
    <symbol id="i-file" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/></symbol>
    <symbol id="i-menu" viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></symbol>
    <symbol id="i-download" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></symbol>
    <symbol id="i-chevron" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></symbol>
  </defs>
</svg>

<div class="app-shell">

  <!-- ===================== SIDEBAR ===================== -->
  <div class="nav-overlay" id="nav-overlay" hidden></div>
  <aside class="sidebar" id="sidebar">
    <div class="brand">
      <span class="brand-mark"><svg class="i" width="19" height="19"><use href="#i-box"/></svg></span>
      <div>
        <strong>BigBrew<span class="brand-dot">.</span></strong>
        <small>SMART OPERATIONS</small>
      </div>
      <button class="icon-btn" id="menu-close" type="button" aria-label="Close menu"><svg class="i" width="18" height="18"><use href="#i-x"/></svg></button>
    </div>

    <div class="branch-label"><span class="branch-dot"></span> BRANCH <svg class="i" width="13" height="13"><use href="#i-chevron"/></svg></div>
    <div class="branch-name">Putatan, Muntinlupa</div>

    <nav>
      <div class="nav-group">
        <div class="nav-label">OPERATIONS</div>
        <a class="nav-link" href="dashboard.php"><span><svg class="i" width="16" height="16"><use href="#i-grid"/></svg></span><span>Dashboard</span></a>
        <a class="nav-link" href="new-sale.php"><span><svg class="i" width="16" height="16"><use href="#i-plus-circle"/></svg></span><span>New Sale</span></a>
        <a class="nav-link" href="order-queue.php"><span><svg class="i" width="16" height="16"><use href="#i-list"/></svg></span><span>Order Queue</span></a>
      </div>

      <div class="nav-group">
        <div class="nav-label">INVENTORY</div>
        <a class="nav-link" href="inventory.html#inventory"><span><svg class="i" width="16" height="16"><use href="#i-box"/></svg></span><span>Inventory</span></a>
        <a class="nav-link" href="inventory.html#ingredients"><span><svg class="i" width="16" height="16"><use href="#i-list"/></svg></span><span>Ingredients</span></a>
        <a class="nav-link" href="inventory.html#recipes"><span><svg class="i" width="16" height="16"><use href="#i-book"/></svg></span><span>Recipes</span></a>
        <a class="nav-link" href="inventory.html#purchasing"><span><svg class="i" width="16" height="16"><use href="#i-cart"/></svg></span><span>Purchasing</span></a>
        <a class="nav-link" href="inventory.html#receiving"><span><svg class="i" width="16" height="16"><use href="#i-inbox"/></svg></span><span>Receiving</span></a>
        <a class="nav-link" href="inventory.html#analytics"><span><svg class="i" width="16" height="16"><use href="#i-chart"/></svg></span><span>Ingredient Analytics</span></a>
      </div>

      <div class="nav-group">
        <div class="nav-label">INSIGHTS</div>
        <a class="nav-link active" href="reports.html"><span><svg class="i" width="16" height="16"><use href="#i-file"/></svg></span><span>Reports</span><span class="active-pip"></span></a>
      </div>
    </nav>

    <div class="sidebar-bottom">
      <a class="profile" href="logout.php" title="Sign out">
        <span class="avatar"><!-- initials -->AB</span>
        <span class="profile-text"><strong><!-- full name -->Full Name</strong><small><!-- role -->Owner</small></span>
      </a>
    </div>
  </aside>

  <!-- ===================== WORKSPACE ===================== -->
  <div class="workspace">
    <header class="topbar">
      <div class="top-left">
        <button class="icon-btn" id="menu-btn" type="button" aria-label="Open menu"><svg class="i" width="19" height="19"><use href="#i-menu"/></svg></button>
        <strong>BigBrew</strong>
        <span class="breadcrumb">/ Reports</span>
      </div>
      <div class="top-right">
        <span class="top-date"><!-- today's date -->Sep 29, 2026</span>
        <span class="top-divider"></span>
        <span class="connection"><svg class="i" width="10" height="10"><circle cx="12" cy="12" r="8" fill="currentColor"/></svg> ONLINE</span>
        <span class="avatar small"><!-- initials -->AB</span>
      </div>
    </header>

    <main class="main-content">

      <div class="page-intro">
        <div>
          <span class="eyebrow blue">ANALYTICS &amp; EXPORTS</span>
          <h1>Reports</h1>
          <p>Preview any report, then export it as a CSV file.</p>
        </div>
      </div>

      <!-- ===== Filters ===== -->
      <div class="panel report-filters">
        <label class="field"><span>From</span><input type="date" id="date-from"></label>
        <label class="field"><span>To</span><input type="date" id="date-to"></label>
        <button class="btn primary" type="button" id="apply-filters">Apply filters</button>
      </div>

      <!-- ===== Report cards =====
           data-columns = the column headers of the report (pipe-separated).
           Point each Export link at your PHP export script. -->
      <div class="reports-grid" id="reports-grid">

        <div class="panel report-card selected" data-report="Sales Report" data-columns="Order|Date|Customer|Source|Total|Payment">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-file"/></svg></span>
          <strong>Sales Report</strong>
          <small>Every paid order with customer, source, total and payment method.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=sales"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Product Sales Report" data-columns="Order|Date|Product|Category|Size|Quantity|Line total">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-file"/></svg></span>
          <strong>Product Sales Report</strong>
          <small>Line-by-line product sales with size, quantity and line total.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=product-sales"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Category Sales Report" data-columns="Category|Quantity|Revenue">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-chart"/></svg></span>
          <strong>Category Sales Report</strong>
          <small>Quantity sold and revenue grouped by product category.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=category-sales"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Inventory Report" data-columns="ID|Ingredient|Category|Subcategory|Stock|Usable stock|Unit|Reorder|Safety stock|Unit cost|Average cost|Supplier|Expiration|Linked products">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-box"/></svg></span>
          <strong>Inventory Report</strong>
          <small>Current stock, usable stock, costs, suppliers and expirations.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=inventory"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Inventory Movement Report" data-columns="Date|Ingredient|Type|Change|Previous|New|Reference|User|Reason">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-list"/></svg></span>
          <strong>Inventory Movement Report</strong>
          <small>Every stock change with before and after quantities.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=inventory-movement"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Waste Report" data-columns="Date|Ingredient|Quantity wasted|Reason|Reference|User">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-x"/></svg></span>
          <strong>Waste Report</strong>
          <small>Ingredients wasted or lost, with reason and who recorded it.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=waste"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Purchasing Report" data-columns="PO ID|Date|Supplier|Ingredient|Ordered|Received|Outstanding|Unit cost|Status|Approved by">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-cart"/></svg></span>
          <strong>Purchasing Report</strong>
          <small>Purchase orders by ingredient with ordered, received and outstanding.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=purchasing"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Receiving Variance Report" data-columns="Receipt ID|Date|PO ID|Supplier|Ingredient|Ordered|Received this delivery|Cumulative received|Outstanding|Expiration">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-inbox"/></svg></span>
          <strong>Receiving Variance Report</strong>
          <small>Each delivery compared with what was ordered.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=receiving-variance"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Inventory Reconciliation Report" data-columns="Date|Ingredient|System|Physical|Variance|Status">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-book"/></svg></span>
          <strong>Inventory Reconciliation Report</strong>
          <small>System stock versus physical counts, with variances.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=inventory-reconciliation"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Payment Reconciliation Report" data-columns="Date|Payment method|Actual|Status">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-file"/></svg></span>
          <strong>Payment Reconciliation Report</strong>
          <small>Actual payment totals per method and their review status.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=payment-reconciliation"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Expense Report" data-columns="Date|Category|Description|Amount|Method|User">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-chart"/></svg></span>
          <strong>Expense Report</strong>
          <small>Recorded expenses by category, method and user.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=expense"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

        <div class="panel report-card" data-report="Audit Trail Report" data-columns="Date|Action|Module|User|Reference|Details">
          <span class="report-icon"><svg class="i" width="18" height="18"><use href="#i-list"/></svg></span>
          <strong>Audit Trail Report</strong>
          <small>Who did what, in which module, and when.</small>
          <div class="report-actions">
            <button class="btn secondary" type="button" data-preview>Preview</button>
            <a class="btn primary" href="export.php?type=audit-trail"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
          </div>
        </div>

      </div>

      <!-- ===== Preview ===== -->
      <div class="panel table-panel" id="preview">
        <div class="table-toolbar">
          <div>
            <span class="eyebrow blue" style="margin-bottom:6px">PREVIEW</span>
            <h2 id="preview-title">Sales Report</h2>
          </div>
          <a class="btn primary" id="preview-export" href="export.php?type=sales"><svg class="i" width="13" height="13"><use href="#i-download"/></svg> Export CSV</a>
        </div>
        <div class="table-scroll">
          <table>
            <thead><tr id="preview-head"></tr></thead>
            <tbody id="preview-body">
              <!-- Replace with your rows from PHP. The column headers above change per report;
                   in production, render the matching headers server-side instead. -->
            </tbody>
          </table>
        </div>
        <div class="empty" id="preview-empty">
          <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-file"/></svg></span>
          <strong>No records to preview</strong>
          <span>Records for the selected report and date range will appear here.</span>
        </div>
      </div>

    </main>
  </div>
</div>

<script>
(function () {
  /* ---------- report preview (UI only: swaps the table headers) ---------- */
  var cards = document.querySelectorAll('.report-card');
  var head = document.getElementById('preview-head');
  var title = document.getElementById('preview-title');
  var exportBtn = document.getElementById('preview-export');

  function select(card) {
    cards.forEach(function (c) { c.classList.toggle('selected', c === card); });
    title.textContent = card.getAttribute('data-report');
    exportBtn.href = card.querySelector('a.btn.primary').getAttribute('href');
    head.innerHTML = '';
    card.getAttribute('data-columns').split('|').forEach(function (col) {
      var th = document.createElement('th');
      th.textContent = col.toUpperCase();
      head.appendChild(th);
    });
  }
  cards.forEach(function (card) {
    card.querySelector('[data-preview]').addEventListener('click', function () {
      select(card);
      document.getElementById('preview').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
  select(document.querySelector('.report-card.selected'));

  /* ---------- mobile sidebar ---------- */
  var sidebar = document.getElementById('sidebar'), overlay = document.getElementById('nav-overlay');
  function openMenu() { sidebar.classList.add('open'); overlay.hidden = false; }
  function closeMenu() { sidebar.classList.remove('open'); overlay.hidden = true; }
  document.getElementById('menu-btn').addEventListener('click', openMenu);
  document.getElementById('menu-close').addEventListener('click', closeMenu);
  overlay.addEventListener('click', closeMenu);
})();
</script>
</body>
</html>
