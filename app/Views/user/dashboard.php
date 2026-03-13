<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppPortal - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="manifest" href="<?= base_url('manifest.json') ?>">
    <meta name="theme-color" content="#60a5fa">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

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
            --bg-input: rgba(255,255,255,0.9);
            --bg-input-focus: #ffffff;
            --bg-view-toggle: #ffffff;
            --bg-modal: #ffffff;

            --text-primary: #0d2247;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;

            --border-color: rgba(37,99,235,0.1);
            --border-input: var(--blue-200);
            --border-toggle: var(--blue-200);
            --border-card: rgba(37,99,235,0.08);

            --shadow-card: 0 4px 24px rgba(37,99,235,0.06);
            --shadow-navbar: 0 1px 32px rgba(37,99,235,0.08);
            --shadow-brand: 0 4px 14px rgba(37,99,235,0.4);

            --icon-blue-bg: linear-gradient(135deg, #dbeafe, #bfdbfe);
            --icon-blue-color: #1d4ed8;
            --icon-indigo-bg: linear-gradient(135deg, #e0e7ff, #c7d2fe);
            --icon-indigo-color: #4338ca;
            --icon-sky-bg: linear-gradient(135deg, #e0f2fe, #bae6fd);
            --icon-sky-color: #0284c7;
            --icon-cyan-bg: linear-gradient(135deg, #cffafe, #a5f3fc);
            --icon-cyan-color: #0891b2;
            --icon-violet-bg: linear-gradient(135deg, #ede9fe, #ddd6fe);
            --icon-violet-color: #7c3aed;
            --icon-teal-bg: linear-gradient(135deg, #ccfbf1, #99f6e4);
            --icon-teal-color: #0f766e;

            --tag-blue-bg: #dbeafe; --tag-blue-color: #1d4ed8;
            --tag-indigo-bg: #e0e7ff; --tag-indigo-color: #4338ca;
            --tag-sky-bg: #e0f2fe; --tag-sky-color: #0284c7;
            --tag-cyan-bg: #cffafe; --tag-cyan-color: #0891b2;
            --tag-violet-bg: #ede9fe; --tag-violet-color: #7c3aed;
            --tag-teal-bg: #ccfbf1; --tag-teal-color: #0f766e;

            --cancel-bg: #f1f5f9; --cancel-color: #64748b;
            --cancel-hover: #e2e8f0;
            --no-apps-icon-bg: linear-gradient(135deg, #dbeafe, #eff6ff);
            --empty-icon-bg: linear-gradient(135deg, #dbeafe, #eff6ff);

            --navbar-height: 68px;
            --bottom-nav-height: 64px;
        }

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
            --bg-navbar: rgba(10,16,35,0.92);
            --bg-input: rgba(17,24,39,0.9);
            --bg-input-focus: #111827;
            --bg-view-toggle: #111827;
            --bg-modal: #111827;

            --text-primary: #e2eaff;
            --text-secondary: #8fa3c8;
            --text-muted: #5a6e8f;

            --border-color: rgba(59,130,246,0.15);
            --border-input: rgba(59,130,246,0.3);
            --border-toggle: rgba(59,130,246,0.2);
            --border-card: rgba(59,130,246,0.12);

            --shadow-card: 0 4px 24px rgba(0,0,0,0.35);
            --shadow-navbar: 0 1px 32px rgba(0,0,0,0.4);
            --shadow-brand: 0 4px 14px rgba(37,99,235,0.5);

            --icon-blue-bg: linear-gradient(135deg, rgba(29,78,216,0.25), rgba(37,99,235,0.18));
            --icon-blue-color: #60a5fa;
            --icon-indigo-bg: linear-gradient(135deg, rgba(67,56,202,0.25), rgba(79,70,229,0.18));
            --icon-indigo-color: #a5b4fc;
            --icon-sky-bg: linear-gradient(135deg, rgba(2,132,199,0.25), rgba(14,165,233,0.18));
            --icon-sky-color: #7dd3fc;
            --icon-cyan-bg: linear-gradient(135deg, rgba(8,145,178,0.25), rgba(6,182,212,0.18));
            --icon-cyan-color: #67e8f9;
            --icon-violet-bg: linear-gradient(135deg, rgba(124,58,237,0.25), rgba(139,92,246,0.18));
            --icon-violet-color: #c4b5fd;
            --icon-teal-bg: linear-gradient(135deg, rgba(15,118,110,0.25), rgba(20,184,166,0.18));
            --icon-teal-color: #5eead4;

            --tag-blue-bg: rgba(29,78,216,0.2); --tag-blue-color: #93c5fd;
            --tag-indigo-bg: rgba(67,56,202,0.2); --tag-indigo-color: #a5b4fc;
            --tag-sky-bg: rgba(2,132,199,0.2); --tag-sky-color: #7dd3fc;
            --tag-cyan-bg: rgba(8,145,178,0.2); --tag-cyan-color: #67e8f9;
            --tag-violet-bg: rgba(124,58,237,0.2); --tag-violet-color: #c4b5fd;
            --tag-teal-bg: rgba(15,118,110,0.2); --tag-teal-color: #5eead4;

            --cancel-bg: #1e293b; --cancel-color: #94a3b8;
            --cancel-hover: #263246;
            --no-apps-icon-bg: linear-gradient(135deg, rgba(29,78,216,0.2), rgba(17,32,74,0.3));
            --empty-icon-bg: linear-gradient(135deg, rgba(29,78,216,0.2), rgba(17,32,74,0.3));
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
            position: fixed; inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 10% -10%, rgba(37,99,235,0.12) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(96,165,250,0.08) 0%, transparent 55%),
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

        /* ─── NAVBAR ─────────────────────────────────────── */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0;
            height: var(--navbar-height);
            background: var(--bg-navbar);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid var(--border-color);
            display: flex; align-items: center;
            padding: 0 36px;
            z-index: 1000;
            box-shadow: var(--shadow-navbar);
            transition: background .3s, box-shadow .3s;
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
            font-family: 'Sora', sans-serif;
            font-weight: 700; font-size: .95rem; color: white;
            box-shadow: var(--shadow-brand);
            flex-shrink: 0;
        }

        .nav-brand-name {
            font-family: 'Sora', sans-serif;
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

        /* Nav-right: install button area */
        .nav-right {
            position: absolute; right: 36px;
            display: flex; align-items: center;
        }

        /* ─── INSTALL BUTTON (Desktop Navbar) ────────────── */
        #installApp {
            display: none; /* shown via JS when PWA prompt fires */
            align-items: center; gap: 7px;
            padding: 9px 18px;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
            color: white;
            border: none; border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: .875rem; font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(37,99,235,0.35);
            transition: background .2s, box-shadow .2s, transform .2s, opacity .3s;
            white-space: nowrap;
            animation: installFadeIn .4s ease forwards;
        }

        #installApp:hover {
            background: linear-gradient(135deg, var(--blue-700), var(--blue-600));
            box-shadow: 0 6px 20px rgba(37,99,235,0.5);
            transform: translateY(-2px);
        }

        #installApp:active { transform: translateY(0); }

        #installApp i { font-size: .9rem; }

        @keyframes installFadeIn {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        body.dark-mode #installApp {
            background: linear-gradient(135deg, var(--blue-500), var(--blue-400));
            color: #0a1628;
            box-shadow: 0 4px 14px rgba(96,165,250,0.35);
        }

        body.dark-mode #installApp:hover {
            box-shadow: 0 6px 20px rgba(96,165,250,0.5);
        }

        /* ─── BOTTOM NAV ──────────────────────────────────── */
        .bottom-nav {
            display: none;
            position: fixed; bottom: 0; left: 0; right: 0;
            height: var(--bottom-nav-height);
            background: var(--bg-navbar);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-top: 1px solid var(--border-color);
            z-index: 1000;
            box-shadow: 0 -4px 20px rgba(37,99,235,0.08);
        }

        .bottom-nav-inner {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: space-around;
        }

        .bottom-nav-item {
            display: flex; flex-direction: column;
            align-items: center; gap: 3px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: .68rem; font-weight: 600;
            padding: 6px 16px; border-radius: 12px;
            transition: all .2s;
            min-width: 64px;
            background: none; border: none; cursor: pointer;
            font-family: 'DM Sans', sans-serif;
        }

        .bottom-nav-item i { font-size: 1.25rem; }

        .bottom-nav-item.active {
            color: var(--blue-600);
            background: linear-gradient(135deg, var(--blue-100), var(--blue-50));
        }

        body.dark-mode .bottom-nav-item.active {
            color: var(--blue-400);
            background: rgba(59,130,246,0.15);
        }

        /* ─── Install item in bottom nav ─────────────────── */
        #installAppMobile {
            display: none; /* shown via JS */
            flex-direction: column;
            align-items: center; gap: 3px;
            color: white;
            font-size: .68rem; font-weight: 700;
            padding: 6px 14px;
            border-radius: 12px;
            border: none; cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
            box-shadow: 0 4px 14px rgba(37,99,235,0.35);
            min-width: 64px;
            transition: all .2s;
            animation: installFadeIn .4s ease forwards;
        }

        #installAppMobile i { font-size: 1.25rem; }

        #installAppMobile:active {
            transform: scale(0.94);
        }

        body.dark-mode #installAppMobile {
            background: linear-gradient(135deg, var(--blue-500), var(--blue-400));
            color: #0a1628;
            box-shadow: 0 4px 14px rgba(96,165,250,0.35);
        }

        /* ─── MAIN ────────────────────────────────────────── */
        .main {
            padding-top: calc(var(--navbar-height) + 32px);
            padding-bottom: 60px;
            max-width: 1360px;
            margin: 0 auto;
            padding-left: 36px;
            padding-right: 36px;
        }

        /* ─── HERO ────────────────────────────────────────── */
        .hero {
            background: linear-gradient(135deg, var(--navy) 0%, #1a3a6e 50%, #1e4db7 100%);
            border-radius: 28px;
            padding: 36px 48px;
            margin-bottom: 36px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(13,34,71,0.28), 0 4px 20px rgba(37,99,235,0.2);
        }

        body.dark-mode .hero {
            background: linear-gradient(135deg, #050c1c 0%, #0d1e40 50%, #142565 100%);
            box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 4px 20px rgba(37,99,235,0.2);
        }

        .hero-orb {
            position: absolute; border-radius: 50%;
            filter: blur(80px); pointer-events: none;
        }

        .hero-orb-1 {
            width: 400px; height: 400px;
            background: rgba(59,130,246,0.35);
            top: -150px; right: -80px;
            animation: orbFloat 9s ease-in-out infinite;
        }

        .hero-orb-2 {
            width: 280px; height: 280px;
            background: rgba(96,165,250,0.25);
            bottom: -120px; right: 180px;
            animation: orbFloat 12s ease-in-out infinite reverse;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0,0) scale(1); }
            33%       { transform: translate(30px,-20px) scale(1.05); }
            66%       { transform: translate(-20px,15px) scale(0.97); }
        }

        .hero::after {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 30px 30px;
            pointer-events: none;
        }

        .hero-inner {
            position: relative; z-index: 2;
            display: flex; align-items: center;
            justify-content: space-between;
            gap: 32px;
        }

        .hero-left { flex: 1; }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            color: #bfdbfe;
            font-size: .8rem; font-weight: 500;
            padding: 5px 14px; border-radius: 100px;
            margin-bottom: 16px;
            backdrop-filter: blur(8px);
        }

        .badge-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: #93c5fd;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .4; transform: scale(0.8); }
        }

        .hero h1 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem; font-weight: 700;
            color: white; line-height: 1.2;
            margin-bottom: 10px; letter-spacing: -0.5px;
        }

        .hero p {
            color: rgba(255,255,255,0.65);
            font-size: .95rem; font-weight: 400;
        }

        .hero-quote-box {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 22px 24px;
            display: flex; flex-direction: column;
            gap: 14px;
            min-width: 260px; max-width: 300px;
            flex-shrink: 0;
        }

        .quote-header { display: flex; align-items: center; gap: 9px; }

        .quote-icon {
            width: 30px; height: 30px; border-radius: 8px;
            background: rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            font-size: .9rem; color: #bfdbfe;
            flex-shrink: 0;
        }

        .quote-label {
            font-size: .71rem; font-weight: 600;
            color: rgba(255,255,255,0.5);
            text-transform: uppercase; letter-spacing: 0.8px;
        }

        .quote-text {
            font-family: 'Sora', sans-serif;
            font-size: .87rem; font-weight: 500;
            color: rgba(255,255,255,0.92);
            line-height: 1.65;
            font-style: italic;
            animation: quoteFade .6s ease;
            min-height: 58px;
        }

        @keyframes quoteFade {
            from { opacity: 0; transform: translateY(6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .quote-dots { display: flex; gap: 5px; align-items: center; }

        .quote-dot {
            width: 5px; height: 5px; border-radius: 50%;
            background: rgba(255,255,255,0.22);
            transition: all .35s; cursor: pointer;
        }

        .quote-dot.active {
            background: rgba(255,255,255,0.8);
            width: 14px; border-radius: 3px;
        }

        .quote-divider { width: 100%; height: 1px; background: rgba(255,255,255,0.12); }

        .quote-footer { display: flex; align-items: flex-end; justify-content: space-between; }

        .quote-apps-num {
            font-family: 'Sora', sans-serif;
            font-size: 1.5rem; font-weight: 700; color: white; line-height: 1;
        }

        .quote-apps-label { font-size: .71rem; color: rgba(255,255,255,0.48); margin-top: 3px; }

        .quote-counter { text-align: right; }

        .quote-counter-top { font-size: .68rem; color: rgba(255,255,255,0.38); margin-bottom: 2px; }

        .quote-counter-num {
            font-family: 'Sora', sans-serif;
            font-size: .95rem; font-weight: 700;
            color: rgba(255,255,255,0.65);
        }

        /* ─── TOOLBAR ─────────────────────────────────────── */
        .toolbar {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 28px; gap: 16px; flex-wrap: wrap;
        }

        .toolbar-left h2 {
            font-family: 'Sora', sans-serif;
            font-size: 1.3rem; font-weight: 700;
            color: var(--text-primary); letter-spacing: -0.3px;
            transition: color .3s;
        }

        .toolbar-left p { font-size: .85rem; color: var(--text-muted); margin-top: 3px; transition: color .3s; }

        .search-wrap { position: relative; flex: 1; max-width: 380px; }

        .search-wrap input {
            width: 100%;
            padding: 11px 18px 11px 44px;
            border: 1.5px solid var(--border-input);
            border-radius: 12px;
            font-size: .9rem; font-weight: 500;
            color: var(--text-primary);
            background: var(--bg-input);
            backdrop-filter: blur(10px);
            transition: all .25s;
            font-family: 'DM Sans', sans-serif;
        }

        .search-wrap input:focus {
            outline: none;
            border-color: var(--blue-500);
            box-shadow: 0 0 0 4px rgba(59,130,246,0.12);
            background: var(--bg-input-focus);
        }

        .search-wrap input::placeholder { color: var(--text-muted); }

        .search-wrap i {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted); font-size: 1rem;
            pointer-events: none; transition: color .2s;
        }

        .search-wrap:focus-within i { color: var(--blue-500); }

        /* View toggle */
        .view-toggle {
            display: flex;
            background: var(--bg-view-toggle);
            border: 1.5px solid var(--border-toggle);
            border-radius: 10px; overflow: hidden;
            transition: background .3s, border-color .3s;
        }

        .view-toggle button {
            border: none; background: none;
            width: 38px; height: 38px;
            color: var(--text-muted); cursor: pointer;
            transition: all .2s;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
        }

        .view-toggle button.active,
        .view-toggle button:hover { background: var(--blue-600); color: white; }

        /* ─── APP CARDS ───────────────────────────────────── */
        .apps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px; transition: all .3s;
        }

        .apps-grid.list-view { grid-template-columns: 1fr; gap: 12px; }

        .app-card-wrap {
            opacity: 0; transform: translateY(20px);
            animation: cardIn .45s ease forwards;
        }

        @keyframes cardIn { to { opacity: 1; transform: translateY(0); } }

        .app-card-wrap:nth-child(1)  { animation-delay: 0.04s; }
        .app-card-wrap:nth-child(2)  { animation-delay: 0.08s; }
        .app-card-wrap:nth-child(3)  { animation-delay: 0.12s; }
        .app-card-wrap:nth-child(4)  { animation-delay: 0.16s; }
        .app-card-wrap:nth-child(5)  { animation-delay: 0.20s; }
        .app-card-wrap:nth-child(6)  { animation-delay: 0.24s; }
        .app-card-wrap:nth-child(7)  { animation-delay: 0.28s; }
        .app-card-wrap:nth-child(8)  { animation-delay: 0.32s; }
        .app-card-wrap:nth-child(9)  { animation-delay: 0.36s; }
        .app-card-wrap:nth-child(10) { animation-delay: 0.40s; }
        .app-card-wrap:nth-child(11) { animation-delay: 0.44s; }
        .app-card-wrap:nth-child(12) { animation-delay: 0.48s; }

        .app-card {
            background: var(--bg-card);
            border-radius: 20px; padding: 28px 24px;
            border: 1.5px solid var(--border-card);
            box-shadow: var(--shadow-card);
            transition: transform .3s cubic-bezier(0.34,1.56,0.64,1), box-shadow .3s, border-color .3s, background .3s;
            cursor: pointer; position: relative; overflow: hidden;
            display: flex; flex-direction: column; align-items: flex-start;
            height: 100%;
        }

        .app-card::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, transparent 60%, rgba(59,130,246,0.04));
            opacity: 0; transition: opacity .3s;
        }

        .app-card:hover::before { opacity: 1; }

        .app-card:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 0 20px 48px rgba(37,99,235,0.14), 0 4px 16px rgba(37,99,235,0.08);
            border-color: rgba(37,99,235,0.22);
        }

        body.dark-mode .app-card:hover {
            box-shadow: 0 20px 48px rgba(0,0,0,0.4), 0 4px 16px rgba(37,99,235,0.15);
        }

        .card-top-accent {
            position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--blue-600), var(--blue-400));
            transform: scaleX(0); transform-origin: left;
            transition: transform .35s cubic-bezier(0.4,0,0.2,1);
        }

        .app-card:hover .card-top-accent { transform: scaleX(1); }

        .app-icon-wrap {
            width: 60px; height: 60px; border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; margin-bottom: 18px;
            transition: transform .3s; flex-shrink: 0;
        }

        .app-card:hover .app-icon-wrap { transform: scale(1.08) rotate(3deg); }

        .app-card-name {
            font-family: 'Sora', sans-serif;
            font-size: 1.05rem; font-weight: 600;
            color: var(--text-primary); margin-bottom: 8px;
            line-height: 1.3; transition: color .3s;
        }

        .app-card-desc { font-size: .82rem; color: var(--text-muted); flex: 1; margin-bottom: 20px; transition: color .3s; }

        .app-card-footer { display: flex; align-items: center; justify-content: space-between; width: 100%; }

        .app-card-tag {
            font-size: .75rem; font-weight: 600;
            padding: 4px 10px; border-radius: 6px;
        }

        .btn-launch {
            display: flex; align-items: center; gap: 6px;
            padding: 9px 18px;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
            color: white; border: none; border-radius: 10px;
            font-size: .85rem; font-weight: 600; cursor: pointer;
            transition: all .25s; font-family: 'DM Sans', sans-serif;
            box-shadow: 0 4px 12px rgba(37,99,235,0.3);
            white-space: nowrap; position: relative; overflow: hidden;
        }

        .btn-launch:hover {
            background: linear-gradient(135deg, var(--blue-700), var(--blue-600));
            box-shadow: 0 6px 20px rgba(37,99,235,0.45);
            transform: translateY(-2px);
        }

        .btn-launch i { font-size: .8rem; transition: transform .2s; }
        .btn-launch:hover i { transform: translate(2px,-2px); }

        .apps-grid.list-view .app-card {
            flex-direction: row; align-items: center;
            padding: 18px 24px; border-radius: 16px; gap: 18px;
        }

        .apps-grid.list-view .app-card:hover { transform: translateX(6px); }
        .apps-grid.list-view .app-icon-wrap { margin-bottom: 0; width: 50px; height: 50px; font-size: 1.4rem; }
        .apps-grid.list-view .app-card:hover .app-icon-wrap { transform: scale(1.05) rotate(0deg); }
        .apps-grid.list-view .app-card-info { flex: 1; min-width: 0; }
        .apps-grid.list-view .app-card-name { margin-bottom: 3px; }
        .apps-grid.list-view .app-card-desc { margin-bottom: 0; flex: none; }
        .apps-grid.list-view .app-card-footer { width: auto; gap: 12px; }

        .icon-blue   { background: var(--icon-blue-bg);   color: var(--icon-blue-color); }
        .icon-indigo { background: var(--icon-indigo-bg); color: var(--icon-indigo-color); }
        .icon-sky    { background: var(--icon-sky-bg);    color: var(--icon-sky-color); }
        .icon-cyan   { background: var(--icon-cyan-bg);   color: var(--icon-cyan-color); }
        .icon-violet { background: var(--icon-violet-bg); color: var(--icon-violet-color); }
        .icon-teal   { background: var(--icon-teal-bg);   color: var(--icon-teal-color); }

        .tag-blue   { background: var(--tag-blue-bg);   color: var(--tag-blue-color); }
        .tag-indigo { background: var(--tag-indigo-bg); color: var(--tag-indigo-color); }
        .tag-sky    { background: var(--tag-sky-bg);    color: var(--tag-sky-color); }
        .tag-cyan   { background: var(--tag-cyan-bg);   color: var(--tag-cyan-color); }
        .tag-violet { background: var(--tag-violet-bg); color: var(--tag-violet-color); }
        .tag-teal   { background: var(--tag-teal-bg);   color: var(--tag-teal-color); }

        .empty-state { text-align: center; padding: 80px 20px; display: none; }
        .empty-state.show { display: block; }

        .empty-icon {
            width: 80px; height: 80px;
            background: var(--empty-icon-bg); border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; color: var(--blue-400);
            margin: 0 auto 20px; transition: background .3s;
        }

        .empty-state h3 { font-family: 'Sora', sans-serif; color: var(--text-primary); font-size: 1.2rem; margin-bottom: 8px; transition: color .3s; }
        .empty-state p  { color: var(--text-muted); font-size: .9rem; transition: color .3s; }

        .no-apps { text-align: center; padding: 100px 20px; }

        .no-apps .icon {
            width: 100px; height: 100px;
            background: var(--no-apps-icon-bg); border-radius: 28px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.5rem; color: var(--blue-400);
            margin: 0 auto 24px;
            box-shadow: 0 8px 24px rgba(37,99,235,0.1); transition: background .3s;
        }

        .no-apps h3 { font-family: 'Sora', sans-serif; color: var(--text-primary); font-size: 1.3rem; margin-bottom: 10px; transition: color .3s; }
        .no-apps p  { color: var(--text-muted); transition: color .3s; }

        .modal-overlay {
            position: fixed; inset: 0;
            background: rgba(5,10,25,0.65); backdrop-filter: blur(10px);
            z-index: 2000; display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none; transition: opacity .3s;
        }

        .modal-overlay.show { opacity: 1; pointer-events: all; }

        .modal-box {
            background: var(--bg-modal); border-radius: 24px; padding: 40px 36px;
            max-width: 420px; width: 90%; text-align: center;
            box-shadow: 0 32px 80px rgba(5,10,25,0.35);
            transform: scale(.9) translateY(20px);
            transition: transform .3s cubic-bezier(0.34,1.56,0.64,1), background .3s;
            border: 1px solid var(--border-color);
        }

        .modal-overlay.show .modal-box { transform: scale(1) translateY(0); }

        .modal-icon {
            width: 70px; height: 70px;
            background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; color: #ef4444; margin: 0 auto 22px;
        }

        body.dark-mode .modal-icon { background: rgba(239,68,68,0.15); }

        .modal-box h3 { font-family: 'Sora', sans-serif; font-size: 1.3rem; color: var(--text-primary); margin-bottom: 10px; transition: color .3s; }
        .modal-box p  { font-size: .9rem; color: var(--text-muted); margin-bottom: 28px; transition: color .3s; }

        .modal-btns { display: flex; gap: 12px; }

        .modal-btns button {
            flex: 1; padding: 13px; border: none; border-radius: 12px;
            font-size: .9rem; font-weight: 600; cursor: pointer;
            transition: all .2s; font-family: 'DM Sans', sans-serif;
        }

        .btn-cancel { background: var(--cancel-bg); color: var(--cancel-color); }
        .btn-cancel:hover { background: var(--cancel-hover); }

        .btn-confirm {
            background: linear-gradient(135deg, #ef4444, #f87171); color: white;
            box-shadow: 0 4px 12px rgba(239,68,68,0.3);
        }

        .btn-confirm:hover { box-shadow: 0 6px 20px rgba(239,68,68,0.45); transform: translateY(-1px); }

        @keyframes ripple { to { transform: scale(4); opacity: 0; } }

        .ripple-effect {
            position: absolute; border-radius: 50%;
            background: rgba(255,255,255,0.35); transform: scale(0);
            animation: ripple .6s linear; pointer-events: none;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--blue-300); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--blue-400); }

        /* ─── RESPONSIVE ──────────────────────────────────── */
        @media (max-width: 900px) {
            .main { padding-left: 24px; padding-right: 24px; }
            .navbar { padding: 0 24px; }
            .nav-brand { left: 24px; }
            .nav-right { right: 24px; }
            .hero { padding: 28px 28px; }
            .hero h1 { font-size: 1.6rem; }
            .hero-quote-box { min-width: 220px; max-width: 260px; padding: 18px 20px; }
        }

        @media (max-width: 768px) {
            :root { --navbar-height: 60px; }

            .nav-links { display: none; }
            .nav-right  { display: none; } /* install button moves to bottom nav on mobile */

            .navbar { padding: 0 16px; }
            .nav-brand { left: 16px; }

            .bottom-nav { display: block; }

            .main {
                padding-top: calc(var(--navbar-height) + 20px);
                padding-bottom: calc(var(--bottom-nav-height) + 20px);
                padding-left: 16px;
                padding-right: 16px;
            }

            .hero {
                padding: 24px 20px;
                border-radius: 20px;
                margin-bottom: 20px;
            }

            .hero-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .hero h1 { font-size: 1.4rem; }
            .hero p  { font-size: .88rem; }

            .hero-badge { font-size: .75rem; padding: 4px 12px; margin-bottom: 12px; }

            .hero-quote-box {
                width: 100%; max-width: 100%;
                min-width: unset;
                padding: 16px 18px;
                gap: 10px;
            }

            .quote-text { font-size: .83rem; min-height: 48px; }

            .toolbar {
                display: grid;
                grid-template-columns: 1fr;
                grid-template-areas:
                    "title"
                    "search";
                gap: 12px;
                margin-bottom: 16px;
            }

            .toolbar-left { grid-area: title; }
            .search-wrap  { grid-area: search; max-width: 100%; flex: 1 1 100%; }

            .view-toggle { display: none; }

            .apps-grid {
                grid-template-columns: 1fr !important;
                gap: 10px;
            }

            .app-card {
                flex-direction: row !important;
                align-items: center !important;
                padding: 12px 12px !important;
                border-radius: 16px;
                gap: 10px;
                min-width: 0;
                overflow: hidden !important;
            }

            .app-icon-wrap {
                margin-bottom: 0 !important;
                width: 46px !important;
                height: 46px !important;
                font-size: 1.25rem !important;
                flex-shrink: 0 !important;
                border-radius: 12px !important;
            }

            .app-card > .app-card-name,
            .app-card > .app-card-desc { display: none; }

            .app-card-info-mobile-wrap {
                flex: 1 1 0;
                min-width: 0;
                display: flex;
                flex-direction: column;
                overflow: hidden;
            }

            .app-card-info-mobile-wrap .app-card-name {
                display: block !important;
                font-size: .88rem !important;
                margin-bottom: 2px !important;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .app-card-info-mobile-wrap .app-card-desc {
                display: block !important;
                font-size: .75rem !important;
                margin-bottom: 0 !important;
                flex: none !important;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .app-card-footer {
                width: auto !important;
                flex-shrink: 0 !important;
                gap: 8px;
            }

            .app-card-tag { display: none !important; }

            .btn-launch {
                padding: 7px 12px !important;
                font-size: .78rem !important;
                gap: 4px;
                white-space: nowrap;
                flex-shrink: 0;
            }

            .app-card:hover {
                transform: none !important;
                box-shadow: var(--shadow-card) !important;
                border-color: var(--border-card) !important;
            }

            .app-card:active { transform: scale(0.98) !important; }
            .app-card:hover .app-icon-wrap { transform: none !important; }
            .card-top-accent { display: none; }

            .toolbar-left h2 { font-size: 1.15rem; }
            .toolbar-left p  { font-size: .8rem; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="mainNavbar">
    <a href="<?= base_url('user/dashboard') ?>" class="nav-brand">
        <div class="nav-brand-logo">AP</div>
        <span class="nav-brand-name"><span>App</span>Portal</span>
    </a>

    <div class="nav-links">
        <a href="<?= base_url('user/dashboard') ?>" class="active">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?= base_url('user/profile') ?>">
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
        <a href="<?= base_url('user/info') ?>">
            <i class="bi bi-info-circle-fill"></i>
            <span>Info</span>
        </a>
    </div>

    <!-- Install button desktop (kanan navbar) -->
    <div class="nav-right">
        <button id="installApp">
            <i class="bi bi-download"></i>
            Install App
        </button>
    </div>
</nav>

<!-- BOTTOM NAV -->
<nav class="bottom-nav">
    <div class="bottom-nav-inner">
        <a href="<?= base_url('user/dashboard') ?>" class="bottom-nav-item active">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?= base_url('user/profile') ?>" class="bottom-nav-item">
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
        <a href="<?= base_url('user/info') ?>" class="bottom-nav-item">
            <i class="bi bi-info-circle-fill"></i>
            <span>Info</span>
        </a>
        <!-- Install button mobile (bottom nav) -->
        <button id="installAppMobile">
            <i class="bi bi-download"></i>
            <span>Install</span>
        </button>
    </div>
</nav>

<div class="main">

    <!-- HERO -->
    <div class="hero">
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>

        <div class="hero-inner">
            <div class="hero-left">
                <div class="hero-badge">
                    <div class="badge-dot"></div>
                    Portal Aktif
                </div>
                <h1>Selamat Datang, <?= esc(session('nama_user')) ?></h1>
                <p>Pilih aplikasi yang ingin kamu akses hari ini. Semua dalam satu tempat.</p>
            </div>

            <div class="hero-quote-box">
                <div class="quote-header">
                    <div class="quote-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <div class="quote-label">Produktivitas Hari Ini</div>
                </div>

                <div class="quote-text" id="quoteText">Memuat...</div>
                <div class="quote-dots" id="quoteDots"></div>
                <div class="quote-divider"></div>

                <div class="quote-footer">
                    <div>
                        <div class="quote-apps-num" id="totalApps">0</div>
                        <div class="quote-apps-label">Total Aplikasi</div>
                    </div>
                    <div class="quote-counter">
                        <div class="quote-counter-top">Quote ke</div>
                        <div class="quote-counter-num" id="quoteNum">–</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($apps)): ?>

    <!-- TOOLBAR -->
    <div class="toolbar">
        <div class="toolbar-left">
            <h2>Aplikasi Kamu</h2>
            <p id="appCount">Menampilkan <?= count($apps) ?> aplikasi</p>
        </div>
        <div class="search-wrap">
            <input type="text" id="searchApps" placeholder="Cari aplikasi...">
            <i class="bi bi-search"></i>
        </div>
        <div class="view-toggle">
            <button class="active" id="btnGrid" onclick="setView('grid')" title="Grid View">
                <i class="bi bi-grid-3x3-gap-fill"></i>
            </button>
            <button id="btnList" onclick="setView('list')" title="List View">
                <i class="bi bi-list-ul"></i>
            </button>
        </div>
    </div>

    <!-- APPS GRID -->
    <?php
    $iconSets = [
        ['icon' => 'bi-window-stack',          'wrap' => 'icon-blue',   'tag' => 'tag-blue',   'label' => 'Web App'],
        ['icon' => 'bi-file-earmark-bar-graph', 'wrap' => 'icon-sky',    'tag' => 'tag-sky',    'label' => 'Reports'],
        ['icon' => 'bi-bar-chart-line-fill',    'wrap' => 'icon-indigo', 'tag' => 'tag-indigo', 'label' => 'Analytics'],
        ['icon' => 'bi-gear-wide-connected',    'wrap' => 'icon-cyan',   'tag' => 'tag-cyan',   'label' => 'System'],
        ['icon' => 'bi-database-fill',          'wrap' => 'icon-violet', 'tag' => 'tag-violet', 'label' => 'Data'],
        ['icon' => 'bi-shield-fill-check',      'wrap' => 'icon-teal',   'tag' => 'tag-teal',   'label' => 'Security'],
    ];
    ?>

    <div class="apps-grid" id="appsGrid">
        <?php foreach ($apps as $idx => $app):
            $set = $iconSets[$idx % count($iconSets)];
        ?>
        <div class="app-card-wrap" data-name="<?= strtolower(esc((string)$app['nama'])) ?>">
            <div class="app-card" onclick="openApp('<?= base64_encode($app['url_app']) ?>', event)">
                <div class="card-top-accent"></div>
                <div class="app-icon-wrap <?= $set['wrap'] ?>">
                    <i class="bi <?= $set['icon'] ?>"></i>
                </div>
                <div class="app-card-name"><?= esc((string)$app['nama']) ?></div>
                <div class="app-card-desc">Klik untuk membuka aplikasi ini</div>
                <div class="app-card-footer">
                    <span class="app-card-tag <?= $set['tag'] ?>"><?= $set['label'] ?></span>
                    <button class="btn-launch" onclick="openApp('<?= base64_encode($app['url_app']) ?>', event)">
                        Buka <i class="bi bi-arrow-up-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="empty-state" id="emptyState">
        <div class="empty-icon"><i class="bi bi-search"></i></div>
        <h3>Tidak ditemukan</h3>
        <p>Tidak ada aplikasi yang cocok dengan pencarian kamu.</p>
    </div>

    <?php else: ?>

    <div class="no-apps">
        <div class="icon"><i class="bi bi-inbox-fill"></i></div>
        <h3>Belum Ada Aplikasi</h3>
        <p>Kamu belum memiliki akses ke aplikasi manapun saat ini.</p>
    </div>

    <?php endif; ?>

</div>

<script>

function applyTheme(theme) {
    document.body.classList.toggle('dark-mode', theme === 'dark');
}

(function() {
    applyTheme(localStorage.getItem('portal_theme') || 'light');
})();

window.addEventListener('storage', function(e) {
    if (e.key === 'portal_theme') applyTheme(e.newValue || 'light');
});

const QUOTES = [
    "Selesaikan satu hal dengan baik, lalu lanjut ke berikutnya.",
    "Energimu terbatas, gunakan untuk hal yang benar-benar penting.",
    "Rencana tanpa aksi hanya mimpi. Aksi tanpa rencana hanya kebetulan.",
    "Disiplin kecil setiap hari menghasilkan perubahan besar.",
    "Kamu tidak harus hebat untuk memulai, tapi harus memulai untuk jadi hebat.",
    "Tugas besar dimulai dari langkah pertama yang sederhana.",
    "Fokus pada apa yang bisa dikontrol, lepaskan sisanya.",
    "Satu jam kerja fokus lebih berharga dari tiga jam kerja setengah hati.",
    "Jangan tunda apa yang bisa diselesaikan hari ini.",
    "Kualitas hasil ditentukan oleh kualitas usaha yang kamu berikan.",
    "Produktivitas bukan soal sibuk, tapi soal tepat sasaran.",
    "Setiap tugas selesai adalah bukti bahwa kamu mampu.",
    "Mulai dari yang paling sulit, sisanya akan terasa lebih ringan.",
    "Progres nyata dimulai dari komitmen, bukan motivasi semata.",
];

const DOT_COUNT = 5;

function getDayOfYear() {
    const now = new Date();
    const start = new Date(now.getFullYear(), 0, 0);
    return Math.floor((now - start) / 86400000);
}

let currentIdx = getDayOfYear() % QUOTES.length;
let rotateTimer = null;

function renderQuote(idx, animate) {
    const el    = document.getElementById('quoteText');
    const numEl = document.getElementById('quoteNum');
    if (!el) return;
    if (animate) { el.style.animation = 'none'; void el.offsetHeight; el.style.animation = ''; }
    el.textContent = '\u201C' + QUOTES[idx] + '\u201D';
    if (numEl) numEl.textContent = (idx + 1) + ' / ' + QUOTES.length;
    renderDots(idx);
}

function renderDots(activeIdx) {
    const container = document.getElementById('quoteDots');
    if (!container) return;
    container.innerHTML = '';
    for (let i = 0; i < DOT_COUNT; i++) {
        const d = document.createElement('div');
        d.className = 'quote-dot' + (i === activeIdx % DOT_COUNT ? ' active' : '');
        d.addEventListener('click', () => jumpToQuote((Math.floor(activeIdx / DOT_COUNT) * DOT_COUNT + i) % QUOTES.length));
        container.appendChild(d);
    }
}

function jumpToQuote(idx) { currentIdx = idx; renderQuote(currentIdx, true); resetRotation(); }

function resetRotation() {
    clearInterval(rotateTimer);
    rotateTimer = setInterval(() => { currentIdx = (currentIdx + 1) % QUOTES.length; renderQuote(currentIdx, true); }, 8000);
}

function isMobile() { return window.innerWidth <= 768; }

document.addEventListener('DOMContentLoaded', () => {
    renderQuote(currentIdx, false);
    resetRotation();
    const cards = document.querySelectorAll('.app-card-wrap');
    animateNumber('totalApps', cards.length);
    const countEl = document.getElementById('appCount');
    if (countEl) countEl.textContent = `Menampilkan ${cards.length} aplikasi`;

    if (isMobile()) {
        wrapMobileCardContent();
    } else {
        const savedView = localStorage.getItem('portal_view') || 'grid';
        if (savedView === 'list') setView('list', true);
    }
});

function wrapMobileCardContent() {
    document.querySelectorAll('.app-card').forEach(card => {
        if (card.querySelector('.app-card-info-mobile-wrap')) return;
        const name = card.querySelector('.app-card-name');
        const desc = card.querySelector('.app-card-desc');
        if (!name || !desc) return;
        const wrap = document.createElement('div');
        wrap.className = 'app-card-info-mobile-wrap';
        card.insertBefore(wrap, name);
        wrap.appendChild(name);
        wrap.appendChild(desc);
    });
}

window.addEventListener('resize', () => {
    if (isMobile()) { wrapMobileCardContent(); }
});

function animateNumber(id, target) {
    const el = document.getElementById(id);
    if (!el || target === 0) { if (el) el.textContent = 0; return; }
    let current = 0;
    const step = Math.max(1, Math.floor(target / 20));
    const t = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = current;
        if (current >= target) clearInterval(t);
    }, 40);
}

function openApp(encoded, event) {
    if (event) {
        event.stopPropagation();
        const btn  = event.currentTarget;
        const r    = document.createElement('span');
        r.className = 'ripple-effect';
        const rect = btn.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        r.style.cssText = `width:${size}px;height:${size}px;left:${event.clientX - rect.left - size/2}px;top:${event.clientY - rect.top - size/2}px;`;
        btn.appendChild(r);
        setTimeout(() => r.remove(), 700);
    }
    try { window.open(atob(encoded), '_blank'); }
    catch(e) { console.error('URL tidak valid'); }
}

const searchInput = document.getElementById('searchApps');
const emptyState  = document.getElementById('emptyState');
const appCountEl  = document.getElementById('appCount');

if (searchInput) {
    searchInput.addEventListener('input', function () {
        const q = this.value.toLowerCase().trim();
        const allCards = document.querySelectorAll('.app-card-wrap');
        let visible = 0;
        allCards.forEach(card => {
            const match = (card.getAttribute('data-name') || '').includes(q);
            card.style.display = match ? '' : 'none';
            if (match) visible++;
        });
        if (emptyState) emptyState.classList.toggle('show', visible === 0 && q !== '');
        if (appCountEl) appCountEl.textContent = q
            ? `Menampilkan ${visible} dari ${allCards.length} aplikasi`
            : `Menampilkan ${allCards.length} aplikasi`;
    });
}

function setView(v, silent) {
    if (isMobile()) return;
    if (!silent) localStorage.setItem('portal_view', v);
    const grid = document.getElementById('appsGrid');
    const btnG = document.getElementById('btnGrid');
    const btnL = document.getElementById('btnList');
    if (!grid) return;

    if (v === 'list') {
        grid.classList.add('list-view');
        grid.querySelectorAll('.app-card').forEach(card => {
            if (!card.querySelector('.app-card-info-wrap')) {
                const wrap = document.createElement('div');
                wrap.className = 'app-card-info-wrap';
                wrap.style.cssText = 'flex:1;min-width:0;';
                const name = card.querySelector('.app-card-name');
                const desc = card.querySelector('.app-card-desc');
                if (name && desc) {
                    name.parentNode.insertBefore(wrap, name);
                    wrap.appendChild(name);
                    wrap.appendChild(desc);
                }
            }
        });
        if (btnG) btnG.classList.remove('active');
        if (btnL) btnL.classList.add('active');
    } else {
        grid.classList.remove('list-view');
        grid.querySelectorAll('.app-card-info-wrap').forEach(wrap => {
            const parent = wrap.parentNode;
            while (wrap.firstChild) parent.insertBefore(wrap.firstChild, wrap);
            parent.removeChild(wrap);
        });
        if (btnG) btnG.classList.add('active');
        if (btnL) btnL.classList.remove('active');
    }
}

function showLogoutModal()  { document.getElementById('logoutModal').classList.add('show'); }
function closeLogoutModal() { document.getElementById('logoutModal').classList.remove('show'); }
function confirmLogout()    { window.location.href = '<?= base_url('auth/logout') ?>'; }

document.getElementById('logoutModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeLogoutModal();
});

