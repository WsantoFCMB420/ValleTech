<!DOCTYPE html>
<html lang="es" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación 2FA — ValleTech</title>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        (function() {
            var t = localStorage.getItem('vt-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
    <style>
        :root,
        [data-theme="dark"] {
            --bg-base: #080f1a;
            --bg-card: #0f1e30;
            --bg-input: #0d1a28;
            --border: rgba(255, 255, 255, 0.07);
            --border-bright: rgba(255, 255, 255, 0.14);
            --teal: #1db89a;
            --teal-dim: #157a68;
            --teal-glow: rgba(29, 184, 154, 0.18);
            --text-primary: #dce8f0;
            --text-muted: #6b8299;
            --text-faint: #3d5568;
        }

        [data-theme="light"] {
            --bg-base: #f0f2f5;
            --bg-card: #ffffff;
            --bg-input: #f5f6f8;
            --border: rgba(0, 0, 0, 0.08);
            --border-bright: rgba(0, 0, 0, 0.14);
            --teal: #14957e;
            --teal-dim: #11806c;
            --teal-glow: rgba(20, 149, 126, 0.12);
            --text-primary: #1a2332;
            --text-muted: #5a6a7e;
            --text-faint: #94a3b8;
        }

        html.theme-transition,
        html.theme-transition *,
        html.theme-transition *::before,
        html.theme-transition *::after {
            transition: background-color 0.35s ease,
                        color 0.35s ease,
                        border-color 0.35s ease,
                        box-shadow 0.35s ease !important;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Darker Grotesque', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper {
            width: 100%;
            max-width: 420px;
            padding: 24px;
        }

        .brand-area {
            text-align: center;
            margin-bottom: 36px;
        }

        .brand-icon {
            width: 56px;
            height: 56px;
            background: var(--teal);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 900;
            color: #fff;
            margin: 0 auto 14px;
            box-shadow: 0 8px 32px rgba(29, 184, 154, 0.3);
        }

        .brand-name {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: 3px;
            color: var(--text-primary);
            text-transform: uppercase;
        }

        .brand-sub {
            font-size: 11px;
            letter-spacing: 2px;
            color: var(--text-muted);
            text-transform: uppercase;
            margin-top: 4px;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-bright);
            border-radius: 14px;
            overflow: hidden;
        }

        .card-header-2fa {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            text-align: center;
        }

        .card-header-2fa .icon {
            font-size: 28px;
            color: var(--teal);
            margin-bottom: 6px;
        }

        .card-header-2fa h2 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .card-header-2fa p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .card-body {
            padding: 28px 24px;
        }

        .vt-label {
            display: block;
            margin-bottom: 8px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            text-align: center;
        }

        .code-input {
            width: 100%;
            padding: 16px;
            background: var(--bg-input);
            border: 1px solid var(--border-bright);
            border-radius: 10px;
            color: var(--teal);
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 10px;
            text-align: center;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .code-input:focus {
            border-color: var(--teal-dim);
            box-shadow: 0 0 0 3px var(--teal-glow);
        }

        .code-input::placeholder {
            color: var(--text-faint);
            letter-spacing: 4px;
            font-size: 20px;
        }

        .error-text {
            font-size: 12px;
            color: #e05c6b;
            margin-top: 8px;
            text-align: center;
        }

        .btn-verify {
            width: 100%;
            padding: 14px;
            background: var(--teal);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-verify:hover {
            background: #17a086;
            box-shadow: 0 4px 20px rgba(29, 184, 154, 0.3);
        }

        .info-box {
            background: rgba(29, 184, 154, 0.07);
            border: 1px solid rgba(29, 184, 154, 0.15);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 16px;
            text-align: center;
            line-height: 1.6;
        }

        .logout-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: var(--text-muted);
            text-decoration: none;
        }

        .logout-link:hover {
            color: var(--text-primary);
        }

        /* Floating theme switch */
        .vt-theme-float-switch { position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;align-items:center;gap:8px;background:rgba(10,21,37,.85);backdrop-filter:blur(10px);padding:6px 10px 6px 14px;border-radius:20px;border:1px solid rgba(255,255,255,.1);box-shadow:0 4px 20px rgba(0,0,0,.3) }
        .vt-theme-float-switch .switch-label { font-size:11px;font-weight:700;color:rgba(255,255,255,.6);letter-spacing:.5px }
        .vt-theme-switch-mini { position:relative;display:inline-flex;align-items:center;cursor:pointer }
        .vt-theme-switch-mini input { opacity:0;width:0;height:0;position:absolute }
        .vt-switch-track-mini { width:44px;height:24px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:12px;position:relative;transition:background .3s;display:flex;align-items:center;padding:0 5px;justify-content:space-between }
        .vt-switch-track-mini .icon-moon,.vt-switch-track-mini .icon-sun { font-size:11px;z-index:1;color:rgba(255,255,255,.5) }
        .vt-switch-track-mini::after { content:'';width:18px;height:18px;background:#1db89a;border-radius:50%;position:absolute;top:2px;left:3px;transition:transform .3s cubic-bezier(.4,0,.2,1);box-shadow:0 2px 6px rgba(0,0,0,.3) }
        .vt-theme-switch-mini input:checked + .vt-switch-track-mini::after { transform:translateX(20px) }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="brand-area">
            <div class="brand-icon">VT</div>
            <div class="brand-name">ValleTech</div>
            <div class="brand-sub">Industrial Management</div>
        </div>

        <div class="card">
            <div class="card-header-2fa">
                <div class="icon"><i class="bi bi-shield-lock-fill"></i></div>
                <h2>Verificación de Seguridad</h2>
                <p>Ingresa el código de tu aplicación de autenticación</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('2fa.verify') }}">
                    @csrf
                    <label class="vt-label" for="code">Código de 6 dígitos</label>
                    <input type="text" id="code" name="code" class="code-input" placeholder="000000"
                        maxlength="6" required autofocus autocomplete="off" inputmode="numeric">
                    @error('code')
                        <div class="error-text"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn-verify">
                        <i class="bi bi-arrow-right-circle-fill"></i> Verificar y Entrar
                    </button>
                </form>

                <div class="info-box">
                    <i class="bi bi-phone"></i>
                    Abre Google Authenticator o Authy en tu teléfono y copia el código de 6 dígitos generado para
                    ValleTech.
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-link"
                        style="background:transparent;border:none;cursor:pointer;font-family:inherit">
                        <i class="bi bi-box-arrow-left"></i> Cerrar sesión e intentar con otra cuenta
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="vt-theme-float-switch">
        <span class="switch-label">Tema</span>
        <label class="vt-theme-switch-mini">
            <input type="checkbox" id="theme-checkbox">
            <span class="vt-switch-track-mini">
                <i class="bi bi-moon-stars icon-moon"></i>
                <i class="bi bi-sun-fill icon-sun"></i>
            </span>
        </label>
    </div>

    <script>
        (function() {
            var html = document.documentElement;
            var cb = document.getElementById('theme-checkbox');
            cb.checked = (localStorage.getItem('vt-theme') === 'light');
            cb.addEventListener('change', function() {
                html.classList.add('theme-transition');
                var theme = cb.checked ? 'light' : 'dark';
                html.setAttribute('data-theme', theme);
                localStorage.setItem('vt-theme', theme);
                setTimeout(function() { html.classList.remove('theme-transition'); }, 400);
            });
        })();
    </script>
</body>

</html>
