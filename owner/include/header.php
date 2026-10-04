<?php
/**
 * include/header.php
 * -----------------------------------------------------------------
 * Opens the page: <head>, icon sprite, app shell, sidebar, top bar
 * and the <main> area. Close it with include/footer.php.
 *
 * Set these variables in the page BEFORE including this file:
 *   $pageTitle   string  <title> text and breadcrumb        (default "Dashboard")
 *   $activePage  string  highlights a sidebar link:
 *                        dashboard | new-sale | order-queue | inventory | reports
 *   $crumb       string  optional breadcrumb override
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
 * BASE_URL = web path to the project root (e.g. "/bigbrew"), used for CSS,
 * images and logout. It is detected automatically. To hard-code it instead,
 * define it in the page before including this file:
 *     define('BASE_URL', '/bigbrew');
 */
if (!defined('BASE_URL')) {
    $root = str_replace('\\', '/', (string) realpath(__DIR__ . '/..'));
    $doc  = str_replace('\\', '/', (string) realpath($_SERVER['DOCUMENT_ROOT'] ?? ''));
    define('BASE_URL', ($doc !== '' && strpos($root, $doc) === 0)
        ? rtrim(substr($root, strlen($doc)), '/')
        : '');
}

/*
 * Optional access guard - enable once your login stores the session.
 * if (empty($_SESSION['username'])) {
 *     header('Location: ' . BASE_URL . '/login.php');
 *     exit;
 * }
 */

if (!function_exists('e')) {
    /** Escape output for HTML. */
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$pageTitle  = $pageTitle  ?? 'Dashboard';
$activePage = $activePage ?? '';
$crumb      = $crumb      ?? $pageTitle;

/* Signed-in user - change the session keys to match your login. */
$userName     = $_SESSION['name'] ?? $_SESSION['username'] ?? 'Owner';
$userRole     = $_SESSION['role'] ?? 'Owner';
$nameParts    = preg_split('/\s+/', trim((string) $userName)) ?: [''];
$userInitials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
if ($userInitials === '') {
    $userInitials = 'U';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?> · BigBrew Smart Operations</title>
<link rel="stylesheet" href="layout.css">
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
      <symbol id="i-download" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></symbol>
  </defs>
</svg>

<div class="app-shell">

<?php include __DIR__ . '/sidebar.php'; ?>

  <!-- ===================== WORKSPACE ===================== -->
  <div class="workspace">
    <header class="topbar">
      <div class="top-left">
        <button class="icon-btn" id="menu-btn" type="button" aria-label="Open menu"><svg class="i" width="19" height="19"><use href="#i-menu"/></svg></button>
        <strong>BigBrew</strong>
        <span class="breadcrumb">/ <span id="crumb"><?= e($crumb) ?></span></span>
      </div>
      <div class="top-right">
        <span class="top-date"><?= date('M j, Y') ?></span>
        <span class="top-divider"></span>
        <span class="connection"><svg class="i" width="10" height="10"><circle cx="12" cy="12" r="8" fill="currentColor"/></svg> ONLINE</span>
        <span class="avatar small"><?= e($userInitials) ?></span>
      </div>
    </header>

    <main class="main-content">
