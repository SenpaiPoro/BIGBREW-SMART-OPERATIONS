<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inventory · BigBrew Smart Operations</title>
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
    <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.3-4.3"/></symbol>
    <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></symbol>
    <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></symbol>
    <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></symbol>
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
        <!-- data-view switches the section below; add "active" to the current page's link -->
        <a class="nav-link active" href="#inventory" data-view="inventory"><span><svg class="i" width="16" height="16"><use href="#i-box"/></svg></span><span>Inventory</span><span class="active-pip"></span></a>
        <a class="nav-link" href="#ingredients" data-view="ingredients"><span><svg class="i" width="16" height="16"><use href="#i-list"/></svg></span><span>Ingredients</span><span class="active-pip" hidden></span></a>
        <a class="nav-link" href="#recipes" data-view="recipes"><span><svg class="i" width="16" height="16"><use href="#i-book"/></svg></span><span>Recipes</span><span class="active-pip" hidden></span></a>
        <a class="nav-link" href="#purchasing" data-view="purchasing"><span><svg class="i" width="16" height="16"><use href="#i-cart"/></svg></span><span>Purchasing</span><span class="active-pip" hidden></span></a>
        <a class="nav-link" href="#receiving" data-view="receiving"><span><svg class="i" width="16" height="16"><use href="#i-inbox"/></svg></span><span>Receiving</span><span class="active-pip" hidden></span></a>
        <a class="nav-link" href="#analytics" data-view="analytics"><span><svg class="i" width="16" height="16"><use href="#i-chart"/></svg></span><span>Ingredient Analytics</span><span class="active-pip" hidden></span></a>
      </div>

      <div class="nav-group">
        <div class="nav-label">INSIGHTS</div>
        <a class="nav-link" href="reports.html"><span><svg class="i" width="16" height="16"><use href="#i-file"/></svg></span><span>Reports</span></a>
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
        <span class="breadcrumb">/ <span id="crumb">Inventory</span></span>
      </div>
      <div class="top-right">
        <span class="top-date"><!-- today's date -->Sep 29, 2026</span>
        <span class="top-divider"></span>
        <span class="connection"><svg class="i" width="10" height="10"><circle cx="12" cy="12" r="8" fill="currentColor"/></svg> ONLINE</span>
        <span class="avatar small"><!-- initials -->AB</span>
      </div>
    </header>

    <main class="main-content">

      <!-- =====================================================
           VIEW: INVENTORY + INGREDIENTS (same layout, title changes)
           ===================================================== -->
      <section class="view active" id="view-inventory">
        <div class="page-intro">
          <div>
            <span class="eyebrow blue">STOCK CONTROL</span>
            <h1 id="inv-title">Inventory</h1>
            <p>Track every component behind the menu, from individual flavors to cups and ice.</p>
          </div>
          <!-- Owner only -->
          <button class="btn primary" type="button" data-open="modal-edit"><svg class="i" width="16" height="16"><use href="#i-plus"/></svg> Add ingredient</button>
        </div>

        <div class="metric-grid compact-metrics upgrade-metrics">
          <div class="metric-card"><span>Total ingredients</span><strong>0</strong></div>
          <div class="metric-card"><span>In stock</span><strong>0</strong></div>
          <div class="metric-card"><span>Low / out of stock</span><strong>0</strong></div>
          <div class="metric-card"><span>Expiring soon</span><strong>0</strong></div>
          <div class="metric-card"><span>Expired</span><strong>0</strong></div>
          <div class="metric-card"><span>Estimated stock value</span><strong>₱0.00</strong></div>
        </div>

        <div class="panel table-panel">
          <div class="table-toolbar upgraded-toolbar">
            <div class="tabs scroll-tabs">
              <button type="button" class="selected" data-group="inv" data-target="pane-stock">Stock levels</button>
              <button type="button" data-group="inv" data-target="pane-lots">Expiration lots</button>
              <button type="button" data-group="inv" data-target="pane-moves">Movement history</button>
            </div>
            <div class="searchbox">
              <svg class="i" width="16" height="16"><use href="#i-search"/></svg>
              <input placeholder="Search name, supplier, product, status...">
            </div>
          </div>

          <!-- ---- Tab: Stock levels ---- -->
          <div data-group="inv" id="pane-stock">
            <div class="filter-row upgrade-filters">
              <select class="filter-select">
                <option>All categories</option>
                <!-- loop: <option>Category name</option> -->
              </select>
              <select class="filter-select">
                <option>All statuses</option>
                <option>IN STOCK</option>
                <option>LOW STOCK</option>
                <option>OUT OF STOCK</option>
                <option>EXPIRING SOON</option>
                <option>EXPIRED</option>
              </select>
              <select class="filter-select">
                <option>Name</option>
                <option>Stock</option>
                <option>Reorder level</option>
                <option>Unit cost</option>
                <option>Expiration</option>
                <option>Usage</option>
                <option>Supplier</option>
              </select>
            </div>
            <div class="table-scroll">
              <table>
                <thead>
                  <tr>
                    <th>INGREDIENT / ID</th>
                    <th>CATEGORY</th>
                    <th>AVAILABLE / TOTAL</th>
                    <th>REORDER / SAFETY</th>
                    <th>UNIT COST</th>
                    <th>EXPIRATION</th>
                    <th>STATUS</th>
                    <th>LINKED PRODUCTS</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Repeat per ingredient. Clicking a row opens the detail modal.
                       Status badge: IN STOCK = positive | EXPIRED / OUT OF STOCK = negative | LOW STOCK / EXPIRING SOON = warning -->
                  <tr class="click-row" data-open="modal-detail">
                    <td><strong>Ingredient name</strong><small class="cell-note">ID · Subcategory</small></td>
                    <td>Category</td>
                    <td><strong>0 / 0 unit</strong></td>
                    <td>0 / 0 unit</td>
                    <td>₱0.00</td>
                    <td>YYYY-MM-DD</td>
                    <td><span class="badge positive">IN STOCK</span></td>
                    <td>0 products</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Show when no rows match -->
            <div class="empty" hidden>
              <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
              <strong>No matching ingredients</strong>
              <span>Try a different ingredient, product, or stock filter.</span>
            </div>
          </div>

          <!-- ---- Tab: Expiration lots ---- -->
          <div data-group="inv" id="pane-lots" hidden>
            <div class="table-scroll">
              <table>
                <thead>
                  <tr>
                    <th>INGREDIENT</th>
                    <th>QUANTITY</th>
                    <th>RECEIVED DATE</th>
                    <th>SYSTEM EXPIRATION</th>
                    <th>DAYS REMAINING</th>
                    <th>ESTIMATED VALUE</th>
                    <th>LOT STATUS</th>
                    <th>REFERENCE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ingredient name</strong></td>
                    <td>0 unit</td>
                    <td>YYYY-MM-DD</td>
                    <td>YYYY-MM-DD</td>
                    <td>0</td>
                    <td>₱0.00</td>
                    <td><span class="badge positive">IN STOCK</span></td>
                    <td>Reference</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- ---- Tab: Movement history ---- -->
          <div data-group="inv" id="pane-moves" hidden>
            <div class="table-scroll">
              <table>
                <thead>
                  <tr>
                    <th>DATE / TIME</th>
                    <th>INGREDIENT</th>
                    <th>TYPE</th>
                    <th>CHANGE</th>
                    <th>PREVIOUS</th>
                    <th>NEW</th>
                    <th>REFERENCE</th>
                    <th>USER / REASON</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Change cell: negative values use class="negative-text", positive use class="positive-text" -->
                  <tr>
                    <td>Date, time</td>
                    <td><strong>Ingredient name</strong></td>
                    <td><span class="badge">SALE USAGE</span></td>
                    <td class="negative-text">-0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>Reference</td>
                    <td>User name<small class="cell-note">Reason</small></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="empty" hidden>
              <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
              <strong>No movements yet</strong>
              <span>Sales, waste and receipts will appear here.</span>
            </div>
          </div>
        </div>

        <div class="upgrade-snapshot">
          <div class="panel">
            <div class="section-head">
              <div>
                <span class="eyebrow">STOCK SIGNALS</span>
                <h2>Ingredients to restock</h2>
              </div>
            </div>
            <!-- Repeat (max 5) -->
            <button class="upgrade-signal" type="button" data-open="modal-detail">
              <span><strong>Ingredient name</strong><small>0 unit available · reorder at 0</small></span>
              <span>0 affected</span>
            </button>
            <div class="empty" hidden>
              <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
              <strong>Stock levels healthy</strong>
              <span>No ingredients currently below reorder level.</span>
            </div>
          </div>

          <div class="panel">
            <div class="section-head">
              <div>
                <span class="eyebrow">ACTIVITY</span>
                <h2>Recent stock changes</h2>
              </div>
            </div>
            <!-- Repeat (max 5) -->
            <div class="category-row">
              <span>Ingredient name<small class="cell-note">TYPE · Date, time</small></span>
              <strong>+0</strong>
            </div>
            <div class="empty" hidden>
              <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
              <strong>No activity yet</strong>
              <span>Your first sale or receipt will appear here.</span>
            </div>
          </div>
        </div>

        <p class="helper-line">Per-receipt lots expire two calendar months after receiving.</p>
      </section>

      <!-- =====================================================
           VIEW: RECIPES
           ===================================================== -->
      <section class="view" id="view-recipes">
        <div class="page-intro">
          <div>
            <span class="eyebrow blue">PRODUCTION CONFIGURATION</span>
            <h1>Recipes</h1>
            <p>Configure product-specific ingredients and costs. Quantities are editable by Owner.</p>
          </div>
        </div>

        <div class="panel recipe-panel">
          <div class="table-toolbar recipe-overview">
            <label class="field">
              <span>Select a product</span>
              <select>
                <option>Category — Product name</option>
                <!-- loop products -->
              </select>
            </label>
            <div class="recipe-metrics">
              <div><small>REGULAR / HOT PRICE</small><strong>₱0.00</strong></div>
              <!-- show INSUFFICIENT DATA when an ingredient has no cost -->
              <div><small>EST. RECIPE COST</small><strong>₱0.00</strong></div>
              <div><small>EST. GROSS MARGIN</small><strong>₱0.00</strong></div>
            </div>
          </div>

          <div class="recipe-meta">
            <span>Recipe ID: <!-- id -->product-v1</span>
            <span>Effective: <!-- date -->YYYY-MM-DD</span>
            <button class="link-button" type="button">ACTIVE · Deactivate recipe</button>
            <!-- inactive state text: "INACTIVE · Activate recipe" -->
          </div>

          <div class="table-scroll">
            <table>
              <thead>
                <tr>
                  <th>INGREDIENT</th>
                  <th>CATEGORY</th>
                  <th>QUANTITY REQUIRED</th>
                  <th>UNIT</th>
                  <th>UNIT COST</th>
                  <th>EST. COST</th>
                  <th>NOTES</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Repeat per recipe line -->
                <tr>
                  <td><strong>Ingredient name</strong></td>
                  <td>Category</td>
                  <td><input class="table-number" type="number" min="0.01" step="0.01" value="0"></td>
                  <td>unit</td>
                  <td>₱0.00</td>
                  <td>₱0.00</td>
                  <td>Notes</td>
                  <td><button class="icon-btn" type="button" title="Remove ingredient"><svg class="i" width="15" height="15"><use href="#i-x"/></svg></button></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="recipe-add">
            <label class="field">
              <span>Ingredient</span>
              <select><option>Ingredient name</option></select>
            </label>
            <label class="field">
              <span>Quantity per drink</span>
              <input type="number" min="0.01" step="0.01" value="1">
            </label>
            <label class="field">
              <span>Notes</span>
              <input placeholder="Optional">
            </label>
            <button class="btn primary" type="button"><svg class="i" width="15" height="15"><use href="#i-plus"/></svg> Add</button>
          </div>

          <div class="recipe-packaging">
            <strong>Size-specific packaging (automatic)</strong>
            <span>Regular → Small Cups · Large → Large Cups · Hot Coffee → Hot Coffee Cups, Hot Cup Lids &amp; Cup Sleeves</span>
            <span>Selected add-ons use their own configurable ingredient quantities. They are deducted separately from the base recipe.</span>
          </div>
        </div>
      </section>

      <!-- =====================================================
           VIEW: PURCHASING
           ===================================================== -->
      <section class="view" id="view-purchasing">
        <div class="page-intro">
          <div>
            <span class="eyebrow blue">PROCUREMENT</span>
            <h1>Purchasing</h1>
            <p>Create and approve ingredient-level orders. Stock only changes when goods are actually received.</p>
          </div>
          <span class="badge"><!-- count -->0 PURCHASE ORDERS</span>
        </div>

        <div class="panel">
          <div class="tabs scroll-tabs purchase-tabs">
            <button type="button" class="selected" data-group="po" data-target="pane-po-list">Purchase orders</button>
            <button type="button" data-group="po" data-target="pane-po-create">Create purchase order</button>
            <button type="button" data-group="po" data-target="pane-po-suppliers">Suppliers</button>
          </div>

          <!-- ---- Tab: Purchase orders ---- -->
          <div data-group="po" id="pane-po-list">
            <div class="table-toolbar upgraded-toolbar">
              <div class="searchbox">
                <svg class="i" width="16" height="16"><use href="#i-search"/></svg>
                <input placeholder="Search supplier or ingredient">
              </div>
              <select class="filter-select">
                <option>All categories</option>
              </select>
            </div>
            <div class="purchase-list">
              <!-- Repeat per purchase order.
                   Status badge: PENDING APPROVAL / PARTIALLY RECEIVED = warning | APPROVED / COMPLETED = positive.
                   Show the Approve button only for PENDING APPROVAL (Owner). -->
              <div class="purchase-order">
                <div class="purchase-order-header">
                  <div>
                    <span class="eyebrow blue">PO-00001</span>
                    <h2>Supplier name</h2>
                    <small>Date, time · Requested by User · Expected YYYY-MM-DD</small>
                  </div>
                  <div>
                    <span class="badge warning">PENDING APPROVAL</span>
                    <button class="btn secondary" type="button">Approve purchase</button>
                  </div>
                </div>
                <div class="table-scroll">
                  <table>
                    <thead>
                      <tr>
                        <th>ITEM</th>
                        <th>ORDERED</th>
                        <th>RECEIVED</th>
                        <th>REMAINING</th>
                        <th>UNIT COST</th>
                        <th>LINE COST</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>Ingredient name</strong></td>
                        <td>0 unit</td>
                        <td>0</td>
                        <td>0</td>
                        <td>₱0.00</td>
                        <td>₱0.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="purchase-total">
                  <span>Order notes / Approved by User</span>
                  <strong>₱0.00</strong>
                </div>
              </div>

              <div class="empty" hidden>
                <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
                <strong>No purchase orders yet</strong>
                <span>Create a supplier and prepare an ingredient-level purchase order.</span>
              </div>
            </div>
          </div>

          <!-- ---- Tab: Create purchase order ---- -->
          <div data-group="po" id="pane-po-create" hidden>
            <div class="purchase-form">
              <div class="form-grid">
                <label class="field">
                  <span>Supplier</span>
                  <select>
                    <option value="">Select supplier</option>
                    <!-- loop active suppliers -->
                  </select>
                </label>
                <label class="field">
                  <span>Expected delivery</span>
                  <input type="date">
                </label>
              </div>
              <label class="field">
                <span>Notes</span>
                <textarea placeholder="Optional order notes"></textarea>
              </label>

              <div class="section-head">
                <div>
                  <span class="eyebrow">PURCHASE DETAILS</span>
                  <h2>Add ingredients</h2>
                </div>
              </div>

              <div class="purchase-item-entry">
                <label class="field">
                  <span>Ingredient</span>
                  <select><option>Category — Ingredient name</option></select>
                </label>
                <label class="field">
                  <span>Quantity</span>
                  <input type="number" min="0.01" step="0.01">
                </label>
                <label class="field">
                  <span>Unit cost</span>
                  <input type="number" min="0" step="0.01">
                </label>
                <button class="btn secondary" type="button" disabled><svg class="i" width="15" height="15"><use href="#i-plus"/></svg> Add item</button>
              </div>

              <div class="table-scroll">
                <table>
                  <thead>
                    <tr>
                      <th>INGREDIENT</th>
                      <th>CATEGORY</th>
                      <th>QTY</th>
                      <th>UNIT COST</th>
                      <th>LINE COST</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Repeat per added item -->
                    <tr>
                      <td><strong>Ingredient name</strong></td>
                      <td>Category</td>
                      <td>0 unit</td>
                      <td>₱0.00</td>
                      <td><strong>₱0.00</strong></td>
                      <td><button class="icon-btn" type="button"><svg class="i" width="15" height="15"><use href="#i-x"/></svg></button></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="purchase-total">
                <span>Estimated purchase total</span>
                <strong>₱0.00</strong>
                <button class="btn primary" type="button" disabled>Submit for approval <svg class="i" width="15" height="15"><use href="#i-arrow"/></svg></button>
              </div>
            </div>
          </div>

          <!-- ---- Tab: Suppliers ---- -->
          <div data-group="po" id="pane-po-suppliers" hidden>
            <div class="purchase-form">
              <div class="section-head">
                <div>
                  <span class="eyebrow">SUPPLIER MASTER</span>
                  <h2>Add supplier</h2>
                </div>
              </div>
              <div class="form-grid">
                <label class="field"><span>Supplier name</span><input></label>
                <label class="field"><span>Contact person</span><input></label>
                <label class="field"><span>Contact number</span><input></label>
                <label class="field"><span>Email</span><input type="email"></label>
                <label class="field"><span>Address</span><input></label>
                <label class="field"><span>Notes</span><input></label>
              </div>
              <button class="btn primary" type="button">Save supplier</button>

              <div class="table-scroll">
                <table>
                  <thead>
                    <tr>
                      <th>SUPPLIER</th>
                      <th>CONTACT</th>
                      <th>PHONE</th>
                      <th>EMAIL</th>
                      <th>STATUS</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Repeat per supplier. Status badge: ACTIVE = "badge positive", INACTIVE = plain "badge" -->
                    <tr>
                      <td><strong>Supplier name</strong><small class="cell-note">Address</small></td>
                      <td>Contact person</td>
                      <td>Phone</td>
                      <td>email@example.com</td>
                      <td><span class="badge positive">ACTIVE</span></td>
                      <td><button class="link-button" type="button">Deactivate</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="empty" hidden>
                <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
                <strong>No suppliers yet</strong>
                <span>Add a supplier to begin purchasing.</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- =====================================================
           VIEW: RECEIVING
           ===================================================== -->
      <section class="view" id="view-receiving">
        <div class="page-intro">
          <div>
            <span class="eyebrow blue">GOODS IN</span>
            <h1>Receiving</h1>
            <p>Receive each purchase in one or more deliveries. Only actual quantities increase stock.</p>
          </div>
          <span class="badge"><!-- count -->0 OPEN PURCHASES</span>
        </div>

        <div class="panel receive-panel">
          <div class="table-toolbar">
            <label class="field">
              <span>Select approved purchase order</span>
              <select>
                <option value="">Select purchase order</option>
                <!-- loop: <option>PO-00001 · Supplier · APPROVED</option> -->
              </select>
            </label>
            <div class="receipt-policy">
              <svg class="i" width="16" height="16"><use href="#i-clock"/></svg>
              Received date: <!-- today -->YYYY-MM-DD · Expiration: <!-- today + 2 months -->YYYY-MM-DD
            </div>
          </div>

          <div class="receive-context">
            <span>Supplier <strong>Supplier name</strong></span>
            <span>Ordered <strong>Date, time</strong></span>
            <span>Status <span class="badge positive">APPROVED</span></span>
          </div>

          <div class="table-scroll">
            <table>
              <thead>
                <tr>
                  <th>INGREDIENT</th>
                  <th>ORDERED</th>
                  <th>RECEIVED TO DATE</th>
                  <th>REMAINING</th>
                  <th>ACTUAL RECEIVED NOW</th>
                  <th>CUMULATIVE VARIANCE</th>
                </tr>
              </thead>
              <tbody>
                <!-- Repeat per item. Variance: class "negative-text" when < 0, else "positive-text" -->
                <tr>
                  <td><strong>Ingredient name</strong><small class="cell-note">Category</small></td>
                  <td>0 unit</td>
                  <td>0 unit</td>
                  <td>0 unit</td>
                  <td><input class="table-number" type="number" min="0" step="0.01" placeholder="0"></td>
                  <td class="negative-text">0 unit</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="receive-footer">
            <small>Each confirmation creates a separate receiving event, dated inventory lot, movement and audit entry.</small>
            <button class="btn primary" type="button" disabled><svg class="i" width="16" height="16"><use href="#i-check"/></svg> Confirm actual receipt</button>
          </div>

          <!-- Show instead of the above when nothing is open -->
          <div class="empty" hidden>
            <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
            <strong>No approved purchases to receive</strong>
            <span>Approve a purchase order before recording deliveries.</span>
          </div>
        </div>

        <div class="panel table-panel spaced-panel">
          <div class="table-toolbar">
            <h2>Receiving history &amp; variances</h2>
            <span class="badge"><!-- count -->0 EVENTS</span>
          </div>
          <div class="table-scroll">
            <table>
              <thead>
                <tr>
                  <th>RECEIPT / DATE</th>
                  <th>PO / SUPPLIER</th>
                  <th>INGREDIENT</th>
                  <th>ORDERED</th>
                  <th>THIS DELIVERY</th>
                  <th>VARIANCE AFTER DELIVERY</th>
                  <th>EXPIRES</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Receipt ID</strong><small class="cell-note">Date, time</small></td>
                  <td>PO ID · Supplier</td>
                  <td>Ingredient name</td>
                  <td>0</td>
                  <td><strong>+0</strong></td>
                  <td class="positive-text">0</td>
                  <td>YYYY-MM-DD</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="empty" hidden>
            <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
            <strong>No receiving events yet</strong>
            <span>Each partial delivery will be recorded separately here.</span>
          </div>
        </div>
      </section>

      <!-- =====================================================
           VIEW: INGREDIENT ANALYTICS
           ===================================================== -->
      <section class="view" id="view-analytics">
        <div class="page-intro">
          <div>
            <span class="eyebrow blue">INSIGHTS</span>
            <h1>Ingredient Analytics</h1>
            <p>See how each ingredient is used, wasted and restocked.</p>
          </div>
        </div>

        <div class="ingredient-analytics" style="margin-top:0">
          <div class="section-head">
            <div>
              <span class="eyebrow">INGREDIENT INTELLIGENCE</span>
              <h2>Usage, impact &amp; restocking</h2>
            </div>
            <a class="btn secondary" href="#purchasing" data-view="purchasing">Review in Purchasing <svg class="i" width="15" height="15"><use href="#i-arrow"/></svg></a>
          </div>

          <div class="ingredient-analytics-grid">
            <div class="inner-panel">
              <label class="field">
                <span>Select an ingredient</span>
                <select><option>Ingredient name</option></select>
              </label>
              <div class="detail-summary">
                <div><small>SALES USAGE</small><strong>0 unit</strong></div>
                <div><small>AVAILABLE</small><strong>0 unit</strong></div>
                <div><small>WASTE / LOSS</small><strong>0 unit</strong></div>
                <div><small>RECEIVING EVENTS</small><strong>0</strong></div>
              </div>
              <div class="detail-links">
                <strong>Products using <!-- ingredient -->Ingredient name</strong>
                <div>
                  <!-- Repeat -->
                  <span>Category — Product name</span>
                </div>
              </div>
              <p class="helper-line">Waste rate: 0.0% · Ingredient turnover &amp; forecast: INSUFFICIENT DATA without historical average inventory cost.</p>
            </div>

            <div class="inner-panel">
              <strong>Most used ingredients</strong>
              <!-- Repeat (top 7) -->
              <div class="category-row"><span>Ingredient name</span><strong>0 unit</strong></div>
              <div class="empty" hidden>
                <span class="empty-icon"><svg class="i" width="22" height="22"><use href="#i-box"/></svg></span>
                <strong>No sales usage yet</strong>
                <span>Complete a cash sale to see ingredient consumption rankings.</span>
              </div>

              <strong class="analytics-subtitle">Restocking recommendations</strong>
              <!-- Repeat (top 5) -->
              <div class="category-row">
                <span>Ingredient name<small class="cell-note">0 products affected</small></span>
                <strong>RESTOCK RECOMMENDED</strong>
              </div>
              <p class="helper-line" hidden>No current restock recommendations.</p>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
