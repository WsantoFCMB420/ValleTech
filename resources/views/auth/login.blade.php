<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión — ValleTech CMMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
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
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #0a1525 0%, #0d2035 60%, #0f2a3a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px;
            border-right: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(29, 184, 154, 0.1) 0%, transparent 70%);
            top: -100px;
            left: -100px;
            border-radius: 50%;
        }

        .login-left::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(29, 184, 154, 0.06) 0%, transparent 70%);
            bottom: -50px;
            right: -50px;
            border-radius: 50%;
        }

        .login-brand {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .login-brand-icon {
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

        .login-brand h1 {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        .login-brand p {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .login-features {
            margin-top: 60px;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .login-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 14px 18px;
        }

        .login-feature i {
            font-size: 20px;
            color: var(--teal);
        }

        .login-feature-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .login-feature-sub {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* Right panel (form) */
        .login-right {
            width: 420px;
            flex-shrink: 0;
            background: var(--bg-base);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 36px;
        }

        .login-form-wrapper {
            width: 100%;
        }

        .login-form-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 4px;
            color: var(--text-primary);
        }

        .login-form-sub {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 32px;
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
            padding: 11px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border-bright);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 15px;
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
            margin-bottom: 18px;
        }

        .text-danger-vt {
            font-size: 12px;
            color: #e05c6b;
            margin-top: 5px;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: var(--teal);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
        }

        .btn-login:hover {
            background: #17a086;
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(29, 184, 154, 0.3);
        }

        .login-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .login-links label {
            font-size: 13px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .login-links a {
            font-size: 12px;
            color: var(--teal);
            text-decoration: none;
        }

        .login-links a:hover {
            text-decoration: underline;
        }

        .login-divider {
            text-align: center;
            margin: 28px 0 16px;
            font-size: 11px;
            color: var(--text-faint);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .login-footer {
            margin-top: 28px;
            text-align: center;
            font-size: 11px;
            color: var(--text-muted);
        }

        .login-footer a {
            color: var(--teal);
            text-decoration: none;
        }

        .alert-info-vt {
            background: rgba(29, 184, 154, 0.1);
            border: 1px solid rgba(29, 184, 154, 0.25);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            color: var(--teal);
            margin-bottom: 20px;
        }

        /* Checkbox custom */
        input[type=checkbox] {
            accent-color: var(--teal);
        }

        @media (max-width: 768px) {
            .login-left {
                display: none;
            }

            .login-right {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="login-left">
        <div class="login-brand">
            <div class="login-brand-icon">VT</div>
            <h1>ValleTech</h1>
            <p>Industrial Management System</p>
        </div>
        <div class="login-features">
            <div class="login-feature">
                <i class="bi bi-cpu"></i>
                <div>
                    <div class="login-feature-text">Gestión de Activos</div>
                    <div class="login-feature-sub">Control total de tu flota industrial</div>
                </div>
            </div>
            <div class="login-feature">
                <i class="bi bi-tools"></i>
                <div>
                    <div class="login-feature-text">Registro de Mantenimientos</div>
                    <div class="login-feature-sub">Historial completo de intervenciones</div>
                </div>
            </div>
            <div class="login-feature">
                <i class="bi bi-shield-check"></i>
                <div>
                    <div class="login-feature-text">Acceso Seguro con 2FA</div>
                    <div class="login-feature-sub">Doble factor de autenticación</div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-right">
        <div class="login-form-wrapper">
            <div class="login-form-title">Bienvenido de vuelta</div>
            <div class="login-form-sub">Inicia sesión para acceder al sistema</div>

            @if (session('status'))
                <div class="alert-info-vt"><i class="bi bi-info-circle"></i> {{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="vt-label" for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="vt-input" value="{{ old('email') }}"
                        required autofocus autocomplete="username" placeholder="usuario@empresa.com">
                    @error('email')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="vt-label" for="password">Contraseña</label>
                    <input type="password" id="password" name="password" class="vt-input" required
                        autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="login-links">
                    <label>
                        <input type="checkbox" name="remember"> Recordarme
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Ingresar al Sistema
                </button>
            </form>

            <div class="login-footer">
                <p>Al ingresar aceptas nuestros
                    <a href="{{ route('legal.terminos') }}" target="_blank">Términos y Condiciones</a> y
                    <a href="{{ route('legal.cookies') }}" target="_blank">Política de Cookies</a>.
                </p>
                <p style="margin-top:12px">ValleTech CMMS &copy; {{ date('Y') }} · Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</body>

</html>
