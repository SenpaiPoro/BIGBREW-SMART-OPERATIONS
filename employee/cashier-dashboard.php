<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
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

</div>

<?php include 'include/footer.php'; ?>