</div>

<!-- ===================== MODAL: INGREDIENT DETAIL ===================== -->
<div class="modal-backdrop" id="modal-detail" hidden>
  <div class="modal ingredient-modal">
    <div class="modal-top">
      <div>
        <span class="eyebrow blue">INGREDIENT MASTER</span>
        <h2>Ingredient name</h2>
      </div>
      <button class="icon-btn" type="button" data-close aria-label="Close"><svg class="i" width="18" height="18"><use href="#i-x"/></svg></button>
    </div>
    <div class="modal-body ingredient-detail">
      <div class="detail-summary">
        <div><small>INGREDIENT ID</small><strong>ID</strong></div>
        <div><small>STOCK / USABLE</small><strong>0 / 0 unit</strong></div>
        <div><small>REORDER / SAFETY</small><strong>0 / 0</strong></div>
        <div><small>STATUS</small><span class="badge positive">IN STOCK</span></div>
      </div>
      <div class="detail-summary">
        <div><small>CURRENT / LAST COST</small><strong>₱0.00 / ₱0.00</strong></div>
        <div><small>WEIGHTED AVG. COST</small><strong>₱0.00</strong></div>
        <div><small>SUPPLIER</small><strong>Supplier name</strong></div>
        <div><small>ACTIVE</small><strong>Yes</strong></div>
      </div>
      <div class="detail-summary">
        <div><small>LAST RECEIVED</small><strong>YYYY-MM-DD</strong></div>
        <div><small>LATEST EXPIRATION</small><strong>YYYY-MM-DD</strong></div>
        <div><small>NOTES</small><strong>—</strong></div>
      </div>
      <div class="detail-links">
        <strong>Linked products · 0</strong>
        <div>
          <!-- Repeat -->
          <span>Category — Product name</span>
          <!-- If none: <small>No products use this ingredient in an active recipe.</small> -->
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <!-- Owner only -->
      <button class="btn secondary" type="button" data-open="modal-edit">Edit master data</button>
    </div>
  </div>
