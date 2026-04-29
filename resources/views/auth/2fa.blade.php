<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación 2FA — ValleTech</title>
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
</body>

</html>
