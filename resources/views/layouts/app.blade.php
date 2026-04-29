<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ValleTech') — CMMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --bg-base: #080f1a;
            --bg-sidebar: #0a1525;
            --bg-card: #0f1e30;
            --bg-card-hover: #132338;
            --bg-input: #0d1a28;
            --border: rgba(255, 255, 255, 0.07);
            --border-bright: rgba(255, 255, 255, 0.14);
            --teal: #1db89a;
            --teal-dim: #157a68;
            --teal-glow: rgba(29, 184, 154, 0.18);
            --text-primary: #dce8f0;
            --text-muted: #6b8299;
            --text-faint: #3d5568;
            --danger: #e05c6b;
            --warning: #e0a03c;
            --success: #2ec987;
            --info: #3ab0db;
            --sidebar-w: 210px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Darker Grotesque', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
            font-size: 15px;
        }

        /* ── SIDEBAR ── */
        .vt-sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 200;
            overflow-y: auto;
        }

        .vt-sidebar-brand {
            padding: 22px 20px 18px;
            border-bottom: 1px solid var(--border);
        }

        .vt-sidebar-brand .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .vt-sidebar-brand .brand-icon {
            width: 34px;
            height: 34px;
            background: var(--teal);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #fff;
            font-weight: 900;
            flex-shrink: 0;
        }

        .vt-sidebar-brand .brand-name {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 2px;
            color: var(--text-primary);
            text-transform: uppercase;
            line-height: 1.1;
        }

        .vt-sidebar-brand .brand-sub {
            font-size: 9px;
            letter-spacing: 2px;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        .vt-nav {
            padding: 16px 0;
            flex: 1;
        }

        .vt-nav-section {
            padding: 8px 16px 4px;
            font-size: 9px;
            letter-spacing: 2px;
            color: var(--text-faint);
            text-transform: uppercase;
            font-weight: 700;
        }

        .vt-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 20px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border-left: 3px solid transparent;
            transition: all 0.18s ease;
        }

        .vt-nav a i {
            font-size: 15px;
            width: 18px;
            text-align: center;
        }

        .vt-nav a:hover {
            color: var(--text-primary);
            background: rgba(255, 255, 255, 0.04);
            border-left-color: var(--teal-dim);
        }

        .vt-nav a.active {
            color: var(--teal);
            background: var(--teal-glow);
            border-left-color: var(--teal);
        }

        .vt-sidebar-footer {
            padding: 14px 14px 18px;
            border-top: 1px solid var(--border);
        }

        .vt-new-service {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px;
            background: transparent;
            border: 1px solid var(--teal-dim);
            border-radius: 8px;
            color: var(--teal);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-decoration: none;
            transition: all 0.2s;
            width: 100%;
            text-align: center;
        }

        .vt-new-service:hover {
            background: var(--teal-glow);
            color: var(--teal);
        }

        /* ── MAIN CONTENT ── */
        .vt-main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ── TOPBAR ── */
        .vt-topbar {
            height: 56px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 28px;
            gap: 16px;
            background: var(--bg-base);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .vt-topbar-title {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--teal);
            flex: 1;
        }

        .vt-topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .vt-topbar-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 15px;
            background: transparent;
            border: 1px solid var(--border);
            transition: all 0.2s;
            cursor: pointer;
            text-decoration: none;
        }

        .vt-topbar-icon:hover {
            color: var(--teal);
            border-color: var(--teal-dim);
        }

        .vt-user-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 12px 4px 8px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--bg-card);
        }

        .vt-user-avatar {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            background: var(--teal-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
            color: #fff;
        }

        .vt-user-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .vt-user-role {
            font-size: 10px;
            color: var(--text-muted);
        }

        /* ── PAGE CONTENT ── */
        .vt-content {
            padding: 28px;
            flex: 1;
        }

        /* ── CARDS ── */
        .vt-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
        }

        .vt-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .vt-card-header .header-title {
            color: var(--text-primary);
            font-size: 14px;
            letter-spacing: 0;
            text-transform: none;
        }

        .vt-card-body {
            padding: 20px;
        }

        /* ── KPI CARDS ── */
        .vt-kpi {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 20px 22px;
            position: relative;
            overflow: hidden;
            transition: border-color 0.2s;
        }

        .vt-kpi:hover {
            border-color: var(--border-bright);
        }

        .vt-kpi-label {
            font-size: 10px;
            letter-spacing: 2px;
            color: var(--text-muted);
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .vt-kpi-value {
            font-size: 2.4rem;
            font-weight: 800;
            line-height: 1;
        }

        .vt-kpi-sub {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .vt-kpi-icon {
            position: absolute;
            right: 18px;
            top: 18px;
            font-size: 28px;
            opacity: 0.18;
        }

        .kpi-teal {
            color: var(--teal);
        }

        .kpi-teal .vt-kpi-icon {
            color: var(--teal);
        }

        .kpi-danger {
            color: var(--danger);
        }

        .kpi-danger .vt-kpi-icon {
            color: var(--danger);
        }

        .kpi-success {
            color: var(--success);
        }

        .kpi-success .vt-kpi-icon {
            color: var(--success);
        }

        .kpi-info {
            color: var(--info);
        }

        .kpi-info .vt-kpi-icon {
            color: var(--info);
        }

        /* ── TABLES ── */
        .vt-table {
            width: 100%;
            border-collapse: collapse;
        }

        .vt-table thead th {
            padding: 10px 16px;
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-faint);
            font-weight: 700;
            border-bottom: 1px solid var(--border);
            background: transparent;
        }

        .vt-table tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            color: var(--text-primary);
            vertical-align: middle;
        }

        .vt-table tbody tr:last-child td {
            border-bottom: none;
        }

        .vt-table tbody tr:hover td {
            background: rgba(255, 255, 255, 0.025);
        }

        /* ── BADGES ── */
        .vt-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .badge-success {
            background: rgba(46, 201, 135, 0.15);
            color: var(--success);
        }

        .badge-danger {
            background: rgba(224, 92, 107, 0.15);
            color: var(--danger);
        }

        .badge-warning {
            background: rgba(224, 160, 60, 0.15);
            color: var(--warning);
        }

        .badge-info {
            background: rgba(58, 176, 219, 0.15);
            color: var(--info);
        }

        .badge-muted {
            background: rgba(255, 255, 255, 0.07);
            color: var(--text-muted);
        }

        /* ── BUTTONS ── */
        .btn-vt {
            background: var(--teal);
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 7px;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-vt:hover {
            background: #17a086;
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-vt-outline {
            background: transparent;
            color: var(--teal);
            border: 1px solid var(--teal-dim);
            padding: 7px 16px;
            border-radius: 7px;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-vt-outline:hover {
            background: var(--teal-glow);
            color: var(--teal);
        }

        .btn-vt-danger {
            background: rgba(224, 92, 107, 0.15);
            color: var(--danger);
            border: 1px solid rgba(224, 92, 107, 0.25);
            padding: 7px 16px;
            border-radius: 7px;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-vt-danger:hover {
            background: rgba(224, 92, 107, 0.25);
            color: var(--danger);
        }

        .btn-vt-warning {
            background: rgba(224, 160, 60, 0.15);
            color: var(--warning);
            border: 1px solid rgba(224, 160, 60, 0.25);
            padding: 7px 16px;
            border-radius: 7px;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-vt-warning:hover {
            background: rgba(224, 160, 60, 0.25);
            color: var(--warning);
        }

        .btn-sm-vt {
            padding: 5px 12px;
            font-size: 11px;
        }

        /* ── FORMS ── */
        .vt-form-group {
            margin-bottom: 18px;
        }

        .vt-label {
            display: block;
            margin-bottom: 6px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .vt-input {
            width: 100%;
            padding: 10px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border-bright);
            border-radius: 7px;
            color: var(--text-primary);
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .vt-input:focus {
            border-color: var(--teal-dim);
            box-shadow: 0 0 0 3px var(--teal-glow);
        }

        .vt-input::placeholder {
            color: var(--text-faint);
        }

        .vt-select {
            appearance: none;
            cursor: pointer;
        }

        .vt-textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* ── ALERTS ── */
        .vt-alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
        }

        .vt-alert-success {
            background: rgba(46, 201, 135, 0.12);
            border: 1px solid rgba(46, 201, 135, 0.25);
            color: var(--success);
        }

        .vt-alert-danger {
            background: rgba(224, 92, 107, 0.12);
            border: 1px solid rgba(224, 92, 107, 0.25);
            color: var(--danger);
        }

        .vt-alert-warning {
            background: rgba(224, 160, 60, 0.12);
            border: 1px solid rgba(224, 160, 60, 0.25);
            color: var(--warning);
        }

        .vt-alert-info {
            background: rgba(58, 176, 219, 0.12);
            border: 1px solid rgba(58, 176, 219, 0.25);
            color: var(--info);
        }

        /* ── PAGE HEADER ── */
        .vt-page-header {
            margin-bottom: 28px;
        }

        .vt-page-header h1 {
            font-size: 26px;
            font-weight: 800;
            margin: 0 0 4px;
            color: var(--text-primary);
        }

        .vt-page-header p {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
        }

        /* ── DIVIDERS ── */
        .vt-divider {
            border-color: var(--border);
            margin: 20px 0;
        }

        /* ── PAGINATION ── */
        .vt-pagination .page-link {
            background: var(--bg-card);
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
        }

        .vt-pagination .page-link:hover {
            background: var(--bg-card-hover);
            color: var(--teal);
        }

        .vt-pagination .page-item.active .page-link {
            background: var(--teal);
            border-color: var(--teal);
            color: #fff;
        }

        /* ── COOKIE BANNER ── */
        #cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            background: #0a1525;
            border-top: 1px solid var(--border-bright);
            padding: 16px 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        #cookie-banner p {
            margin: 0;
            font-size: 13px;
            color: var(--text-muted);
            flex: 1;
        }

        #cookie-banner a {
            color: var(--teal);
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-bright);
            border-radius: 10px;
        }
    </style>
    @yield('styles')
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="vt-sidebar">
        <div class="vt-sidebar-brand">
            <div class="brand-logo">
                <div class="brand-icon">VT</div>
                <div>
                    <div class="brand-name">ValleTech</div>
                    <div class="brand-sub">Industrial Mgmt.</div>
                </div>
            </div>
        </div>

        <nav class="vt-nav">
            <div class="vt-nav-section">Sistema</div>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Overview
            </a>
            <a href="{{ route('equipos.index') }}" class="{{ request()->routeIs('equipos.*') ? 'active' : '' }}">
                <i class="bi bi-cpu"></i> Equipos
            </a>
            <a href="{{ route('mantenimientos.index') }}"
                class="{{ request()->routeIs('mantenimientos.*') ? 'active' : '' }}">
                <i class="bi bi-tools"></i> Mantenimientos
            </a>

            @if (auth()->user()->rol === 'Admin')
                <div class="vt-nav-section" style="margin-top:10px">Administración</div>
                <a href="{{ route('tecnicos.index') }}" class="{{ request()->routeIs('tecnicos.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Técnicos
                </a>
                <a href="{{ route('usuarios.index') }}" class="{{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i> Usuarios
                </a>
            @endif

            <div class="vt-nav-section" style="margin-top:10px">Cuenta</div>
            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i> Mi Perfil
            </a>
        </nav>

        <div class="vt-sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="vt-new-service"
                    style="background:transparent; cursor:pointer; font-family:'Darker Grotesque',sans-serif;">
                    <i class="bi bi-box-arrow-left"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="vt-main">

        {{-- TOPBAR --}}
        <header class="vt-topbar">
            <div class="vt-topbar-title">@yield('topbar-title', 'ASSETCORE CMMS')</div>
            <div class="vt-topbar-actions">
                <a href="{{ route('profile.edit') }}" class="vt-topbar-icon" title="Mi Perfil">
                    <i class="bi bi-person"></i>
                </a>
                <a href="#" class="vt-topbar-icon" title="Ayuda">
                    <i class="bi bi-question-circle"></i>
                </a>
                <div class="vt-user-badge">
                    <div class="vt-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                    <div>
                        <div class="vt-user-name">{{ auth()->user()->name }}</div>
                        <div class="vt-user-role">{{ auth()->user()->rol }}</div>
                    </div>
                </div>
            </div>
        </header>

        {{-- CONTENT --}}
        <main class="vt-content">
            @yield('content')
        </main>

    </div>

    {{-- COOKIE BANNER --}}
    @if (!request()->cookie('cookies_accepted'))
        <div id="cookie-banner">
            <p>
                <i class="bi bi-shield-check" style="color:var(--teal)"></i>
                Usamos cookies para mejorar tu experiencia. Al continuar navegando, aceptas nuestra
                <a href="{{ route('legal.cookies') }}">Política de Cookies</a> y
                <a href="{{ route('legal.terminos') }}">Términos y Condiciones</a>.
            </p>
            <button class="btn-vt" onclick="acceptCookies()" id="accept-cookies-btn">
                <i class="bi bi-check-circle"></i> Aceptar
            </button>
            <a href="{{ route('legal.cookies') }}" class="btn-vt-outline">Más info</a>
        </div>
        <script>
            function acceptCookies() {
                document.cookie = "cookies_accepted=1; max-age=31536000; path=/";
                document.getElementById('cookie-banner').style.display = 'none';
            }
            // Si ya fue aceptado en sesión, ocultar
            if (document.cookie.indexOf('cookies_accepted=1') !== -1) {
                var b = document.getElementById('cookie-banner');
                if (b) b.style.display = 'none';
            }
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