</div>

<!-- ===================== MODAL: ADD / EDIT INGREDIENT ===================== -->
<div class="modal-backdrop" id="modal-edit" hidden>
  <div class="modal ingredient-modal">
    <div class="modal-top">
      <div>
        <span class="eyebrow blue">INGREDIENT MASTER</span>
        <h2>Add ingredient</h2><!-- or "Edit ingredient" -->
      </div>
      <button class="icon-btn" type="button" data-close aria-label="Close"><svg class="i" width="18" height="18"><use href="#i-x"/></svg></button>
    </div>
    <div class="modal-body form-grid">
      <label class="field"><span>Ingredient name</span><input></label>
      <label class="field"><span>Category</span><select><option>Category name</option></select></label>
      <label class="field"><span>Subcategory</span><input></label>
      <label class="field"><span>Unit</span><input value="g"></label>
      <label class="field"><span>Reorder level</span><input type="number" min="0" value="0"></label>
      <label class="field"><span>Safety stock</span><input type="number" min="0" value="0"></label>
      <label class="field"><span>Unit cost</span><input type="number" min="0" step="0.01" value="0"></label>
      <label class="field"><span>Preferred supplier</span><select><option value="">Not assigned</option></select></label>
      <label class="field"><span>Notes</span><textarea></textarea></label>
      <label class="field"><span>Status</span><select><option value="true">ACTIVE</option><option value="false">INACTIVE</option></select></label>
    </div>
    <div class="modal-footer">
      <span class="helper-line">Stock changes only through receiving, waste or authorized counts.</span>
      <button class="btn primary" type="button">Save ingredient</button>
    </div>
  </div>
