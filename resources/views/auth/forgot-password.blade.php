<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña — ValleTech CMMS</title>
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
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Ambient glow effects */
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(29, 184, 154, 0.08) 0%, transparent 70%);
            top: -150px;
            left: -100px;
            border-radius: 50%;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(29, 184, 154, 0.05) 0%, transparent 70%);
            bottom: -100px;
            right: -80px;
            border-radius: 50%;
            pointer-events: none;
        }

        .recover-container {
            width: 100%;
            max-width: 440px;
            padding: 24px;
            position: relative;
            z-index: 1;
        }

        /* Brand header */
        .recover-brand {
            text-align: center;
            margin-bottom: 36px;
        }

        .recover-brand-icon {
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
            margin: 0 auto 16px;
            box-shadow: 0 8px 32px rgba(29, 184, 154, 0.3);
        }

        .recover-brand h1 {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .recover-brand p {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        /* Card */
        .recover-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 36px 32px;
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.3);
        }

        .recover-title {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 4px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .recover-title i {
            font-size: 22px;
            color: var(--teal);
        }

        .recover-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
            line-height: 1.5;
        }

        /* Form elements */
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
            margin-bottom: 22px;
        }

        .text-danger-vt {
            font-size: 12px;
            color: #e05c6b;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Success alert */
        .alert-success-vt {
            background: rgba(29, 184, 154, 0.1);
            border: 1px solid rgba(29, 184, 154, 0.25);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            color: var(--teal);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Button */
        .btn-recover {
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-recover:hover {
            background: #17a086;
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(29, 184, 154, 0.3);
        }

        .btn-recover:active {
            transform: translateY(0);
        }

        /* Footer */
        .recover-footer {
            margin-top: 24px;
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
        }

        .recover-footer a {
            color: var(--teal);
            text-decoration: none;
            font-weight: 700;
            transition: color 0.2s;
        }

        .recover-footer a:hover {
            color: #25d4b2;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .recover-card {
                padding: 28px 20px;
            }

            .recover-container {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="recover-container">
        <div class="recover-brand">
            <div class="recover-brand-icon">VT</div>
            <h1>ValleTech</h1>
            <p>Industrial Management System</p>
        </div>

        <div class="recover-card">
            <div class="recover-title">
                <i class="bi bi-envelope-paper"></i>
                Recuperar Contraseña
            </div>
            <p class="recover-subtitle">
                ¿Olvidaste tu contraseña? No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace
                seguro para restablecerla.
            </p>

            @if (session('status'))
                <div class="alert-success-vt">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label class="vt-label" for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="vt-input" value="{{ old('email') }}"
                        required autofocus autocomplete="username" placeholder="usuario@empresa.com">
                    @error('email')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-recover">
                    <i class="bi bi-send"></i> Enviar enlace de recuperación
                </button>
            </form>

            <div class="recover-footer">
                <a href="{{ route('login') }}"><i class="bi bi-arrow-left"></i> Volver al inicio de sesión</a>
            </div>
        </div>
    </div>
</body>

</html>
