<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>BigBrew Smart Operations – Login</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    box-sizing: border-box;
    padding-top: env(safe-area-inset-top, 0px);
    padding-bottom: env(safe-area-inset-bottom, 0px);
    --bg: #f8fafc;
    --card: #ffffff;
    --border: #e2e8f0;
    --border-input: #cbd5e1;
    --border-soft: #f1f5f9;
    --text: #0f172a;
    --text-2: #334155;
    --text-3: #475569;
    --muted: #64748b;
    --faint: #94a3b8;
    --logo-bg: #111827;
    --primary: #1a5cff;
    --primary-hover: #1449cc;
    --link: #1d4ed8;
    --focus: #3b82f6;
    --chip-bg: #f8fafc;
    --chip-hover: #f1f5f9;
    --err-bg: #fef2f2;
    --err-border: #fecaca;
    --err-text: #991b1b;
    --ok-bg: #f0fdf4;
    --ok-border: #bbf7d0;
    --ok-text: #166534;
    --req: #ef4444;
  }
  @media (prefers-color-scheme: dark) {
    :root:not([data-theme="light"]) {
      --bg: #0b1120;
      --card: #111a2e;
      --border: #1e293b;
      --border-input: #334155;
      --border-soft: #1e293b;
      --text: #f1f5f9;
      --text-2: #e2e8f0;
      --text-3: #cbd5e1;
      --muted: #94a3b8;
      --faint: #64748b;
      --logo-bg: #1e293b;
      --primary: #3b78ff;
      --primary-hover: #5a90ff;
      --link: #60a5fa;
      --chip-bg: #0f172a;
      --chip-hover: #1e293b;
      --err-bg: #2a1215;
      --err-border: #5b2126;
      --err-text: #fca5a5;
      --ok-bg: #0f2a1a;
      --ok-border: #1f5a37;
      --ok-text: #86efac;
    }
  }
  :root[data-theme="dark"] {
    --bg: #0b1120;
    --card: #111a2e;
    --border: #1e293b;
    --border-input: #334155;
    --border-soft: #1e293b;
    --text: #f1f5f9;
    --text-2: #e2e8f0;
    --text-3: #cbd5e1;
    --muted: #94a3b8;
    --faint: #64748b;
    --logo-bg: #1e293b;
    --primary: #3b78ff;
    --primary-hover: #5a90ff;
    --link: #60a5fa;
    --chip-bg: #0f172a;
    --chip-hover: #1e293b;
    --err-bg: #2a1215;
    --err-border: #5b2126;
    --err-text: #fca5a5;
    --ok-bg: #0f2a1a;
    --ok-border: #1f5a37;
    --ok-text: #86efac;
  }

  *, *::before, *::after { box-sizing: border-box; }
  html { scroll-padding-top: env(safe-area-inset-top, 0px); }
  html, body { margin: 0; min-height: 100%; }
  body {
    background: var(--bg);
    color: var(--text);
    font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
  }

  .page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
  }
  .wrap { width: 100%; max-width: 384px; }

  .brand { text-align: center; margin-bottom: 32px; }
  .logo {
    padding: 5px;
    display: inline-flex; align-items: center; justify-content: center;
    width: 35%; height: 70%; background: var(--logo-bg);
    border-radius: 8px; font-size: 24px; line-height: 1;
  }
  .logo img { width: 55%; height: auto; display: block; }
  .brand h1 {
    margin: 0; font-size: 20px; line-height: 28px; font-weight: 700;
    letter-spacing: -0.025em; color: var(--text);
  }
  .brand .tagline { margin: 4px 0 0; font-size: 14px; line-height: 20px; color: var(--muted); }
  .brand .place {
    margin: 4px 0 0; font-size: 12px; line-height: 16px; color: var(--faint);
    display: flex; align-items: center; justify-content: center; gap: 4px;
  }

  .card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 6px;
    box-shadow: 0 1px 2px rgba(15, 23, 42, 0.06);
    padding: 24px;
  }
  .card h2 { margin: 0 0 16px; font-size: 14px; line-height: 20px; font-weight: 600; color: var(--text-2); }
  .card h2.tight { margin-bottom: 8px; }

  .alert {
    border: 1px solid; border-radius: 4px; padding: 10px 12px;
    font-size: 12px; line-height: 18px;
  }
  .alert.error { background: var(--err-bg); border-color: var(--err-border); color: var(--err-text); }
  .alert.success { background: var(--ok-bg); border-color: var(--ok-border); color: var(--ok-text); }
  .alert[hidden] { display: none; }

  form { display: flex; flex-direction: column; gap: 16px; }
  form.spaced { margin-top: 16px; }

  .field { display: flex; flex-direction: column; gap: 4px; }
  .field label { font-size: 12px; line-height: 16px; font-weight: 500; color: var(--text-2); }
  .req { color: var(--req); }

  .input {
    width: 100%; border: 1px solid var(--border-input); border-radius: 4px;
    padding: 8px 12px; font: inherit; font-size: 14px; line-height: 20px;
    color: var(--text); background: var(--card); outline: none;
  }
  .input::placeholder { color: var(--faint); }
  .input:focus { border-color: var(--focus); }
  .input:focus-visible { box-shadow: 0 0 0 3px color-mix(in srgb, var(--focus) 25%, transparent); }
  .pw { position: relative; }
  .pw .input { padding-right: 40px; }
  .pw .toggle {
    position: absolute; right: 8px; top: 50%; transform: translateY(-50%);
    background: none; border: 0; cursor: pointer; padding: 4px 6px;
    font-size: 12px; line-height: 1; color: var(--faint); border-radius: 4px;
  }
  .pw .toggle:hover { color: var(--muted); }

  .row { display: flex; align-items: center; justify-content: space-between; font-size: 12px; }
  .remember { display: flex; align-items: center; gap: 8px; color: var(--text-3); cursor: pointer; }
  .remember input { width: 14px; height: 14px; margin: 0; accent-color: var(--primary); }
  .link {
    background: none; border: 0; padding: 0; font: inherit; font-size: 12px;
    color: var(--link); cursor: pointer;
  }
  .link:hover { text-decoration: underline; }
  .link.back { margin-bottom: 16px; display: inline-flex; align-items: center; gap: 4px; }

  .btn {
    width: 100%; border: 0; border-radius: 4px; cursor: pointer;
    background: var(--primary); color: #fff; font: inherit; font-size: 15px;
    font-weight: 500; letter-spacing: 0.01em; padding: 13px 16px;
  }
  .btn:hover:not(:disabled) { background: var(--primary-hover); }
  .btn:disabled { opacity: 0.6; cursor: not-allowed; }
  .btn.md { font-size: 14px; padding: 10px 16px; }
  .btn.ghost { background: transparent; color: var(--text-2); border: 1px solid var(--border-input); }
  .btn.ghost:hover { background: var(--chip-hover); }
  :where(button, input, a):focus-visible { outline: 2px solid var(--focus); outline-offset: 2px; }
  .input:focus-visible { outline: none; }

  .note { margin: 16px 0 0; font-size: 11px; line-height: 16px; color: var(--faint); text-align: center; }
  .note.help { margin: 0; text-align: left; font-size: 12px; line-height: 18px; color: var(--muted); }

  .demo { margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border-soft); }
  .demo p { margin: 0; text-align: center; font-size: 11px; color: var(--faint); }
  .demo .chips { display: flex; gap: 8px; margin-top: 8px; }
  .chip {
    flex: 1; font: inherit; font-size: 12px; color: var(--text-3);
    background: var(--chip-bg); border: 1px solid var(--border);
    border-radius: 4px; padding: 6px 8px; cursor: pointer;
  }
  .chip:hover { background: var(--chip-hover); }

  .welcome { text-align: center; }
  .welcome .badge {
    display: inline-block; font-size: 11px; font-weight: 600; color: var(--ok-text);
    background: var(--ok-bg); border: 1px solid var(--ok-border);
    border-radius: 999px; padding: 2px 10px; margin-bottom: 12px;
  }
  .welcome h2 { margin-bottom: 4px; font-size: 16px; }
  .welcome .sub { margin: 0 0 20px; font-size: 13px; color: var(--muted); }

  .footer { text-align: center; font-size: 12px; color: var(--faint); margin: 24px 0 0; }
  [hidden] { display: none !important; }
