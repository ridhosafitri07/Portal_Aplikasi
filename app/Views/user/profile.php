<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppPortal – Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ── LIGHT VARS ── */
        :root {
            --navy: #0a1628;
            --blue-900: #0d2247;
            --blue-800: #1a3a6e;
            --blue-700: #1e4db7;
            --blue-600: #2563eb;
            --blue-500: #3b82f6;
            --blue-400: #60a5fa;
            --blue-300: #93c5fd;
            --blue-200: #bfdbfe;
            --blue-100: #dbeafe;
            --blue-50: #eff6ff;

            --bg-body: #f0f6ff;
            --bg-card: #ffffff;
            --bg-navbar: rgba(255,255,255,0.82);

            --text-primary: #0d2247;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;

            --border-color: rgba(37,99,235,0.1);
            --border-input: var(--blue-200);
            --border-card: rgba(37,99,235,0.08);

            --shadow-card: 0 4px 24px rgba(37,99,235,0.06);
            --shadow-navbar: 0 1px 32px rgba(37,99,235,0.08);
            --shadow-brand: 0 4px 14px rgba(37,99,235,0.4);

            /* component-level */
            --card-bg: #ffffff;
            --card-border: rgba(37,99,235,0.08);
            --field-bg: #f8fafc;
            --field-border: #e2e8f0;
            --field-color: #64748b;
            --label-color: #475569;
            --form-divider: #f1f5f9;
            --info-item-border: #f1f5f9;
            --info-icon-bg: #eff6ff;
            --info-icon-color: #3b82f6;
            --tip-bg: linear-gradient(135deg, #eff6ff, #f0f9ff);
            --tip-border: #dbeafe;
            --tip-text: #475569;
            --tip-icon: #3b82f6;
            --cancel-bg: #f1f5f9;
            --cancel-color: #64748b;
            --cancel-hover: #e2e8f0;
            --modal-bg: #ffffff;
            --modal-icon-bg: linear-gradient(135deg, #fef2f2, #fee2e2);
            --logout-btn-bg: linear-gradient(135deg, #fee2e2, #fecaca);
            --logout-btn-border: #fca5a5;
            --logout-btn-color: #dc2626;
            --breadcrumb-color: #94a3b8;
            --breadcrumb-link: #3b82f6;
            --meta-val-color: #0d2247;
            --meta-lbl-color: #94a3b8;
        }

        /* ── DARK VARS ── */
        body.dark-mode {
            --navy: #e0eeff;
            --blue-900: #cbd9f9;
            --blue-800: #a8c4f8;
            --blue-700: #7eaaff;
            --blue-600: #5b9cf9;
            --blue-500: #60a5fa;
            --blue-400: #93c5fd;
            --blue-300: #bfdbfe;
            --blue-200: #2a4c8a;
            --blue-100: #1a3261;
            --blue-50: #11204a;

            --bg-body: #080e1f;
            --bg-card: #111827;
            --bg-navbar: rgba(10,16,35,0.88);

            --text-primary: #e2eaff;
            --text-secondary: #8fa3c8;
            --text-muted: #5a6e8f;

            --border-color: rgba(59,130,246,0.15);
            --border-input: rgba(59,130,246,0.3);
            --border-card: rgba(59,130,246,0.12);

            --shadow-card: 0 4px 24px rgba(0,0,0,0.35);
            --shadow-navbar: 0 1px 32px rgba(0,0,0,0.4);
            --shadow-brand: 0 4px 14px rgba(37,99,235,0.5);

            --card-bg: #111827;
            --card-border: rgba(59,130,246,0.12);
            --field-bg: #0f172a;
            --field-border: rgba(59,130,246,0.2);
            --field-color: #8fa3c8;
            --label-color: #8fa3c8;
            --form-divider: rgba(59,130,246,0.1);
            --info-item-border: rgba(59,130,246,0.1);
            --info-icon-bg: rgba(59,130,246,0.15);
            --info-icon-color: #60a5fa;
            --tip-bg: linear-gradient(135deg, rgba(29,78,216,0.15), rgba(14,30,60,0.3));
            --tip-border: rgba(59,130,246,0.2);
            --tip-text: #8fa3c8;
            --tip-icon: #60a5fa;
            --cancel-bg: #1e293b;
            --cancel-color: #94a3b8;
            --cancel-hover: #263246;
            --modal-bg: #111827;
            --modal-icon-bg: rgba(239,68,68,0.15);
            --logout-btn-bg: rgba(239,68,68,0.15);
            --logout-btn-border: rgba(239,68,68,0.3);
            --logout-btn-color: #f87171;
            --breadcrumb-color: #5a6e8f;
            --breadcrumb-link: #60a5fa;
            --meta-val-color: #e2eaff;
            --meta-lbl-color: #5a6e8f;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-body);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background .35s, color .35s;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 10% -10%, rgba(37,99,235,0.14) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(96,165,250,0.1) 0%, transparent 55%),
                var(--bg-body);
            z-index: -2;
            transition: background .35s;
        }

        body.dark-mode::before {
            background:
                radial-gradient(ellipse 80% 60% at 10% -10%, rgba(37,99,235,0.08) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(96,165,250,0.05) 0%, transparent 55%),
                var(--bg-body);
        }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0;
            height: 68px;
            background: var(--bg-navbar);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid var(--border-color);
            display: flex; align-items: center;
            padding: 0 36px;
            z-index: 1000;
            box-shadow: var(--shadow-navbar);
            transition: background .3s, box-shadow .3s, border-color .3s;
        }

        .nav-brand {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
            position: absolute; left: 36px;
        }

        .nav-brand-logo {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-400));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700; font-size: .95rem; color: white;
            box-shadow: var(--shadow-brand);
            flex-shrink: 0;
        }

        .nav-brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700; font-size: 1.15rem;
            color: var(--blue-800);
            letter-spacing: -0.3px;
            transition: color .3s;
        }

        .nav-brand-name span { color: var(--blue-500); }

        .nav-links {
            display: flex; align-items: center; gap: 4px;
            margin: 0 auto;
        }

        .nav-links a {
            text-decoration: none; color: var(--text-secondary);
            font-size: .9rem; font-weight: 500;
            padding: 8px 16px; border-radius: 8px;
            display: flex; align-items: center; gap: 7px;
            transition: all .2s;
        }

        .nav-links a:hover { color: var(--blue-600); background: var(--blue-50); }

        .nav-links a.active {
            color: var(--blue-700);
            background: linear-gradient(135deg, var(--blue-100), var(--blue-50));
            font-weight: 600;
        }

        body.dark-mode .nav-links a.active {
            color: var(--blue-400);
            background: rgba(59,130,246,0.15);
        }

        .nav-right {
            position: absolute; right: 36px;
            display: flex; align-items: center; gap: 10px;
        }

        .btn-logout-nav {
            display: flex; align-items: center; gap: 8px;
            padding: 8px 18px;
            background: var(--logout-btn-bg);
            border: 1.5px solid var(--logout-btn-border);
            color: var(--logout-btn-color);
            border-radius: 10px;
            font-size: .85rem; font-weight: 600;
            cursor: pointer;
            transition: all .25s;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-logout-nav:hover {
            background: linear-gradient(135deg, #ef4444, #f87171);
            border-color: #ef4444;
            color: white;
            box-shadow: 0 4px 14px rgba(239,68,68,0.3);
            transform: translateY(-1px);
        }

        /* ── MAIN ── */
        .main {
            padding-top: 100px;
            padding-bottom: 60px;
            max-width: 1100px;
            margin: 0 auto;
            padding-left: 36px;
            padding-right: 36px;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            margin-bottom: 36px;
            display: flex; align-items: flex-end; justify-content: space-between;
            gap: 16px;
        }

        .page-header-left h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem; font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.5px;
            margin-bottom: 6px;
            transition: color .3s;
        }

        .page-header-left p {
            color: var(--text-muted); font-size: .9rem;
            transition: color .3s;
        }

        /* ── ALERT ── */
        .alert-wrap { margin-bottom: 24px; }

        .alert {
            display: flex; align-items: center; gap: 12px;
            padding: 14px 18px;
            border-radius: 12px;
            font-size: .88rem; font-weight: 500;
            animation: slideDown .4s cubic-bezier(0.34,1.56,0.64,1);
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: linear-gradient(135deg, #dcfce7, #f0fdf4);
            border: 1.5px solid #86efac;
            color: #15803d;
        }

        .alert-error {
            background: linear-gradient(135deg, #fee2e2, #fef2f2);
            border: 1.5px solid #fca5a5;
            color: #dc2626;
        }

        .alert-close {
            margin-left: auto; background: none; border: none;
            color: inherit; cursor: pointer; opacity: .6;
            font-size: 1rem; transition: opacity .2s;
        }

        .alert-close:hover { opacity: 1; }

        /* ── PROFILE HERO CARD ── */
        .profile-hero-card {
            background: var(--card-bg);
            border-radius: 24px;
            border: 1.5px solid var(--card-border);
            box-shadow: var(--shadow-card);
            padding: 36px 40px;
            margin-bottom: 24px;
            display: flex; align-items: center; gap: 32px;
            position: relative; overflow: hidden;
            transition: background .3s, border-color .3s;
        }

        .profile-hero-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, var(--blue-600), var(--blue-400), #93c5fd);
        }

        .profile-hero-card::after {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(37,99,235,0.06), transparent 70%);
            pointer-events: none;
        }

        .profile-avatar-big {
            width: 88px; height: 88px; border-radius: 50%;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-400));
            display: flex; align-items: center; justify-content: center;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem; font-weight: 700; color: white;
            box-shadow: 0 8px 28px rgba(37,99,235,0.35);
            flex-shrink: 0;
            position: relative;
        }

        .profile-avatar-big .online-dot {
            position: absolute; bottom: 4px; right: 4px;
            width: 16px; height: 16px; border-radius: 50%;
            background: #22c55e;
            border: 2.5px solid var(--card-bg);
            box-shadow: 0 2px 6px rgba(34,197,94,0.4);
            transition: border-color .3s;
        }

        .profile-info { flex: 1; }

        .profile-info h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem; font-weight: 700;
            color: var(--text-primary); margin-bottom: 4px;
            letter-spacing: -0.3px;
            transition: color .3s;
        }

        .profile-info .username-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--blue-50);
            border: 1px solid var(--blue-100);
            color: var(--blue-600);
            font-size: .8rem; font-weight: 600;
            padding: 4px 12px; border-radius: 100px;
            transition: background .3s, border-color .3s;
        }

        .profile-meta {
            display: flex; gap: 24px; margin-top: 16px;
        }

        .profile-meta-item { display: flex; flex-direction: column; }

        .profile-meta-item .val {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.1rem; font-weight: 700;
            color: var(--meta-val-color);
            transition: color .3s;
        }

        .profile-meta-item .lbl {
            font-size: .75rem; color: var(--meta-lbl-color); margin-top: 2px;
            transition: color .3s;
        }

        /* ── SETTINGS GRID ── */
        .settings-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 24px;
            align-items: start;
        }

        /* ── CARD PANEL ── */
        .card-panel {
            background: var(--card-bg);
            border-radius: 20px;
            border: 1.5px solid var(--card-border);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: background .3s, border-color .3s;
        }

        .card-panel-header {
            padding: 24px 28px 0;
            display: flex; align-items: center; gap: 12px;
        }

        .card-panel-icon {
            width: 40px; height: 40px; border-radius: 10px;
            background: linear-gradient(135deg, var(--blue-100), var(--blue-50));
            display: flex; align-items: center; justify-content: center;
            color: var(--blue-600); font-size: 1.1rem;
            transition: background .3s;
        }

        .card-panel-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem; font-weight: 700;
            color: var(--text-primary);
            transition: color .3s;
        }

        .card-panel-subtitle {
            font-size: .78rem; color: var(--text-muted); margin-top: 2px;
            transition: color .3s;
        }

        .card-panel-body { padding: 24px 28px; }

        /* ── FORM ── */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: .8rem; font-weight: 600;
            color: var(--label-color);
            margin-bottom: 8px; letter-spacing: 0.3px;
            text-transform: uppercase;
            transition: color .3s;
        }

        .field-readonly {
            padding: 12px 16px;
            border: 1.5px solid var(--field-border);
            border-radius: 12px;
            background: var(--field-bg);
            color: var(--field-color);
            font-size: .9rem; font-weight: 500;
            display: flex; align-items: center; gap: 10px;
            transition: background .3s, border-color .3s, color .3s;
        }

        .field-readonly i { color: var(--text-muted); font-size: .95rem; }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border-input);
            border-radius: 12px;
            font-size: .9rem; font-weight: 500;
            color: var(--text-primary);
            background: var(--field-bg);
            transition: all .25s;
            font-family: 'DM Sans', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--blue-500);
            box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
            background: var(--card-bg);
        }

        .form-input::placeholder { color: var(--text-muted); }

        .input-with-toggle { position: relative; }
        .input-with-toggle .form-input { padding-right: 48px; }

        .toggle-pwd {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            color: var(--text-muted); cursor: pointer; font-size: 1rem;
            transition: color .2s; padding: 4px;
        }

        .toggle-pwd:hover { color: var(--blue-500); }

        /* Password strength */
        .pwd-strength { margin-top: 8px; display: none; }
        .pwd-strength.show { display: block; }

        .strength-bars { display: flex; gap: 4px; margin-bottom: 4px; }

        .strength-bar {
            flex: 1; height: 3px; border-radius: 2px;
            background: var(--field-border);
            transition: background .3s;
        }

        .strength-bar.weak { background: #ef4444; }
        .strength-bar.fair { background: #f59e0b; }
        .strength-bar.good { background: #3b82f6; }
        .strength-bar.strong { background: #22c55e; }

        .strength-label { font-size: .75rem; color: var(--text-muted); }

        .match-msg {
            margin-top: 6px; font-size: .78rem; font-weight: 500;
            min-height: 18px;
            display: flex; align-items: center; gap: 5px;
        }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .form-divider {
            height: 1px; background: var(--form-divider);
            margin: 24px 0;
            transition: background .3s;
        }

        /* ── SUBMIT BUTTON ── */
        .btn-submit {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 28px;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
            color: white;
            border: none; border-radius: 12px;
            font-size: .9rem; font-weight: 600;
            cursor: pointer;
            transition: all .25s;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 4px 14px rgba(37,99,235,0.3);
        }

        .btn-submit:hover:not(:disabled) {
            background: linear-gradient(135deg, var(--blue-700), var(--blue-600));
            box-shadow: 0 6px 20px rgba(37,99,235,0.45);
            transform: translateY(-2px);
        }

        .btn-submit:disabled { opacity: .5; cursor: not-allowed; box-shadow: none; }

        .btn-submit .spinner {
            display: none;
            width: 16px; height: 16px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin .6s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        /* ── THEME SECTION ── */
        .theme-section { padding: 8px 0; }

        .theme-label-title {
            font-size: .8rem; font-weight: 600;
            color: var(--label-color);
            text-transform: uppercase; letter-spacing: 0.3px;
            margin-bottom: 14px;
            transition: color .3s;
        }

        .theme-cards { display: flex; gap: 12px; }

        .theme-card {
            flex: 1; border-radius: 14px; overflow: hidden;
            border: 2px solid var(--field-border);
            cursor: pointer;
            transition: all .25s cubic-bezier(0.34,1.56,0.64,1);
            position: relative;
        }

        .theme-card:hover { transform: translateY(-3px); border-color: var(--blue-300); }

        .theme-card.selected {
            border-color: var(--blue-600);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }

        .theme-card-check {
            position: absolute; top: 8px; right: 8px;
            width: 22px; height: 22px;
            border-radius: 50%;
            background: var(--blue-600);
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: .7rem;
            opacity: 0;
            transform: scale(0);
            transition: all .25s;
        }

        .theme-card.selected .theme-card-check { opacity: 1; transform: scale(1); }

        .theme-preview-box {
            height: 80px;
            display: flex; padding: 10px; gap: 6px;
        }

        .theme-preview-box.light-prev { background: linear-gradient(135deg, #f0f6ff, #e8f0fe); }
        .theme-preview-box.dark-prev  { background: linear-gradient(135deg, #0f1929, #1a2840); }

        .theme-preview-sidebar { width: 22px; border-radius: 4px; }
        .light-prev .theme-preview-sidebar { background: rgba(37,99,235,0.25); }
        .dark-prev  .theme-preview-sidebar { background: rgba(96,165,250,0.2); }

        .theme-preview-content { flex: 1; display: flex; flex-direction: column; gap: 4px; }

        .theme-preview-bar { border-radius: 3px; height: 6px; }
        .light-prev .theme-preview-bar { background: rgba(37,99,235,0.15); }
        .dark-prev  .theme-preview-bar { background: rgba(255,255,255,0.1); }
        .theme-preview-bar.short { width: 60%; }

        /* Card label for light card */
        .theme-card:first-child .theme-card-label {
            text-align: center; padding: 8px;
            font-size: .78rem; font-weight: 600;
            background: white;
            color: #64748b;
        }
        .theme-card:first-child.selected .theme-card-label { color: var(--blue-600); }

        /* Card label for dark card */
        .theme-card:last-child .theme-card-label {
            text-align: center; padding: 8px;
            font-size: .78rem; font-weight: 600;
            background: #1e2535;
            color: #94a3b8;
        }
        .theme-card:last-child.selected .theme-card-label { color: #60a5fa; }

        /* ── INFO ITEMS ── */
        .info-item {
            display: flex; align-items: center; gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid var(--info-item-border);
            transition: border-color .3s;
        }

        .info-item:last-child { border-bottom: none; }

        .info-icon {
            width: 36px; height: 36px; border-radius: 9px;
            background: var(--info-icon-bg);
            display: flex; align-items: center; justify-content: center;
            color: var(--info-icon-color); font-size: .9rem;
            flex-shrink: 0;
            transition: background .3s, color .3s;
        }

        .info-text { flex: 1; }
        .info-text .key { font-size: .75rem; color: var(--text-muted); transition: color .3s; }
        .info-text .val {
            font-size: .88rem; font-weight: 600; color: var(--text-primary);
            margin-top: 2px;
            transition: color .3s;
        }

        /* ── SECURITY TIP ── */
        .security-tip {
            background: var(--tip-bg);
            border: 1.5px solid var(--tip-border);
            border-radius: 12px;
            padding: 14px 16px;
            display: flex; gap: 12px;
            align-items: flex-start;
            transition: background .3s, border-color .3s;
        }

        .security-tip i { color: var(--tip-icon); font-size: 1.1rem; margin-top: 1px; flex-shrink: 0; }
        .security-tip p { font-size: .8rem; color: var(--tip-text); line-height: 1.5; transition: color .3s; }

        /* ── LOGOUT MODAL ── */
        .modal-overlay {
            position: fixed; inset: 0;
            background: rgba(5,10,25,0.65);
            backdrop-filter: blur(10px);
            z-index: 2000;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity .3s;
        }

        .modal-overlay.show { opacity: 1; pointer-events: all; }

        .modal-box {
            background: var(--modal-bg);
            border-radius: 24px;
            padding: 40px 36px;
            max-width: 420px; width: 90%;
            text-align: center;
            box-shadow: 0 32px 80px rgba(5,10,25,0.4);
            transform: scale(.9) translateY(20px);
            transition: transform .3s cubic-bezier(0.34,1.56,0.64,1), background .3s;
            border: 1px solid var(--border-color);
        }

        .modal-overlay.show .modal-box { transform: scale(1) translateY(0); }

        .modal-icon {
            width: 70px; height: 70px;
            background: var(--modal-icon-bg);
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; color: #ef4444;
            margin: 0 auto 22px;
            transition: background .3s;
        }

        .modal-box h3 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.3rem; color: var(--text-primary); margin-bottom: 10px;
            transition: color .3s;
        }

        .modal-box p { font-size: .9rem; color: var(--text-muted); margin-bottom: 28px; transition: color .3s; }

        .modal-btns { display: flex; gap: 12px; }

        .modal-btns button {
            flex: 1; padding: 13px;
            border: none; border-radius: 12px;
            font-size: .9rem; font-weight: 600;
            cursor: pointer; transition: all .2s;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-cancel { background: var(--cancel-bg); color: var(--cancel-color); }
        .btn-cancel:hover { background: var(--cancel-hover); }

        .btn-confirm {
            background: linear-gradient(135deg, #ef4444, #f87171);
            color: white;
            box-shadow: 0 4px 12px rgba(239,68,68,0.3);
        }

        .btn-confirm:hover {
            box-shadow: 0 6px 20px rgba(239,68,68,0.45);
            transform: translateY(-1px);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) { .settings-grid { grid-template-columns: 1fr; } }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .nav-brand { left: 16px; }
            .nav-right { right: 16px; }
            .btn-logout-nav span { display: none; }
            .btn-logout-nav { padding: 8px 12px; }
            .main { padding: 88px 16px 48px; }
            .profile-hero-card { flex-direction: column; text-align: center; padding: 28px 24px; }
            .profile-meta { justify-content: center; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 8px; }
            .form-row { grid-template-columns: 1fr; }
            .theme-cards { gap: 10px; }
        }

        @media (max-width: 480px) {
            .card-panel-body { padding: 20px 20px; }
            .card-panel-header { padding: 20px 20px 0; }
            .profile-hero-card { padding: 24px 20px; }
            .profile-avatar-big { width: 72px; height: 72px; font-size: 1.6rem; }
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--blue-300); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--blue-400); }

        /* ── ANIMATIONS ── */
        .fade-in {
            opacity: 0; transform: translateY(16px);
            animation: fadeUp .5s ease forwards;
        }
        .fade-in:nth-child(1) { animation-delay: 0.05s; }
        .fade-in:nth-child(2) { animation-delay: 0.1s; }
        .fade-in:nth-child(3) { animation-delay: 0.15s; }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── THEME NOTE ── */
        .theme-note {
            font-size: .75rem; color: var(--text-muted); margin-top: 12px;
            transition: color .3s;
        }
    </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<nav class="navbar" id="navbar">
    <a href="<?= base_url('user/dashboard') ?>" class="nav-brand">
        <div class="nav-brand-logo">AP</div>
        <span class="nav-brand-name"><span>App</span>Portal</span>
    </a>

    <div class="nav-links">
        <a href="<?= base_url('user/dashboard') ?>">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?= base_url('user/profile') ?>" class="active">
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <div class="nav-right">
        <button class="btn-logout-nav" onclick="showLogoutModal()">
            <i class="bi bi-box-arrow-right"></i>
            <span>Keluar</span>
        </button>
    </div>
</nav>

<!-- ── LOGOUT MODAL ── -->
<div class="modal-overlay" id="logoutModal">
    <div class="modal-box">
        <div class="modal-icon"><i class="bi bi-power"></i></div>
        <h3>Keluar dari Akun?</h3>
        <p>Sesi kamu akan berakhir dan kamu perlu login kembali untuk mengakses portal.</p>
        <div class="modal-btns">
            <button class="btn-cancel" onclick="closeLogoutModal()">Batal</button>
            <button class="btn-confirm" onclick="confirmLogout()">
                <i class="bi bi-box-arrow-right"></i> Ya, Keluar
            </button>
        </div>
    </div>
</div>

<div class="main">

    <!-- ── PAGE HEADER ── -->
    <div class="page-header fade-in">
        <div class="page-header-left">
            <h1>Pengaturan Akun</h1>
            <p>Kelola informasi dan keamanan akun kamu</p>
        </div>
    </div>

    <!-- ── FLASH MESSAGES ── -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert-wrap">
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i>
            <?= session()->getFlashdata('success') ?>
            <button class="alert-close" onclick="this.closest('.alert-wrap').remove()"><i class="bi bi-x"></i></button>
        </div>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert-wrap">
        <div class="alert alert-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <?= session()->getFlashdata('error') ?>
            <button class="alert-close" onclick="this.closest('.alert-wrap').remove()"><i class="bi bi-x"></i></button>
        </div>
    </div>
    <?php endif; ?>

    <!-- ── PROFILE HERO ── -->
    <div class="profile-hero-card fade-in">
        <div class="profile-avatar-big">
            <?= strtoupper(substr($user['nama_user'] ?? 'U', 0, 1)) ?>
            <div class="online-dot"></div>
        </div>
        <div class="profile-info">
            <h2><?= esc($user['nama_user'] ?? '') ?></h2>
            <div class="username-badge" style="margin-top:6px;">
                <i class="bi bi-at"></i>
                <?= esc($user['username'] ?? '') ?>
            </div>
            <div class="profile-meta">
                <div class="profile-meta-item">
                    <span class="val">User</span>
                    <span class="lbl">Role</span>
                </div>
                <div class="profile-meta-item">
                    <span class="val">Aktif</span>
                    <span class="lbl">Status</span>
                </div>
                <div class="profile-meta-item">
                    <span class="val" id="todayDisplay">–</span>
                    <span class="lbl">Hari ini</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ── SETTINGS GRID ── -->
    <div class="settings-grid">

        <!-- ── LEFT: FORMS ── -->
        <div class="fade-in">
            <!-- Info Section -->
            <div class="card-panel" style="margin-bottom: 20px;">
                <div class="card-panel-header">
                    <div class="card-panel-icon"><i class="bi bi-person-badge"></i></div>
                    <div>
                        <div class="card-panel-title">Informasi Akun</div>
                        <div class="card-panel-subtitle">Data yang terdaftar pada sistem</div>
                    </div>
                </div>
                <div class="card-panel-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="field-readonly">
                                <i class="bi bi-person"></i>
                                <?= esc($user['nama_user'] ?? '') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <div class="field-readonly">
                                <i class="bi bi-at"></i>
                                <?= esc($user['username'] ?? '') ?>
                            </div>
                        </div>
                    </div>
                    <div class="security-tip" style="margin-top:4px;">
                        <i class="bi bi-info-circle"></i>
                        <p>Informasi akun dikelola oleh administrator. Hubungi admin jika ada perubahan yang diperlukan.</p>
                    </div>
                </div>
            </div>

            <!-- Password Section -->
            <div class="card-panel">
                <div class="card-panel-header">
                    <div class="card-panel-icon" style="background:linear-gradient(135deg,#fef9c3,#fefce8); color:#ca8a04;">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div>
                        <div class="card-panel-title">Ubah Password</div>
                        <div class="card-panel-subtitle">Gunakan password yang kuat dan unik</div>
                    </div>
                </div>
                <div class="card-panel-body">
                    <form action="<?= base_url('user/profile/password') ?>" method="POST" id="formPassword">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label class="form-label">Password Lama</label>
                            <div class="input-with-toggle">
                                <input type="password" name="old_password" id="oldPwd"
                                       class="form-input" placeholder="Masukkan password lama">
                                <button type="button" class="toggle-pwd" onclick="togglePwd('oldPwd','iconOld')">
                                    <i class="bi bi-eye-slash" id="iconOld"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-divider"></div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Password Baru</label>
                                <div class="input-with-toggle">
                                    <input type="password" name="new_password" id="newPwd"
                                           class="form-input" placeholder="Password baru">
                                    <button type="button" class="toggle-pwd" onclick="togglePwd('newPwd','iconNew')">
                                        <i class="bi bi-eye-slash" id="iconNew"></i>
                                    </button>
                                </div>
                                <div class="pwd-strength" id="pwdStrength">
                                    <div class="strength-bars">
                                        <div class="strength-bar" id="bar1"></div>
                                        <div class="strength-bar" id="bar2"></div>
                                        <div class="strength-bar" id="bar3"></div>
                                        <div class="strength-bar" id="bar4"></div>
                                    </div>
                                    <div class="strength-label" id="strengthLabel">–</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Konfirmasi Password</label>
                                <div class="input-with-toggle">
                                    <input type="password" name="confirm_password" id="confirmPwd"
                                           class="form-input" placeholder="Ulangi password baru">
                                    <button type="button" class="toggle-pwd" onclick="togglePwd('confirmPwd','iconConfirm')">
                                        <i class="bi bi-eye-slash" id="iconConfirm"></i>
                                    </button>
                                </div>
                                <div class="match-msg" id="matchMsg"></div>
                            </div>
                        </div>

                        <div class="security-tip" style="margin-bottom: 20px;">
                            <i class="bi bi-lightbulb"></i>
                            <p>Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol untuk password yang lebih aman.</p>
                        </div>

                        <button type="submit" class="btn-submit" id="btnSubmit" disabled>
                            <span class="spinner" id="spinner"></span>
                            <i class="bi bi-check2-circle" id="btnIcon"></i>
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ── RIGHT COLUMN ── -->
        <div class="fade-in" style="display:flex; flex-direction:column; gap:20px;">

            <!-- Appearance -->
            <div class="card-panel">
                <div class="card-panel-header">
                    <div class="card-panel-icon" style="background:linear-gradient(135deg,#f3e8ff,#ede9fe); color:#9333ea;">
                        <i class="bi bi-palette2"></i>
                    </div>
                    <div>
                        <div class="card-panel-title">Tampilan</div>
                        <div class="card-panel-subtitle">Pilih tema favoritmu</div>
                    </div>
                </div>
                <div class="card-panel-body">
                    <div class="theme-section">
                        <div class="theme-label-title">Tema Warna</div>
                        <div class="theme-cards">
                            <div class="theme-card" id="themeLight" onclick="selectTheme('light')">
                                <div class="theme-card-check"><i class="bi bi-check2"></i></div>
                                <div class="theme-preview-box light-prev">
                                    <div class="theme-preview-sidebar"></div>
                                    <div class="theme-preview-content">
                                        <div class="theme-preview-bar"></div>
                                        <div class="theme-preview-bar short"></div>
                                        <div class="theme-preview-bar"></div>
                                    </div>
                                </div>
                                <div class="theme-card-label">☀️ Light</div>
                            </div>

                            <div class="theme-card" id="themeDark" onclick="selectTheme('dark')">
                                <div class="theme-card-check"><i class="bi bi-check2"></i></div>
                                <div class="theme-preview-box dark-prev">
                                    <div class="theme-preview-sidebar"></div>
                                    <div class="theme-preview-content">
                                        <div class="theme-preview-bar"></div>
                                        <div class="theme-preview-bar short"></div>
                                        <div class="theme-preview-bar"></div>
                                    </div>
                                </div>
                                <div class="theme-card-label">🌙 Dark</div>
                            </div>
                        </div>
                        <p class="theme-note">
                            Tersimpan di browser. Tema berlaku di semua halaman portal.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Account info quick view -->
            <div class="card-panel">
                <div class="card-panel-header">
                    <div class="card-panel-icon" style="background:linear-gradient(135deg,#dcfce7,#f0fdf4); color:#16a34a;">
                        <i class="bi bi-info-square"></i>
                    </div>
                    <div>
                        <div class="card-panel-title">Detail Sesi</div>
                        <div class="card-panel-subtitle">Informasi sesi aktif</div>
                    </div>
                </div>
                <div class="card-panel-body" style="padding-top:16px;">
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-person-check"></i></div>
                        <div class="info-text">
                            <div class="key">Login sebagai</div>
                            <div class="val"><?= esc(session('nama_user')) ?></div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-shield-check"></i></div>
                        <div class="info-text">
                            <div class="key">Status Akun</div>
                            <div class="val" style="color:#16a34a;">● Aktif</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-clock"></i></div>
                        <div class="info-text">
                            <div class="key">Waktu Sekarang</div>
                            <div class="val" id="currentTime">–</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
// ─────────────────────────────────
//  THEME — apply to body + sync cross-page via localStorage
// ─────────────────────────────────
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    // Update card UI
    document.getElementById('themeLight').classList.toggle('selected', theme === 'light');
    document.getElementById('themeDark').classList.toggle('selected', theme === 'dark');
}

function selectTheme(theme) {
    // Simpan ke localStorage — ini yang dibaca dashboard juga
    localStorage.setItem('portal_theme', theme);
    applyTheme(theme);
}

// Terapkan saat halaman load
(function() {
    const saved = localStorage.getItem('portal_theme') || 'light';
    applyTheme(saved);
})();

// ─────────────────────────────────
//  DATE / TIME
// ─────────────────────────────────
const DAYS_ID   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
const MONTHS_ID = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

function updateTime() {
    const now = new Date();
    const dd = document.getElementById('todayDisplay');
    const ct = document.getElementById('currentTime');
    if (dd) dd.textContent = `${DAYS_ID[now.getDay()]}, ${now.getDate()} ${MONTHS_ID[now.getMonth()]}`;
    if (ct) {
        const h = String(now.getHours()).padStart(2,'0');
        const m = String(now.getMinutes()).padStart(2,'0');
        const s = String(now.getSeconds()).padStart(2,'0');
        ct.textContent = `${h}:${m}:${s}`;
    }
}
updateTime();
setInterval(updateTime, 1000);

// ─────────────────────────────────
//  PASSWORD TOGGLE
// ─────────────────────────────────
function togglePwd(inputId, iconId) {
    const inp = document.getElementById(inputId);
    const ico = document.getElementById(iconId);
    if (inp.type === 'password') {
        inp.type = 'text';
        ico.className = 'bi bi-eye';
    } else {
        inp.type = 'password';
        ico.className = 'bi bi-eye-slash';
    }
}

// ─────────────────────────────────
//  PASSWORD STRENGTH
// ─────────────────────────────────
const newPwd    = document.getElementById('newPwd');
const confirmPwd = document.getElementById('confirmPwd');
const matchMsg  = document.getElementById('matchMsg');
const btnSubmit = document.getElementById('btnSubmit');

newPwd.addEventListener('input', function() {
    const val = this.value;
    const strength = getStrength(val);
    const pwdStrength = document.getElementById('pwdStrength');

    if (val.length > 0) {
        pwdStrength.classList.add('show');
        updateStrengthBars(strength);
    } else {
        pwdStrength.classList.remove('show');
    }
    checkMatch();
});

function getStrength(pwd) {
    let score = 0;
    if (pwd.length >= 8) score++;
    if (/[A-Z]/.test(pwd)) score++;
    if (/[0-9]/.test(pwd)) score++;
    if (/[^A-Za-z0-9]/.test(pwd)) score++;
    return score;
}

function updateStrengthBars(score) {
    const labels  = ['', 'Lemah', 'Cukup', 'Bagus', 'Kuat'];
    const classes = ['', 'weak', 'fair', 'good', 'strong'];
    const colors  = ['', '#ef4444', '#f59e0b', '#3b82f6', '#22c55e'];

    for (let i = 1; i <= 4; i++) {
        const bar = document.getElementById('bar' + i);
        bar.className = 'strength-bar';
        if (i <= score) bar.classList.add(classes[score]);
    }

    const lbl = document.getElementById('strengthLabel');
    lbl.textContent = labels[score] || '';
    lbl.style.color = colors[score] || '#94a3b8';
}

confirmPwd.addEventListener('input', checkMatch);

function checkMatch() {
    const n = newPwd.value;
    const c = confirmPwd.value;
    const oldVal = document.getElementById('oldPwd').value;

    if (!c) { matchMsg.innerHTML = ''; btnSubmit.disabled = true; return; }
    if (n === c && n.length >= 6 && oldVal.length > 0) {
        matchMsg.innerHTML = '<i class="bi bi-check-circle-fill" style="color:#16a34a;"></i> <span style="color:#16a34a;">Password cocok</span>';
        btnSubmit.disabled = false;
    } else if (n !== c) {
        matchMsg.innerHTML = '<i class="bi bi-x-circle-fill" style="color:#ef4444;"></i> <span style="color:#ef4444;">Password tidak cocok</span>';
        btnSubmit.disabled = true;
    } else {
        matchMsg.innerHTML = '';
        btnSubmit.disabled = true;
    }
}

document.getElementById('oldPwd').addEventListener('input', checkMatch);

document.getElementById('formPassword').addEventListener('submit', function() {
    btnSubmit.disabled = true;
    document.getElementById('spinner').style.display = 'block';
    document.getElementById('btnIcon').style.display = 'none';
});

// ─────────────────────────────────
//  LOGOUT MODAL
// ─────────────────────────────────
function showLogoutModal() {
    document.getElementById('logoutModal').classList.add('show');
}

function closeLogoutModal() {
    document.getElementById('logoutModal').classList.remove('show');
}

function confirmLogout() {
    window.location.href = '<?= base_url('auth/logout') ?>';
}

document.getElementById('logoutModal').addEventListener('click', function(e) {
    if (e.target === this) closeLogoutModal();
});

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLogoutModal();
});

// ─────────────────────────────────
//  NAVBAR SCROLL EFFECT
// ─────────────────────────────────
window.addEventListener('scroll', () => {
    const nav = document.getElementById('navbar');
    if (window.scrollY > 10) {
        nav.style.boxShadow = '0 1px 40px rgba(37,99,235,0.14)';
    } else {
        nav.style.boxShadow = nav.style.boxShadow = '';
    }
});
</script>
</body>
</html>