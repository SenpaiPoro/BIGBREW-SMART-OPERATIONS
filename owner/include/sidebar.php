<?php
/**
 * include/sidebar.php
 * -----------------------------------------------------------------
 * Left navigation. Included by header.php, which provides:
 *   $activePage, $userName, $userRole, $userInitials
 *
 * Links are relative, so keep the owner pages in the same folder.
 * To add a menu item, add a row to $nav below.
 *   key   = value of $activePage on that page
 *   view  = (optional) only used by inventory.php to switch its sections
 */
$nav = [
    'OPERATIONS' => [
        ['key' => 'dashboard',   'label' => 'Dashboard',   'href' => 'dashboard.php',   'icon' => 'grid'],
        ['key' => 'user', 'label' => 'User', 'href' => 'user.php', 'icon' => 'list'],
    ],
    'INVENTORY' => [
        ['key' => 'inventory',   'label' => 'Inventory',            'href' => 'inventory.php#inventory',   'icon' => 'box',   'view' => 'inventory'],
        ['key' => 'ingredients', 'label' => 'Ingredients',          'href' => 'inventory.php#ingredients', 'icon' => 'list',  'view' => 'ingredients'],
        ['key' => 'recipes',     'label' => 'Recipes',              'href' => 'inventory.php#recipes',     'icon' => 'book',  'view' => 'recipes'],
        ['key' => 'purchasing',  'label' => 'Purchasing',           'href' => 'inventory.php#purchasing',  'icon' => 'cart',  'view' => 'purchasing'],
        ['key' => 'receiving',   'label' => 'Receiving',            'href' => 'inventory.php#receiving',   'icon' => 'inbox', 'view' => 'receiving'],
        ['key' => 'analytics',   'label' => 'Ingredient Analytics', 'href' => 'inventory.php#analytics',   'icon' => 'chart', 'view' => 'analytics'],
    ],
    'INSIGHTS' => [
        ['key' => 'reports',     'label' => 'Reports',     'href' => 'reports.php',     'icon' => 'file'],
    ],
];
?>
  <!-- ===================== SIDEBAR ===================== -->
  <div class="nav-overlay" id="nav-overlay" hidden></div>
  <aside class="sidebar" id="sidebar">
    <div class="brand">
      <span class="brand-mark"><img src="<?= BASE_URL ?>/../assets/big-brew-franchise-logo.webp" alt="BigBrew logo"></span>
      <div>
        <strong>BigBrew<span class="brand-dot">.</span></strong>
        <small>SMART OPERATIONS</small>
      </div>
      <button class="icon-btn" id="menu-close" type="button" aria-label="Close menu"><svg class="i" width="18" height="18"><use href="#i-x"/></svg></button>
    </div>

    <div class="branch-label"><span class="branch-dot"></span> BRANCH <svg class="i" width="13" height="13"><use href="#i-chevron"/></svg></div>
    <div class="branch-name">Putatan, Muntinlupa</div>

    <nav>
      <?php foreach ($nav as $group => $items): ?>
      <div class="nav-group">
        <div class="nav-label"><?= e($group) ?></div>
        <?php foreach ($items as $item): $on = ($activePage === $item['key']); ?>
        <a class="nav-link<?= $on ? ' active' : '' ?>" href="<?= e($item['href']) ?>"<?= isset($item['view']) ? ' data-view="' . e($item['view']) . '"' : '' ?>>
          <span><svg class="i" width="16" height="16"><use href="#i-<?= e($item['icon']) ?>"/></svg></span>
          <span><?= e($item['label']) ?></span>
          <span class="active-pip"<?= $on ? '' : ' hidden' ?>></span>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endforeach; ?>
    </nav>

    <div class="sidebar-bottom">
      <a class="profile" href="<?= BASE_URL ?>/logout.php" title="Sign out">
        <span class="avatar"><?= e($userInitials) ?></span>
        <span class="profile-text"><strong><?= e($userName) ?></strong><small><?= e($userRole) ?></small></span>
      </a>
    </div>
  </aside>
