<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>BigBrew Smart Operations</title>
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
    --text: #0f172a;
    --text-2: #334155;
    --text-3: #475569;
    --muted: #64748b;
    --faint: #94a3b8;
    --nav-bg: #0f172a;
    --nav-text: #cbd5e1;
    --nav-hover: #1e293b;
    --nav-line: #1e293b;
    --logo-bg: #111827;
    --primary: #1a5cff;
    --primary-hover: #1449cc;
    --link: #1d4ed8;
    --focus: #3b82f6;
    --chip-bg: #f8fafc;
    --chip-hover: #f1f5f9;
    --err-bg: #fef2f2; --err-border: #fecaca; --err-text: #991b1b;
    --ok-bg: #f0fdf4; --ok-border: #bbf7d0; --ok-text: #166534;
    --req: #ef4444;
    --green: #16a34a; --blue: #2563eb; --amber: #f59e0b;
    --amber-bg: #fffbeb; --amber-border: #fde68a; --amber-text: #92400e;
    --orange-bg: #fff7ed; --orange-border: #fed7aa; --orange-text: #9a3412;
    --red-bg: #fef2f2; --red-border: #fecaca; --red-text: #991b1b;
    --blue-bg: #eff6ff; --blue-border: #bfdbfe; --blue-text: #1d4ed8;
    --slate-bg: #f1f5f9; --slate-text: #334155;
    --purple-bg: #faf5ff; --purple-border: #e9d5ff; --purple-text: #7e22ce;
  }
  @media (prefers-color-scheme: dark) {
    :root:not([data-theme="light"]) {
      --bg: #0b1120; --card: #111a2e; --border: #1e293b; --border-input: #334155;
      --border-soft: #1e293b; --row-hover: #16213a;
      --text: #f1f5f9; --text-2: #e2e8f0; --text-3: #cbd5e1; --muted: #94a3b8; --faint: #64748b;
      --nav-bg: #070c18; --nav-hover: #131c30; --nav-line: #131c30;
      --logo-bg: #1e293b; --primary: #3b78ff; --primary-hover: #5a90ff; --link: #60a5fa;
      --chip-bg: #0f172a; --chip-hover: #1e293b;
      --err-bg: #2a1215; --err-border: #5b2126; --err-text: #fca5a5;
      --ok-bg: #0f2a1a; --ok-border: #1f5a37; --ok-text: #86efac;
      --amber-bg: #2b2108; --amber-border: #6b4f0c; --amber-text: #fcd34d;
      --orange-bg: #2b1707; --orange-border: #6b3a0c; --orange-text: #fdba74;
      --red-bg: #2a1215; --red-border: #5b2126; --red-text: #fca5a5;
      --blue-bg: #0f1d3a; --blue-border: #1e3a8a; --blue-text: #93c5fd;
      --slate-bg: #1e293b; --slate-text: #e2e8f0;
      --purple-bg: #231237; --purple-border: #4c1d95; --purple-text: #d8b4fe;
    }
  }
  :root[data-theme="dark"] {
    --bg: #0b1120; --card: #111a2e; --border: #1e293b; --border-input: #334155;
    --border-soft: #1e293b; --row-hover: #16213a;
    --text: #f1f5f9; --text-2: #e2e8f0; --text-3: #cbd5e1; --muted: #94a3b8; --faint: #64748b;
    --nav-bg: #070c18; --nav-hover: #131c30; --nav-line: #131c30;
    --logo-bg: #1e293b; --primary: #3b78ff; --primary-hover: #5a90ff; --link: #60a5fa;
    --chip-bg: #0f172a; --chip-hover: #1e293b;
    --err-bg: #2a1215; --err-border: #5b2126; --err-text: #fca5a5;
    --ok-bg: #0f2a1a; --ok-border: #1f5a37; --ok-text: #86efac;
    --amber-bg: #2b2108; --amber-border: #6b4f0c; --amber-text: #fcd34d;
    --orange-bg: #2b1707; --orange-border: #6b3a0c; --orange-text: #fdba74;
    --red-bg: #2a1215; --red-border: #5b2126; --red-text: #fca5a5;
    --blue-bg: #0f1d3a; --blue-border: #1e3a8a; --blue-text: #93c5fd;
    --slate-bg: #1e293b; --slate-text: #e2e8f0;
    --purple-bg: #231237; --purple-border: #4c1d95; --purple-text: #d8b4fe;
  }

  *, *::before, *::after { box-sizing: border-box; }
  html { scroll-padding-top: env(safe-area-inset-top, 0px); }
  html, body { margin: 0; min-height: 100%; }
  body {
    background: var(--bg); color: var(--text);
    font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 20px;
  }
  button { font: inherit; color: inherit; }
  [hidden] { display: none !important; }
  :where(button, input, a):focus-visible { outline: 2px solid var(--focus); outline-offset: 2px; }

  /* ============ LOGIN ============ */
  #login-screen { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 16px; background: var(--bg); }
  .wrap { width: 100%; max-width: 384px; }
  .brand { text-align: center; margin-bottom: 32px; }
  .logo { display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; background: var(--logo-bg); border-radius: 8px; margin-bottom: 16px; font-size: 24px; line-height: 1; }
  .brand h1 { margin: 0; font-size: 20px; line-height: 28px; font-weight: 700; letter-spacing: -0.025em; }
  .brand .tagline { margin: 4px 0 0; font-size: 14px; color: var(--muted); }
  .brand .place { margin: 4px 0 0; font-size: 12px; line-height: 16px; color: var(--faint); display: flex; align-items: center; justify-content: center; gap: 4px; }
  .lcard { background: var(--card); border: 1px solid var(--border); border-radius: 6px; box-shadow: 0 1px 2px rgba(15,23,42,.06); padding: 24px; }
  .lcard h2 { margin: 0 0 16px; font-size: 14px; font-weight: 600; color: var(--text-2); }
  .lcard h2.tight { margin-bottom: 8px; }
  .alert { border: 1px solid; border-radius: 4px; padding: 10px 12px; font-size: 12px; line-height: 18px; }
  .alert.error { background: var(--err-bg); border-color: var(--err-border); color: var(--err-text); }
  .alert.success { background: var(--ok-bg); border-color: var(--ok-border); color: var(--ok-text); }
  form { display: flex; flex-direction: column; gap: 16px; }
  form.spaced { margin-top: 16px; }
  .field { display: flex; flex-direction: column; gap: 4px; }
  .field label { font-size: 12px; line-height: 16px; font-weight: 500; color: var(--text-2); }
  .req { color: var(--req); }
  .input { width: 100%; border: 1px solid var(--border-input); border-radius: 4px; padding: 8px 12px; font: inherit; font-size: 14px; color: var(--text); background: var(--card); outline: none; }
  .input::placeholder { color: var(--faint); }
  .input:focus { border-color: var(--focus); box-shadow: 0 0 0 3px color-mix(in srgb, var(--focus) 25%, transparent); }
  .pw { position: relative; }
  .pw .input { padding-right: 40px; }
  .pw .toggle { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: none; border: 0; cursor: pointer; padding: 4px 6px; font-size: 12px; line-height: 1; color: var(--faint); border-radius: 4px; }
  .pw .toggle:hover { color: var(--muted); }
  .row { display: flex; align-items: center; justify-content: space-between; font-size: 12px; }
  .remember { display: flex; align-items: center; gap: 8px; color: var(--text-3); cursor: pointer; }
  .remember input { width: 14px; height: 14px; margin: 0; accent-color: var(--primary); }
  .link { background: none; border: 0; padding: 0; font-size: 12px; color: var(--link); cursor: pointer; }
  .link:hover { text-decoration: underline; }
  .link.back { margin-bottom: 16px; display: inline-flex; align-items: center; gap: 4px; }
  .btn { width: 100%; border: 0; border-radius: 4px; cursor: pointer; background: var(--primary); color: #fff; font-size: 15px; font-weight: 500; letter-spacing: .01em; padding: 13px 16px; }
  .btn:hover:not(:disabled) { background: var(--primary-hover); }
  .btn:disabled { opacity: .6; cursor: not-allowed; }
  .btn.md { font-size: 14px; padding: 10px 16px; }
  .note { margin: 16px 0 0; font-size: 11px; line-height: 16px; color: var(--faint); text-align: center; }
  .note.help { margin: 0; text-align: left; font-size: 12px; line-height: 18px; color: var(--muted); }
  .demo { margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border-soft); }
  .demo p { margin: 0; text-align: center; font-size: 11px; color: var(--faint); }
  .demo .chips { display: flex; gap: 8px; margin-top: 8px; }
  .chip { flex: 1; font-size: 12px; color: var(--text-3); background: var(--chip-bg); border: 1px solid var(--border); border-radius: 4px; padding: 6px 8px; cursor: pointer; }
  .chip:hover { background: var(--chip-hover); }
  .lfooter { text-align: center; font-size: 12px; color: var(--faint); margin: 24px 0 0; }

  /* ============ APP SHELL ============ */
  #app { display: flex; min-height: 100vh; }
  .sidebar {
    width: 232px; flex: none; background: var(--nav-bg); color: var(--nav-text);
    display: flex; flex-direction: column; position: sticky; top: 0; height: 100vh;
    transition: width .15s ease; z-index: 20;
    padding-top: env(safe-area-inset-top, 0px); padding-bottom: env(safe-area-inset-bottom, 0px);
  }
  .sb-head { display: flex; align-items: center; justify-content: space-between; padding: 16px 14px 14px; border-bottom: 1px solid var(--nav-line); min-height: 64px; }
  .sb-brand { min-width: 0; }
  .sb-brand strong { display: block; color: #fff; font-size: 15px; letter-spacing: .02em; line-height: 18px; }
  .sb-brand span { display: block; font-size: 11px; color: var(--faint); margin-top: 2px; white-space: nowrap; }
  .sb-collapse { background: none; border: 0; color: var(--faint); cursor: pointer; padding: 4px; border-radius: 4px; display: inline-flex; }
  .sb-collapse:hover { color: #fff; background: var(--nav-hover); }
  .sb-collapse svg { transition: transform .15s ease; }
  .nav { display: flex; flex-direction: column; margin-top: 10px; flex: 1; }
  .nav-item {
    display: flex; align-items: center; gap: 12px; width: 100%; text-align: left;
    background: none; border: 0; cursor: pointer; color: var(--nav-text);
    padding: 12px 14px; font-size: 13px; position: relative;
  }
  .nav-item:hover { background: var(--nav-hover); color: #fff; }
  .nav-item.active { background: var(--primary); color: #fff; font-weight: 500; }
  .nav-item .ic { width: 18px; height: 18px; flex: none; display: inline-flex; align-items: center; justify-content: center; font-size: 15px; }
  .nav-item .label { flex: 1; white-space: nowrap; }
  .nav-badge { background: #f59e0b; color: #fff; border-radius: 999px; min-width: 20px; height: 20px; padding: 0 6px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; }
  .sb-user { border-top: 1px solid var(--nav-line); padding: 14px; display: flex; align-items: center; justify-content: space-between; gap: 8px; }
  .sb-user .who { min-width: 0; }
  .sb-user strong { display: block; color: #fff; font-size: 13px; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .sb-user span { font-size: 11px; color: var(--faint); }
  .sb-user button { background: none; border: 0; cursor: pointer; color: var(--faint); padding: 6px; border-radius: 4px; display: inline-flex; }
  .sb-user button:hover { color: #fff; background: var(--nav-hover); }

  .sidebar.collapsed { width: 64px; }
  .sidebar.collapsed .sb-brand, .sidebar.collapsed .nav-item .label, .sidebar.collapsed .sb-user .who { display: none; }
  .sidebar.collapsed .sb-head { justify-content: center; padding-left: 0; padding-right: 0; }
  .sidebar.collapsed .sb-collapse svg { transform: rotate(180deg); }
  .sidebar.collapsed .nav-item { justify-content: center; padding-left: 0; padding-right: 0; }
  .sidebar.collapsed .nav-badge { position: absolute; top: 4px; right: 8px; min-width: 16px; height: 16px; font-size: 10px; padding: 0 4px; }
  .sidebar.collapsed .sb-user { justify-content: center; padding-left: 0; padding-right: 0; }

  .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }
  .topbar {
    background: var(--card); border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between; gap: 12px;
    padding: 12px 20px; padding-top: calc(12px + env(safe-area-inset-top, 0px));
    font-size: 13px; position: sticky; top: 0; z-index: 10;
  }
  .topbar .left { color: var(--text-2); font-weight: 500; min-width: 0; }
  .topbar .left .loc { color: var(--muted); font-weight: 400; }
  .topbar .right { display: flex; align-items: center; gap: 14px; color: var(--muted); font-size: 12px; white-space: nowrap; }
  .alert-chip { display: inline-flex; align-items: center; gap: 4px; background: var(--amber-bg); border: 1px solid var(--amber-border); color: var(--amber-text); border-radius: 4px; padding: 4px 8px; font-size: 12px; cursor: pointer; }
  .alert-chip:hover { filter: brightness(.97); }

  .content { padding: 24px 24px 96px; }
  .page-title { margin: 0; font-size: 18px; line-height: 28px; font-weight: 600; }
  .page-sub { margin: 0 0 20px; font-size: 14px; color: var(--muted); }

  .grid-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 20px; }
  .stat { background: var(--card); border: 1px solid var(--border); border-left-width: 4px; border-radius: 4px; box-shadow: 0 1px 2px rgba(15,23,42,.06); padding: 14px 16px; text-align: left; width: 100%; }
  button.stat { cursor: pointer; }
  button.stat:hover { box-shadow: 0 2px 6px rgba(15,23,42,.12); }
  .stat.green { border-left-color: var(--green); }
  .stat.blue { border-left-color: var(--blue); }
  .stat.amber { border-left-color: var(--amber); }
  .stat .lbl { font-size: 12px; line-height: 16px; letter-spacing: .05em; text-transform: uppercase; color: var(--muted); font-weight: 500; }
  .stat .val { font-size: 26px; line-height: 34px; font-weight: 600; margin-top: 4px; color: var(--text); }
  .stat .sub { font-size: 12px; color: var(--faint); margin-top: 2px; }

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
  .q-box.blue { background: var(--blue-bg); color: var(--blue-text); }
  .q-box.amber { background: var(--amber-bg); color: var(--amber-text); }

  .outline-btn { width: 100%; margin-top: 12px; background: var(--card); border: 1px solid var(--border-input); border-radius: 4px; padding: 7px 12px; font-size: 12px; color: var(--text); cursor: pointer; }
  .outline-btn:hover { background: var(--row-hover); }
  .ghost-btn { background: none; border: 0; border-radius: 4px; padding: 4px 8px; font-size: 12px; color: var(--text-2); cursor: pointer; }
  .ghost-btn:hover { background: var(--row-hover); }

  .alerts { display: flex; flex-direction: column; gap: 8px; }
  .alert-row { display: flex; align-items: center; justify-content: space-between; width: 100%; text-align: left; border: 1px solid; border-radius: 4px; padding: 8px 12px; font-size: 12px; cursor: pointer; }
  .alert-row.amber { background: var(--amber-bg); border-color: var(--amber-border); color: var(--amber-text); }
  .alert-row.orange { background: var(--orange-bg); border-color: var(--orange-border); color: var(--orange-text); }
  .alert-row.red { background: var(--red-bg); border-color: var(--red-border); color: var(--red-text); }
  .alert-row:hover { filter: brightness(.96); }
  .empty { text-align: center; font-size: 12px; color: var(--faint); padding: 16px 0; }

  .table-wrap { overflow-x: auto; }
  table { width: 100%; border-collapse: collapse; font-size: 14px; }
  th { text-align: left; font-size: 12px; font-weight: 500; color: var(--muted); padding: 8px 12px; border-bottom: 1px solid var(--border); white-space: nowrap; }
  td { padding: 8px 12px; border-bottom: 1px solid var(--border-soft); color: var(--text-2); white-space: nowrap; }
  tbody tr:last-child td { border-bottom: 0; }
  tbody tr:hover { background: var(--row-hover); }
  td.num { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 12px; color: var(--link); font-weight: 500; }
  td.amt { font-weight: 500; color: var(--text); }

  .badge { display: inline-block; font-size: 11px; line-height: 16px; font-weight: 500; padding: 1px 8px; border-radius: 3px; border: 1px solid transparent; letter-spacing: .02em; }
  .b-blue { background: var(--blue-bg); border-color: var(--blue-border); color: var(--blue-text); }
  .b-purple { background: var(--purple-bg); border-color: var(--purple-border); color: var(--purple-text); }
  .b-amber { background: var(--amber-bg); border-color: var(--amber-border); color: var(--amber-text); }
  .b-green { background: var(--ok-bg); border-color: var(--ok-border); color: var(--ok-text); }
  .b-slate { background: var(--slate-bg); border-color: var(--border); color: var(--slate-text); }

  .placeholder { text-align: center; padding: 48px 16px; color: var(--muted); }
  .placeholder h3 { margin: 0 0 6px; color: var(--text-2); font-size: 16px; }
  .placeholder p { margin: 0; font-size: 13px; }

  .fabs { position: fixed; right: 16px; bottom: calc(16px + env(safe-area-inset-bottom, 0px)); display: flex; align-items: center; gap: 8px; z-index: 30; }
  .fab-qr { display: inline-flex; align-items: center; gap: 8px; background: #c2570c; color: #fff; border: 0; border-radius: 999px; padding: 10px 16px; font-size: 13px; font-weight: 500; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,.25); }
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

<!-- ===================== LOGIN ===================== -->
<div id="login-screen">
  <div class="wrap">
    <div class="brand">
      <div class="logo" aria-hidden="true">☕</div>
      <h1>BIGBREW SMART OPERATIONS</h1>
      <p class="tagline">Branch-Level Sales, QR Ordering &amp; Inventory Management System</p>
      <p class="place"><span aria-hidden="true">📍</span> Putatan, Muntinlupa City</p>
    </div>

    <div class="lcard">
      <section id="view-login">
        <h2>Sign in to your account</h2>
        <div id="login-error" class="alert error" role="alert" hidden></div>
        <form id="login-form" class="spaced" novalidate>
          <div class="field">
            <label for="username">Username or Email <span class="req">*</span></label>
            <input class="input" id="username" type="text" autocomplete="username" placeholder="Enter your username">
          </div>
          <div class="field">
            <label for="password">Password <span class="req">*</span></label>
            <div class="pw">
              <input class="input" id="password" type="password" autocomplete="current-password" placeholder="Enter your password">
              <button type="button" class="toggle" id="toggle-pw" aria-label="Show password" aria-pressed="false">👁</button>
            </div>
          </div>
          <div class="row">
            <label class="remember"><input type="checkbox" id="remember"> Remember me</label>
            <button type="button" class="link" id="go-forgot">Forgot password?</button>
          </div>
          <button type="submit" class="btn" id="login-btn">LOGIN</button>
        </form>
        <p class="note">Your role and access are determined by your account. Contact the owner to manage access.</p>
        <div class="demo">
          <p>Demo accounts</p>
          <div class="chips">
            <button type="button" class="chip" data-user="owner">Owner login</button>
            <button type="button" class="chip" data-user="cashier">Cashier login</button>
          </div>
        </div>
      </section>

      <section id="view-forgot" hidden>
        <button type="button" class="link back" id="back-login"><span aria-hidden="true">←</span> Back to login</button>
        <h2 class="tight">Reset password</h2>
        <form id="forgot-form" novalidate>
          <p class="note help">Enter your username or email and we'll send reset instructions to the registered contact.</p>
          <div class="field">
            <label for="forgot-username">Username or Email <span class="req">*</span></label>
            <input class="input" id="forgot-username" type="text" autocomplete="username">
          </div>
          <button type="submit" class="btn md">Send Reset Instructions</button>
        </form>
        <div id="forgot-sent" class="alert success" role="status" hidden>
          Reset instructions sent. Check the registered contact for this account. Contact the owner if you need assistance.
        </div>
      </section>
    </div>

    <p class="lfooter">BigBrew Smart Operations · Putatan Branch · © 2026</p>
  </div>
</div>

<!-- ===================== APP ===================== -->
<div id="app" hidden>
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
    <nav class="nav" id="nav"></nav>
    <div class="sb-user">
      <div class="who">
        <strong id="sb-name">Carlo Santos</strong>
        <span id="sb-role">Cashier</span>
      </div>
      <button id="signout" aria-label="Sign out" title="Sign out">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18.4 6.6a9 9 0 11-12.8 0"/><path d="M12 2v10"/></svg>
      </button>
    </div>
  </aside>

  <div class="main">
    <header class="topbar">
      <div class="left">BigBrew Smart Operations <span class="loc">&nbsp;·&nbsp; Putatan, Muntinlupa</span></div>
      <div class="right">
        <span class="date">Sep 29, 2026</span>
        <button class="alert-chip" id="top-alerts" hidden>⚠ <span id="top-alerts-n">0</span> stock alerts</button>
      </div>
    </header>
    <main class="content" id="content"></main>
  </div>

  <div class="fabs">
    <button class="fab-qr" id="fab-qr">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM20 14v3M14 20h3M20 20h1"/></svg>
      Customer QR View
    </button>
    <button class="fab-help" id="fab-help" aria-label="Help" title="Help">?</button>
  </div>
</div>

<script>
(function () {
  /* ---------- sample data (stand-in for ../data/sample) ---------- */
  var USERS = [
    { username: 'owner',   name: 'Branch Owner',  role: 'owner' },
    { username: 'cashier', name: 'Carlo Santos',  role: 'cashier' }
  ];
  var DEMO_PASSWORD = 'password';

  var SAMPLE_ORDERS = [
    { id: 4, number: '#00127', customer: 'MARIA', source: 'POS',       total: 57, paymentStatus: 'PAID', orderStatus: 'PREPARING' },
    { id: 3, number: '#00126', customer: 'JOSE',  source: 'QR Online', total: 78, paymentStatus: 'PAID', orderStatus: 'READY' },
    { id: 2, number: '#00125', customer: 'ANA',   source: 'POS',       total: 64, paymentStatus: 'PAID', orderStatus: 'PAID' },
    { id: 1, number: '#00124', customer: 'BEN',   source: 'QR Online', total: 60, paymentStatus: 'PAID', orderStatus: 'COMPLETED' }
  ];
  var INGREDIENTS = [
    { name: 'Fresh Milk',      status: 'LOW STOCK' },
    { name: 'Espresso Beans',  status: 'LOW STOCK' },
    { name: 'Caramel Syrup',   status: 'OUT OF STOCK' },
    { name: 'Whipped Cream',   status: 'EXPIRING SOON' },
    { name: 'Oat Milk',        status: 'EXPIRED' },
    { name: 'Paper Cups',      status: 'IN STOCK' }
  ];

  var NAV = [
    { id: 'dashboard',   label: 'Dashboard',    icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 12h18M12 3v18"/></svg>' },
    { id: 'new-sale',    label: 'New Sale',     icon: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>' },
    { id: 'order-queue', label: 'Order Queue',  icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>', badge: 'pending' },
    { id: 'sales',       label: 'Sales',        icon: '<span style="font-size:16px;font-weight:500">₱</span>' },
    { id: 'stock-alerts',label: 'Stock Alerts', icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.3 3.9L1.8 18a2 2 0 001.7 3h17a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg>', badge: 'lowStock' }
  ];
  var TITLES = { 'new-sale': 'New Sale', 'order-queue': 'Order Queue', 'sales': 'Sales', 'stock-alerts': 'Stock Alerts', 'qr': 'Customer QR View' };

  var $ = function (id) { return document.getElementById(id); };
  var session = null;
  var page = 'dashboard';

  /* ---------- helpers ---------- */
  function peso(n) { return '₱' + Number(n).toLocaleString('en-PH'); }
  function esc(s) { return String(s).replace(/[&<>"']/g, function (c) { return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'})[c]; }); }
  function badge(status) {
    var cls = 'b-slate';
    if (status === 'POS' || status === 'PREPARING') cls = 'b-blue';
    else if (status === 'QR Online') cls = 'b-purple';
    else if (status === 'READY') cls = 'b-amber';
    else if (status === 'COMPLETED' || status === 'PAID') cls = 'b-green';
    return '<span class="badge ' + cls + '">' + esc(status) + '</span>';
  }
  function stats() {
    var paid = SAMPLE_ORDERS.filter(function (o) { return o.paymentStatus === 'PAID'; });
    var count = function (list, fn) { return list.filter(fn).length; };
    return {
      todaySales: paid.reduce(function (s, o) { return s + o.total; }, 0),
      txCount: paid.length,
      pending: count(SAMPLE_ORDERS, function (o) { return o.orderStatus === 'NEW' || o.orderStatus === 'PAID'; }),
      preparing: count(SAMPLE_ORDERS, function (o) { return o.orderStatus === 'PREPARING'; }),
      ready: count(SAMPLE_ORDERS, function (o) { return o.orderStatus === 'READY'; }),
      lowStock: count(INGREDIENTS, function (i) { return i.status === 'LOW STOCK' || i.status === 'OUT OF STOCK'; }),
      expiring: count(INGREDIENTS, function (i) { return i.status === 'EXPIRING SOON'; }),
      expired: count(INGREDIENTS, function (i) { return i.status === 'EXPIRED'; })
    };
  }
  function greeting() {
    var h = new Date().getHours();
    return h < 12 ? 'Good morning' : h < 18 ? 'Good afternoon' : 'Good evening';
  }

  /* ---------- login ---------- */
  var username = $('username'), password = $('password'), errorBox = $('login-error'), loginBtn = $('login-btn');
  var lviews = { login: $('view-login'), forgot: $('view-forgot') };
  function showLoginView(name) { Object.keys(lviews).forEach(function (k) { lviews[k].hidden = (k !== name); }); }
  function setError(msg) {
    if (!msg) { errorBox.hidden = true; errorBox.textContent = ''; return; }
    errorBox.hidden = false; errorBox.innerHTML = '';
    var s = document.createElement('strong'); s.textContent = 'Login failed.';
    errorBox.appendChild(s); errorBox.appendChild(document.createTextNode(' ' + msg));
  }

  try {
    var saved = localStorage.getItem('bigbrew:username');
    if (saved) { username.value = saved; $('remember').checked = true; }
  } catch (e) {}

  $('toggle-pw').addEventListener('click', function () {
    var hidden = password.type === 'password';
    var start = password.selectionStart, end = password.selectionEnd;
    password.type = hidden ? 'text' : 'password';
    this.textContent = hidden ? '🙈' : '👁';
    this.setAttribute('aria-pressed', String(hidden));
    this.setAttribute('aria-label', hidden ? 'Hide password' : 'Show password');
    password.focus();
    try { password.setSelectionRange(start, end); } catch (e) {}
  });

  document.querySelectorAll('.chip').forEach(function (chip) {
    chip.addEventListener('click', function () {
      username.value = chip.getAttribute('data-user');
      password.value = DEMO_PASSWORD;
      setError('');
    });
  });

  $('login-form').addEventListener('submit', function (e) {
    e.preventDefault();
    if (!username.value.trim()) { setError('Username or email is required.'); return; }
    if (!password.value.trim()) { setError('Password is required.'); return; }
    loginBtn.disabled = true; loginBtn.textContent = 'Signing in…'; setError('');
    setTimeout(function () {
      var name = username.value.toLowerCase().trim();
      var user = USERS.filter(function (u) { return u.username === name; })[0];
      loginBtn.disabled = false; loginBtn.textContent = 'LOGIN';
      if (!user || password.value !== DEMO_PASSWORD) {
        setError('Invalid username or password. Please try again.');
        return;
      }
      try {
        if ($('remember').checked) localStorage.setItem('bigbrew:username', user.username);
        else localStorage.removeItem('bigbrew:username');
      } catch (err) {}
      startSession(user);
    }, 800);
  });

  $('go-forgot').addEventListener('click', function () {
    $('forgot-username').value = username.value;
    $('forgot-form').hidden = false; $('forgot-sent').hidden = true;
    showLoginView('forgot');
  });
  $('back-login').addEventListener('click', function () { showLoginView('login'); });
  $('forgot-form').addEventListener('submit', function (e) {
    e.preventDefault();
    $('forgot-form').hidden = true; $('forgot-sent').hidden = false;
  });

  /* ---------- session ---------- */
  function startSession(user) {
    session = user; page = 'dashboard';
    $('login-screen').hidden = true;
    $('app').hidden = false;
    $('sb-name').textContent = user.name;
    $('sb-role').textContent = user.role.charAt(0).toUpperCase() + user.role.slice(1);
    $('sidebar').classList.toggle('collapsed', window.innerWidth < 760);
    window.scrollTo(0, 0);
    render();
  }
  $('signout').addEventListener('click', function () {
    session = null; password.value = ''; setError('');
    $('app').hidden = true; $('login-screen').hidden = false;
    showLoginView('login');
  });
  $('sb-collapse').addEventListener('click', function () { $('sidebar').classList.toggle('collapsed'); });

  function navigate(id) { page = id; window.scrollTo(0, 0); render(); }
  $('top-alerts').addEventListener('click', function () { navigate('stock-alerts'); });
  $('fab-qr').addEventListener('click', function () { navigate('qr'); });
  $('fab-help').addEventListener('click', function () {
    navigate('dashboard');
  });

  /* ---------- rendering ---------- */
  function renderNav(s) {
    var html = NAV.map(function (n) {
      var b = n.badge ? s[n.badge] : 0;
      return '<button class="nav-item' + (page === n.id ? ' active' : '') + '" data-nav="' + n.id + '"' + (page === n.id ? ' aria-current="page"' : '') + ' title="' + n.label + '">' +
        '<span class="ic">' + n.icon + '</span><span class="label">' + n.label + '</span>' +
        (b > 0 ? '<span class="nav-badge">' + b + '</span>' : '') + '</button>';
    }).join('');
    $('nav').innerHTML = html;
  }

  function statCard(label, value, sub, accent, navTo) {
    var inner = '<div class="lbl">' + label + '</div><div class="val">' + value + '</div><div class="sub">' + sub + '</div>';
    return navTo
      ? '<button class="stat ' + accent + '" data-nav="' + navTo + '">' + inner + '</button>'
      : '<div class="stat ' + accent + '">' + inner + '</div>';
  }

  function cashierDashboard(s) {
    var first = session.name.split(' ')[0];
    var alerts = '';
    if (s.lowStock > 0) alerts += '<button class="alert-row amber" data-nav="stock-alerts"><span>⚠ ' + s.lowStock + ' low/out-of-stock ingredient' + (s.lowStock > 1 ? 's' : '') + '</span><span>→</span></button>';
    if (s.expiring > 0) alerts += '<button class="alert-row orange" data-nav="stock-alerts"><span>🕐 ' + s.expiring + ' ingredient' + (s.expiring > 1 ? 's' : '') + ' expiring soon</span><span>→</span></button>';
    if (s.expired > 0)  alerts += '<button class="alert-row red" data-nav="stock-alerts"><span>✕ ' + s.expired + ' expired ingredient' + (s.expired > 1 ? 's' : '') + '</span><span>→</span></button>';
    if (!alerts) alerts = '<p class="empty">No active stock alerts.</p>';

    var rows = SAMPLE_ORDERS.slice(0, 5).map(function (o) {
      return '<tr><td class="num">' + o.number + '</td><td>' + esc(o.customer) + '</td><td>' + badge(o.source) + '</td><td class="amt">' + peso(o.total) + '</td><td>' + badge(o.orderStatus) + '</td></tr>';
    }).join('');

    return '' +
      '<h1 class="page-title">' + greeting() + ', ' + esc(first) + '</h1>' +
      '<p class="page-sub">Here\'s your operational summary for today — Sep 29, 2026</p>' +
      '<div class="grid-stats">' +
        statCard("Today's Sales", peso(s.todaySales), 'Net sales', 'green', 'sales') +
        statCard('Transactions', s.txCount, 'Today', 'blue') +
        statCard('Pending Orders', s.pending, 'New / Paid', 'amber', 'order-queue') +
        statCard('Ready for Pickup', s.ready, 'Awaiting release', 'amber', 'order-queue') +
      '</div>' +
      '<div class="grid-2">' +
        '<section class="card"><h3>Order Queue Status</h3>' +
          '<div class="q-status">' +
            '<div class="q-box slate"><div class="n">' + s.pending + '</div><div class="t">New / Paid</div></div>' +
            '<div class="q-box blue"><div class="n">' + s.preparing + '</div><div class="t">Preparing</div></div>' +
            '<div class="q-box amber"><div class="n">' + s.ready + '</div><div class="t">Ready</div></div>' +
          '</div>' +
          '<button class="outline-btn" data-nav="order-queue">Open Order Queue →</button>' +
        '</section>' +
        '<section class="card"><h3>Inventory Alerts</h3><div class="alerts">' + alerts + '</div></section>' +
      '</div>' +
      '<section class="card">' +
        '<div class="card-head"><h3>Recent Orders</h3><button class="ghost-btn" data-nav="order-queue">View Queue</button></div>' +
        '<div class="table-wrap"><table><thead><tr><th>Order</th><th>Customer</th><th>Source</th><th>Total</th><th>Status</th></tr></thead><tbody>' + rows + '</tbody></table></div>' +
      '</section>';
  }

  function placeholder(title) {
    return '<h1 class="page-title">' + esc(title) + '</h1><p class="page-sub">BigBrew Putatan · Sep 29, 2026</p>' +
      '<section class="card placeholder"><h3>' + esc(title) + '</h3><p>This screen hasn\'t been built yet.</p></section>';
  }

  function render() {
    var s = stats();
    renderNav(s);

    var chip = $('top-alerts');
    chip.hidden = s.lowStock === 0;
    $('top-alerts-n').textContent = s.lowStock;

    var html;
    if (page === 'dashboard') {
      html = session.role === 'cashier'
        ? cashierDashboard(s)
        : '<h1 class="page-title">Operations Overview</h1><p class="page-sub">BigBrew Putatan · Sep 29, 2026</p><section class="card placeholder"><h3>Owner dashboard</h3><p>The owner view hasn\'t been built yet. Sign in as the cashier to see the cashier dashboard.</p></section>';
    } else {
      html = placeholder(TITLES[page] || 'Page');
    }
    $('content').innerHTML = html;
  }

  document.addEventListener('click', function (e) {
    var el = e.target.closest('[data-nav]');
    if (el && session) navigate(el.getAttribute('data-nav'));
  });
})();
</script>
</body>
</html>
