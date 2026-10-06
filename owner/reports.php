<?php
$pageTitle  = 'Reports';
$activePage = 'reports';
require_once __DIR__ . '/include/header.php';
?>
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
})();
</script>
<?php require_once __DIR__ . '/include/footer.php'; ?>