</div>

<script>
(function () {
  /* ---------- view switching (hash-based) ---------- */
  var VIEWS = {
    inventory:   { section: 'inventory', title: 'Inventory' },
    ingredients: { section: 'inventory', title: 'Ingredients' },
    recipes:     { section: 'recipes',   title: 'Recipes' },
    purchasing:  { section: 'purchasing', title: 'Purchasing' },
    receiving:   { section: 'receiving', title: 'Receiving' },
    analytics:   { section: 'analytics', title: 'Ingredient Analytics' }
  };

  function show(name) {
    var v = VIEWS[name] || VIEWS.inventory;
    name = VIEWS[name] ? name : 'inventory';
    document.querySelectorAll('.view').forEach(function (el) {
      el.classList.toggle('active', el.id === 'view-' + v.section);
    });
    document.querySelectorAll('.nav-link[data-view]').forEach(function (a) {
      var on = a.getAttribute('data-view') === name;
      a.classList.toggle('active', on);
      var pip = a.querySelector('.active-pip');
      if (pip) pip.hidden = !on;
    });
    document.getElementById('crumb').textContent = v.title;
    document.getElementById('inv-title').textContent = (name === 'ingredients') ? 'Ingredients' : 'Inventory';
    document.title = v.title + ' · BigBrew Smart Operations';
    closeMenu();
    window.scrollTo(0, 0);
  }
  window.addEventListener('hashchange', function () { show(location.hash.slice(1)); });
  show(location.hash.slice(1));

  /* ---------- tabs ---------- */
  document.addEventListener('click', function (e) {
    var tab = e.target.closest('.tabs button[data-target]');
    if (!tab) return;
    var group = tab.getAttribute('data-group');
    document.querySelectorAll('.tabs button[data-group="' + group + '"]').forEach(function (b) {
      b.classList.toggle('selected', b === tab);
    });
    document.querySelectorAll('div[data-group="' + group + '"]').forEach(function (p) {
      p.hidden = (p.id !== tab.getAttribute('data-target'));
    });
  });

  /* ---------- modals ---------- */
  function closeModals() { document.querySelectorAll('.modal-backdrop').forEach(function (m) { m.hidden = true; }); }
  document.addEventListener('click', function (e) {
    var opener = e.target.closest('[data-open]');
    if (opener) { closeModals(); document.getElementById(opener.getAttribute('data-open')).hidden = false; return; }
    if (e.target.closest('[data-close]')) closeModals();
  });
  document.querySelectorAll('.modal-backdrop').forEach(function (m) {
    m.addEventListener('mousedown', function (e) { if (e.target === m) closeModals(); });
  });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModals(); });

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