document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLogoutModal(); });

window.addEventListener('scroll', () => {
    const nav = document.getElementById('mainNavbar');
    if (!nav) return;
    nav.style.boxShadow = window.scrollY > 10
        ? '0 1px 40px rgba(37,99,235,0.14)'
        : '0 1px 32px rgba(37,99,235,0.08)';
});
</script>

<!-- Service Worker -->
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register("<?= base_url('service-worker.js') ?>")
        .then(function() {
            console.log("Service Worker Registered");
        })
        .catch(function(error) {
            console.log("Service Worker Failed", error);
        });
    }
</script>

<!-- PWA Install Prompt -->
<script>
    let deferredPrompt;

    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;

        // Tampilkan tombol desktop (navbar)
        const btnDesktop = document.getElementById('installApp');
        btnDesktop.style.display = 'flex';

        // Tampilkan tombol mobile (bottom nav)
        const btnMobile = document.getElementById('installAppMobile');
        btnMobile.style.display = 'flex';
    });

    async function triggerInstall() {
        if (!deferredPrompt) return;
        deferredPrompt.prompt();
        const { outcome } = await deferredPrompt.userChoice;
        if (outcome === 'accepted') {
            console.log('User installed the app');
            // Sembunyikan kedua tombol setelah install
            document.getElementById('installApp').style.display = 'none';
            document.getElementById('installAppMobile').style.display = 'none';
        }
        deferredPrompt = null;
    }

    document.getElementById('installApp').addEventListener('click', triggerInstall);
    document.getElementById('installAppMobile').addEventListener('click', triggerInstall);

    // Sembunyikan tombol kalau sudah diinstall
    window.addEventListener('appinstalled', () => {
        document.getElementById('installApp').style.display = 'none';
        document.getElementById('installAppMobile').style.display = 'none';
        deferredPrompt = null;
        console.log('PWA was installed');
    });
</script>
</body>
</html>