</style>
</head>
<body>
<div class="page">
  <div class="wrap">

    <div class="brand">
      <div class="logo" aria-hidden="true"><img src="assets/big-brew-franchise-logo.webp" alt="BIGBREW Logo"></div>
      <h1>BIGBREW SMART OPERATIONS</h1>
      <p class="tagline">Branch-Level Sales, QR Ordering &amp; Inventory Management System</p>
      <p class="place"><span aria-hidden="true">📍</span> Putatan, Muntinlupa City</p>
    </div>

    <div class="card">

      <!-- Sign in -->
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
        </div>
      </section>

      <!-- Forgot password -->
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

      <!-- Signed in -->
      <section id="view-welcome" class="welcome" hidden>
        <span class="badge">Signed in</span>
        <h2 id="welcome-name">Welcome</h2>
        <p class="sub" id="welcome-role"></p>
        <button type="button" class="btn md ghost" id="signout">Sign out</button>
      </section>

    </div>

    <p class="footer">BigBrew Smart Operations · Putatan Branch · © 2026</p>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  var passwordInput = document.getElementById('password');
  var toggleBtn = document.getElementById('toggle-pw');
  if (!passwordInput || !toggleBtn) return;

  toggleBtn.addEventListener('click', function () {
    var isHidden = passwordInput.type === 'password';
    var start = passwordInput.selectionStart;
    var end = passwordInput.selectionEnd;

    passwordInput.type = isHidden ? 'text' : 'password';
    toggleBtn.textContent = isHidden ? '🙈' : '👁';
    toggleBtn.setAttribute('aria-pressed', String(isHidden));
    toggleBtn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');

    // keep focus and caret position in the password field
    passwordInput.focus();
    passwordInput.setSelectionRange(start, end);
  });
});
</script>
</body>
</html>
