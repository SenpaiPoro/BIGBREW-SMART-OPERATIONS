<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard · BigBrew Smart Operations</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/CSS/style.css">  
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
