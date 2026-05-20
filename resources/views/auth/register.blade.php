<!DOCTYPE html>
<html lang="es" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta — ValleTech CMMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            --register-left-bg: linear-gradient(135deg, #0a1525 0%, #0d2035 60%, #0f2a3a 100%);
            --register-feature-bg: rgba(255, 255, 255, 0.03);
        }

        [data-theme="light"] .register-right {
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
            align-items: stretch;
        }

        /* Left panel */
        .register-left {
            flex: 1;
            background: var(--register-left-bg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px;
            border-right: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(29, 184, 154, 0.08) 0%, transparent 70%);
            top: -150px;
            right: -100px;
            border-radius: 50%;
            animation: pulse-glow 6s ease-in-out infinite;
        }

        .register-left::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(29, 184, 154, 0.06) 0%, transparent 70%);
            bottom: -80px;
            left: -60px;
            border-radius: 50%;
            animation: pulse-glow 6s ease-in-out 3s infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.08); }
        }

        .register-brand {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .register-brand-icon {
            width: 64px;
            height: 64px;
            background: var(--teal);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 900;
            color: #fff;
            margin: 0 auto 20px;
            box-shadow: 0 8px 32px rgba(29, 184, 154, 0.3);
        }

        .register-brand h1 {
            font-size: 36px;
            font-weight: 900;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        .register-brand p {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .register-benefits {
            margin-top: 60px;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .register-benefit {
            display: flex;
            align-items: center;
            gap: 14px;
            background: var(--register-feature-bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 14px 18px;
            transition: all 0.3s;
        }

        .register-benefit:hover {
            background: rgba(29, 184, 154, 0.05);
            border-color: rgba(29, 184, 154, 0.15);
            transform: translateX(4px);
        }

        .register-benefit i {
            font-size: 20px;
            color: var(--teal);
            flex-shrink: 0;
        }

        .register-benefit-text {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .register-benefit-sub {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* Right panel (form) */
        .register-right {
            width: 560px;
            flex-shrink: 0;
            background: var(--bg-base);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 36px;
            overflow-y: auto;
        }

        .register-form-wrapper {
            width: 100%;
        }

        .register-form-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 4px;
            color: var(--text-primary);
        }

        .register-form-sub {
            font-size: 17px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        .btn-back-home {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-bright);
            border-radius: 8px;
            color: var(--text-muted);
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            margin-bottom: 24px;
        }

        .btn-back-home:hover {
            background: var(--teal-glow);
            border-color: var(--teal-dim);
            color: var(--teal);
            transform: translateX(-2px);
        }

        .btn-back-home i {
            font-size: 14px;
            transition: transform 0.2s;
        }

        .btn-back-home:hover i {
            transform: translateX(-3px);
        }

        .vt-label {
            display: block;
            margin-bottom: 6px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .vt-input {
            width: 100%;
            padding: 14px 18px;
            background: var(--bg-input);
            border: 1px solid var(--border-bright);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 19px;
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

        .form-group {
            margin-bottom: 16px;
        }

        .form-row {
            display: flex;
            gap: 12px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .text-danger-vt {
            font-size: 15px;
            color: #e05c6b;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            background: var(--teal);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-register:hover {
            background: #17a086;
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(29, 184, 154, 0.3);
        }

        .register-footer {
            margin-top: 24px;
            text-align: center;
            font-size: 16px;
            color: var(--text-muted);
        }

        .register-footer a {
            color: var(--teal);
            text-decoration: none;
            font-weight: 700;
            transition: color 0.2s;
        }

        .register-footer a:hover {
            color: #24d4b2;
            text-decoration: underline;
        }

        .register-legal {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: var(--text-faint);
        }

        .register-legal a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .register-legal a:hover {
            color: var(--teal);
        }

        /* Password strength hint */
        .password-hint {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            font-size: 11px;
            color: var(--text-faint);
        }

        .password-hint i {
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .register-left {
                display: none;
            }

            .register-right {
                width: 100%;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }

        /* Floating theme switch */
        .vt-theme-float-switch {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(10, 21, 37, 0.85);
            backdrop-filter: blur(10px);
            padding: 6px 10px 6px 14px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .vt-theme-float-switch .switch-label {
            font-size: 11px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 0.5px;
        }
        .vt-theme-switch-mini {
            position: relative;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }
        .vt-theme-switch-mini input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }
        .vt-switch-track-mini {
            width: 44px;
            height: 24px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            position: relative;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            padding: 0 5px;
            justify-content: space-between;
        }
        .vt-switch-track-mini .icon-moon,
        .vt-switch-track-mini .icon-sun {
            font-size: 11px;
            z-index: 1;
        }
        .vt-switch-track-mini .icon-moon { color: rgba(255,255,255,0.5); }
        .vt-switch-track-mini .icon-sun { color: rgba(255,255,255,0.5); }
        .vt-switch-track-mini::after {
            content: '';
            width: 18px;
            height: 18px;
            background: #1db89a;
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 3px;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        .vt-theme-switch-mini input:checked + .vt-switch-track-mini::after {
            transform: translateX(20px);
        }
    </style>
</head>

<body>
    <div class="register-left">
        <div class="register-brand">
            <div class="register-brand-icon">VT</div>
            <h1>ValleTech</h1>
            <p>Industrial Management System</p>
        </div>
        <div class="register-benefits">
            <div class="register-benefit">
                <i class="bi bi-rocket-takeoff"></i>
                <div>
                    <div class="register-benefit-text">Comienza en Minutos</div>
                    <div class="register-benefit-sub">Configura tu cuenta y accede al sistema al instante</div>
                </div>
            </div>
            <div class="register-benefit">
                <i class="bi bi-graph-up-arrow"></i>
                <div>
                    <div class="register-benefit-text">Dashboard en Tiempo Real</div>
                    <div class="register-benefit-sub">Monitorea KPIs y métricas de mantenimiento</div>
                </div>
            </div>
            <div class="register-benefit">
                <i class="bi bi-shield-lock"></i>
                <div>
                    <div class="register-benefit-text">Seguridad Avanzada</div>
                    <div class="register-benefit-sub">Protección con 2FA y cifrado de datos</div>
                </div>
            </div>
            <div class="register-benefit">
                <i class="bi bi-people-fill"></i>
                <div>
                    <div class="register-benefit-text">Gestión de Equipos</div>
                    <div class="register-benefit-sub">Colabora con técnicos y administradores</div>
                </div>
            </div>
        </div>
    </div>

    <div class="register-right">
        <div class="register-form-wrapper">
            <a href="/" class="btn-back-home">
                <i class="bi bi-arrow-left"></i> Volver al Inicio
            </a>
            <div class="register-form-title">Crear tu cuenta</div>
            <div class="register-form-sub">Regístrate para acceder al sistema de gestión</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label class="vt-label" for="name">Nombre completo</label>
                    <input type="text" id="name" name="name" class="vt-input" value="{{ old('name') }}"
                        required autofocus autocomplete="name" placeholder="Ej: Carlos Martínez">
                    @error('name')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="vt-label" for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="vt-input" value="{{ old('email') }}"
                        required autocomplete="username" placeholder="usuario@empresa.com">
                    @error('email')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="vt-label" for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="vt-input" required
                            autocomplete="new-password" placeholder="••••••••">
                        @error('password')
                            <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="vt-label" for="password_confirmation">Confirmar</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="vt-input"
                            required autocomplete="new-password" placeholder="••••••••">
                        @error('password_confirmation')
                            <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="password-hint">
                    <i class="bi bi-info-circle"></i> Mínimo 8 caracteres con letras y números
                </div>

                <button type="submit" class="btn-register">
                    <i class="bi bi-person-plus"></i> Crear Cuenta
                </button>
            </form>

            <div class="register-footer">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>

            <div class="register-legal">
                <p>Al registrarte aceptas nuestros
                    <a href="{{ route('legal.terminos') }}" target="_blank">Términos y Condiciones</a> y
                    <a href="{{ route('legal.cookies') }}" target="_blank">Política de Cookies</a>.
                </p>
                <p style="margin-top:8px">ValleTech CMMS &copy; {{ date('Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Floating Theme Switch --}}
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
    {{-- TERMS MODAL OVERLAY --}}
    @include('components.terms-modal')
</body>

</html>
