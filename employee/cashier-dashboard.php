<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard · BigBrew Smart Operations</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #f1f5f9;
    --card: #ffffff;
    --border: #e2e8f0;
    --border-input: #cbd5e1;
    --border-soft: #f1f5f9;
    --row-hover: #f8fafc;
    --text: #0f172a;.
    --text-2: #334155;
    --muted: #64748b;
    --faint: #94a3b8;
    --nav-bg: #0f172a;
    --nav-text: #cbd5e1;
    --nav-hover: #1e293b;
    --nav-line: #1e293b;
    --primary: #1a5cff;
    --link: #1d4ed8;
    --focus: #3b82f6;
    --green: #16a34a;
    --blue: #2563eb;
    --amber: #f59e0b;
    --amber-bg: #fffbeb;  --amber-border: #fde68a;  --amber-text: #92400e;
    --orange-bg: #fff7ed; --orange-border: #fed7aa; --orange-text: #9a3412;
    --red-bg: #fef2f2;    --red-border: #fecaca;    --red-text: #991b1b;
    --blue-bg: #eff6ff;   --blue-border: #bfdbfe;   --blue-text: #1d4ed8;
    --green-bg: #f0fdf4;  --green-border: #bbf7d0;  --green-text: #166534;
    --slate-bg: #f1f5f9;  --slate-text: #334155;
    --purple-bg: #faf5ff; --purple-border: #e9d5ff; --purple-text: #7e22ce;
  }

  *, *::before, *::after { box-sizing: border-box; }
  html, body { margin: 0; min-height: 100%; }
  body {
    background: var(--bg); color: var(--text);
    font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 20px;
  }
  a { color: inherit; text-decoration: none; }
  button { font: inherit; color: inherit; }
  :where(button, a):focus-visible { outline: 2px solid var(--focus); outline-offset: 2px; }

  /* ---------- layout shell ---------- */
  .app { display: flex; min-height: 100vh; }

  .sidebar {
    width: 232px; flex: none; background: var(--nav-bg); color: var(--nav-text);
    display: flex; flex-direction: column; position: sticky; top: 0; height: 100vh;
    transition: width .15s ease; z-index: 20;
  }
  .sb-head { display: flex; align-items: center; justify-content: space-between; padding: 16px 14px 14px; border-bottom: 1px solid var(--nav-line); min-height: 64px; }
  .sb-brand strong { display: block; color: #fff; font-size: 15px; letter-spacing: .02em; line-height: 18px; }
  .sb-brand span { display: block; font-size: 11px; color: var(--faint); margin-top: 2px; white-space: nowrap; }
  .sb-collapse { background: none; border: 0; color: var(--faint); cursor: pointer; padding: 4px; border-radius: 4px; display: inline-flex; }
  .sb-collapse:hover { color: #fff; background: var(--nav-hover); }
  .sb-collapse svg { transition: transform .15s ease; }

  .nav { display: flex; flex-direction: column; margin-top: 10px; flex: 1; }
  .nav-item { display: flex; align-items: center; gap: 12px; padding: 12px 14px; font-size: 13px; color: var(--nav-text); position: relative; }
  .nav-item:hover { background: var(--nav-hover); color: #fff; }
  .nav-item.active { background: var(--primary); color: #fff; font-weight: 500; }
  .nav-item .ic { width: 18px; height: 18px; flex: none; display: inline-flex; align-items: center; justify-content: center; }
  .nav-item .label { flex: 1; white-space: nowrap; }
  .nav-badge { background: var(--amber); color: #fff; border-radius: 999px; min-width: 20px; height: 20px; padding: 0 6px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; }

  .sb-user { border-top: 1px solid var(--nav-line); padding: 14px; display: flex; align-items: center; justify-content: space-between; gap: 8px; }
  .sb-user .who { min-width: 0; }
  .sb-user strong { display: block; color: #fff; font-size: 13px; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .sb-user span { font-size: 11px; color: var(--faint); }
  .sb-user a { color: var(--faint); padding: 6px; border-radius: 4px; display: inline-flex; }
  .sb-user a:hover { color: #fff; background: var(--nav-hover); }

  .sidebar.collapsed { width: 64px; }
  .sidebar.collapsed .sb-brand, .sidebar.collapsed .nav-item .label, .sidebar.collapsed .sb-user .who { display: none; }
  .sidebar.collapsed .sb-head { justify-content: center; padding-left: 0; padding-right: 0; }
  .sidebar.collapsed .sb-collapse svg { transform: rotate(180deg); }
  .sidebar.collapsed .nav-item { justify-content: center; padding-left: 0; padding-right: 0; }
  .sidebar.collapsed .nav-badge { position: absolute; top: 4px; right: 8px; min-width: 16px; height: 16px; font-size: 10px; padding: 0 4px; }
  .sidebar.collapsed .sb-user { justify-content: center; padding-left: 0; padding-right: 0; }

  .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }
  .topbar { background: var(--card); border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 12px 20px; font-size: 13px; position: sticky; top: 0; z-index: 10; }
  .topbar .left { color: var(--text-2); font-weight: 500; min-width: 0; }
  .topbar .left .loc { color: var(--muted); font-weight: 400; }
  .topbar .right { display: flex; align-items: center; gap: 14px; color: var(--muted); font-size: 12px; white-space: nowrap; }
  .alert-chip { display: inline-flex; align-items: center; gap: 4px; background: var(--amber-bg); border: 1px solid var(--amber-border); color: var(--amber-text); border-radius: 4px; padding: 4px 8px; font-size: 12px; }
  .alert-chip:hover { filter: brightness(.97); }

  .content { padding: 24px 24px 96px; }
  .page-title { margin: 0; font-size: 18px; line-height: 28px; font-weight: 600; }
  .page-sub { margin: 0 0 20px; font-size: 14px; color: var(--muted); }

  /* ---------- stat cards ---------- */
  .grid-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 20px; }
  .stat { display: block; background: var(--card); border: 1px solid var(--border); border-left-width: 4px; border-radius: 4px; box-shadow: 0 1px 2px rgba(15,23,42,.06); padding: 14px 16px; }
  a.stat:hover { box-shadow: 0 2px 6px rgba(15,23,42,.12); }
  .stat.green { border-left-color: var(--green); }
  .stat.blue  { border-left-color: var(--blue); }
  .stat.amber { border-left-color: var(--amber); }
  .stat .lbl { font-size: 12px; line-height: 16px; letter-spacing: .05em; text-transform: uppercase; color: var(--muted); font-weight: 500; }
  .stat .val { font-size: 26px; line-height: 34px; font-weight: 600; margin-top: 4px; }
  .stat .sub { font-size: 12px; color: var(--faint); margin-top: 2px; }

  /* ---------- cards ---------- */
  .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; }
  .card { background: var(--card); border: 1px solid var(--border); border-radius: 4px; box-shadow: 0 1px 2px rgba(15,23,42,.06); padding: 16px; }
  .card h3 { margin: 0 0 12px; font-size: 14px; font-weight: 600; color: var(--text-2); }
  .card-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
  .card-head h3 { margin: 0; }

  .q-status { display: flex; gap: 12px; }
  .q-box { flex: 1; border-radius: 4px; padding: 12px 8px; text-align: center; }
  .q-box .n { font-size: 24px; line-height: 32px; font-weight: 600; }
  .q-box .t { font-size: 12px; margin-top: 2px; }
  .q-box.slate { background: var(--slate-bg); color: var(--slate-text); }
  .q-box.blue  { background: var(--blue-bg);  color: var(--blue-text); }
  .q-box.amber { background: var(--amber-bg); color: var(--amber-text); }

  .btn-outline { display: block; text-align: center; margin-top: 12px; background: var(--card); border: 1px solid var(--border-input); border-radius: 4px; padding: 7px 12px; font-size: 12px; }
  .btn-outline:hover { background: var(--row-hover); }
  .btn-ghost { border-radius: 4px; padding: 4px 8px; font-size: 12px; color: var(--text-2); }
  .btn-ghost:hover { background: var(--row-hover); }

  .alerts { display: flex; flex-direction: column; gap: 8px; }
  .alert-row { display: flex; align-items: center; justify-content: space-between; border: 1px solid; border-radius: 4px; padding: 8px 12px; font-size: 12px; }
  .alert-row.amber  { background: var(--amber-bg);  border-color: var(--amber-border);  color: var(--amber-text); }
  .alert-row.orange { background: var(--orange-bg); border-color: var(--orange-border); color: var(--orange-text); }
  .alert-row.red    { background: var(--red-bg);    border-color: var(--red-border);    color: var(--red-text); }
  .alert-row:hover { filter: brightness(.96); }
  .empty { text-align: center; font-size: 12px; color: var(--faint); padding: 16px 0; }

  /* ---------- table + badges ---------- */
  .table-wrap { overflow-x: auto; }
  table { width: 100%; border-collapse: collapse; font-size: 14px; }
  th { text-align: left; font-size: 12px; font-weight: 500; color: var(--muted); padding: 8px 12px; border-bottom: 1px solid var(--border); white-space: nowrap; }
  td { padding: 8px 12px; border-bottom: 1px solid var(--border-soft); color: var(--text-2); white-space: nowrap; }
  tbody tr:last-child td { border-bottom: 0; }
  tbody tr:hover { background: var(--row-hover); }
  td.order-no { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 12px; color: var(--link); font-weight: 500; }
  td.amount { font-weight: 500; color: var(--text); }

  .badge { display: inline-block; font-size: 11px; line-height: 16px; font-weight: 500; padding: 1px 8px; border-radius: 3px; border: 1px solid transparent; letter-spacing: .02em; }
  .b-blue   { background: var(--blue-bg);   border-color: var(--blue-border);   color: var(--blue-text); }
  .b-purple { background: var(--purple-bg); border-color: var(--purple-border); color: var(--purple-text); }
  .b-amber  { background: var(--amber-bg);  border-color: var(--amber-border);  color: var(--amber-text); }
  .b-green  { background: var(--green-bg);  border-color: var(--green-border);  color: var(--green-text); }
  .b-slate  { background: var(--slate-bg);  border-color: var(--border);        color: var(--slate-text); }

  /* ---------- floating buttons ---------- */
  .fabs { position: fixed; right: 16px; bottom: 16px; display: flex; align-items: center; gap: 8px; z-index: 30; }
  .fab-qr { display: inline-flex; align-items: center; gap: 8px; background: #c2570c; color: #fff; border-radius: 999px; padding: 10px 16px; font-size: 13px; font-weight: 500; box-shadow: 0 4px 12px rgba(0,0,0,.25); }
  .fab-qr:hover { background: #a84a0a; }
  .fab-help { width: 36px; height: 36px; border-radius: 50%; border: 0; background: #1f2937; color: #fff; font-size: 16px; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,.25); }
  .fab-help:hover { background: #374151; }

  @media (max-width: 900px) {
    .grid-stats { grid-template-columns: repeat(2, 1fr); }
    .grid-2 { grid-template-columns: 1fr; }
  }
  @media (max-width: 640px) {
    .content { padding: 16px 12px 96px; }
    .topbar { padding-left: 12px; padding-right: 12px; }
    .topbar .left .loc, .topbar .right .date { display: none; }
  }
</style>
</head>
<body>
<div class="app">

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar" id="sidebar">
    <div class="sb-head">
      <div class="sb-brand">
        <strong>BIGBREW</strong>
        <span>Smart Operations</span>
      </div>
      <button class="sb-collapse" id="sb-collapse" aria-label="Collapse sidebar">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
    </div>

    <nav class="nav">
      <!-- Add class "active" to the link of the current page -->
      <a href="dashboard.php" class="nav-item active" title="Dashboard">
        <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 12h18M12 3v18"/></svg></span>
        <span class="label">Dashboard</span>
      </a>
      <a href="new-sale.php" class="nav-item" title="New Sale">
        <span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></span>
        <span class="label">New Sale</span>
      </a>
      <a href="order-queue.php" class="nav-item" title="Order Queue">
        <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg></span>
        <span class="label">Order Queue</span>
        <span class="nav-badge"><!-- pending orders count -->0</span>
      </a>
      <a href="sales.php" class="nav-item" title="Sales">
        <span class="ic" style="font-size:16px;font-weight:500">₱</span>
        <span class="label">Sales</span>
      </a>
      <a href="stock-alerts.php" class="nav-item" title="Stock Alerts">
        <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.3 3.9L1.8 18a2 2 0 001.7 3h17a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg></span>
        <span class="label">Stock Alerts</span>
        <span class="nav-badge"><!-- low/out-of-stock count -->0</span>
      </a>
    </nav>

    <div class="sb-user">
      <div class="who">
        <strong><!-- full name -->Full Name</strong>
        <span><!-- role -->Cashier</span>
      </div>
      <a href="logout.php" aria-label="Sign out" title="Sign out">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18.4 6.6a9 9 0 11-12.8 0"/><path d="M12 2v10"/></svg>
      </a>
    </div>
  </aside>

  <!-- ===================== MAIN ===================== -->
  <div class="main">

    <header class="topbar">
      <div class="left">BigBrew Smart Operations <span class="loc">&nbsp;·&nbsp; Putatan, Muntinlupa</span></div>
      <div class="right">
        <span class="date"><!-- today's date -->Sep 29, 2026</span>
        <!-- show only when low/out-of-stock count > 0 -->
        <a href="stock-alerts.php" class="alert-chip">⚠ <span><!-- count -->0</span> stock alerts</a>
      </div>
    </header>

    <main class="content">

      <h1 class="page-title">Good morning, <!-- first name -->Name</h1>
      <p class="page-sub">Here's your operational summary for today — <!-- today's date -->Sep 29, 2026</p>

      <!-- ===== Stat cards ===== -->
      <div class="grid-stats">
        <a href="sales.php" class="stat green">
          <div class="lbl">Today's Sales</div>
          <div class="val"><!-- total paid sales -->₱0</div>
          <div class="sub">Net sales</div>
        </a>
        <div class="stat blue">
          <div class="lbl">Transactions</div>
          <div class="val"><!-- paid order count -->0</div>
          <div class="sub">Today</div>
        </div>
        <a href="order-queue.php" class="stat amber">
          <div class="lbl">Pending Orders</div>
          <div class="val"><!-- NEW / PAID orders -->0</div>
          <div class="sub">New / Paid</div>
        </a>
        <a href="order-queue.php" class="stat amber">
          <div class="lbl">Ready for Pickup</div>
          <div class="val"><!-- READY orders -->0</div>
          <div class="sub">Awaiting release</div>
        </a>
      </div>

      <div class="grid-2">

        <!-- ===== Order queue status ===== -->
        <section class="card">
          <h3>Order Queue Status</h3>
          <div class="q-status">
            <div class="q-box slate"><div class="n"><!-- new/paid -->0</div><div class="t">New / Paid</div></div>
            <div class="q-box blue"><div class="n"><!-- preparing -->0</div><div class="t">Preparing</div></div>
            <div class="q-box amber"><div class="n"><!-- ready -->0</div><div class="t">Ready</div></div>
          </div>
          <a href="order-queue.php" class="btn-outline">Open Order Queue →</a>
        </section>

        <!-- ===== Inventory alerts ===== -->
        <section class="card">
          <h3>Inventory Alerts</h3>
          <div class="alerts">
            <!-- Render each row only when its count > 0 -->
            <a href="stock-alerts.php" class="alert-row amber">
              <span>⚠ <!-- count -->0 low/out-of-stock ingredients</span><span>→</span>
            </a>
            <a href="stock-alerts.php" class="alert-row orange">
              <span>🕐 <!-- count -->0 ingredients expiring soon</span><span>→</span>
            </a>
            <a href="stock-alerts.php" class="alert-row red">
              <span>✕ <!-- count -->0 expired ingredients</span><span>→</span>
            </a>
            <!-- If all counts are 0, show this instead: -->
            <!-- <p class="empty">No active stock alerts.</p> -->
          </div>
        </section>
      </div>

      <!-- ===== Recent orders ===== -->
      <section class="card">
        <div class="card-head">
          <h3>Recent Orders</h3>
          <a href="order-queue.php" class="btn-ghost">View Queue</a>
        </div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Order</th>
                <th>Customer</th>
                <th>Source</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Repeat this <tr> for each order (latest 5).
                   Source badge:  POS = b-blue,  QR Online = b-purple
                   Status badge:  PREPARING = b-blue,  READY = b-amber,
                                  COMPLETED / PAID = b-green,  NEW = b-slate -->
              <tr>
                <td class="order-no">#00000</td>
                <td>CUSTOMER</td>
                <td><span class="badge b-blue">POS</span></td>
                <td class="amount">₱0</td>
                <td><span class="badge b-blue">PREPARING</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>
  </div>

  <!-- ===================== FLOATING BUTTONS ===================== -->
  <div class="fabs">
    <a href="qr-view.php" class="fab-qr">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM20 14v3M14 20h3M20 20h1"/></svg>
      Customer QR View
    </a>
    <button class="fab-help" type="button" aria-label="Help" title="Help">?</button>
  </div>

</div>

<script>
  // Sidebar collapse toggle (only JS in this file)
  var sidebar = document.getElementById('sidebar');
  if (window.innerWidth < 760) sidebar.classList.add('collapsed');
  document.getElementById('sb-collapse').addEventListener('click', function () {
    sidebar.classList.toggle('collapsed');
  });
</script>
</body>
</html>
