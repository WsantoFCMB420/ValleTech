<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ValleTech — Service and Repair</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #0E3C42;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .logo-title {
            font-size: 3rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: 4px;
        }

        .logo-title span {
            color: #4db8c8;
        }

        .logo-sub {
            color: #a0c4cc;
            font-size: 0.85rem;
            letter-spacing: 5px;
            margin-bottom: 2rem;
        }

        .card-welcome {
            background-color: #0C2D38;
            border: none;
            border-radius: 12px;
            padding: 2rem;
            max-width: 480px;
            width: 100%;
            text-align: center;
        }

        .card-welcome p {
            color: #a0c4cc;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .btn-vt {
            background-color: #0E3C42;
            color: #fff;
            border: 2px solid #4db8c8;
            padding: 0.6rem 2rem;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-vt:hover {
            background-color: #4db8c8;
            color: #0E3C42;
        }

        .btn-outline-vt {
            background-color: transparent;
            color: #a0c4cc;
            border: 1px solid #a0c4cc;
            padding: 0.6rem 2rem;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-outline-vt:hover {
            background-color: #a0c4cc;
            color: #0E3C42;
        }

        .footer-text {
            color: #4db8c8;
            font-size: 0.75rem;
            margin-top: 2rem;
            opacity: 0.6;
        }
    </style>
</head>

<body>

    <div class="text-center mb-3">
        <div class="logo-title">VALLE<span>TECH</span></div>
        <div class="logo-sub">SERVICE AND REPAIR</div>
    </div>

    <div class="card-welcome shadow-lg">
        <p>Sistema de Gestión de Mantenimiento ValleTech.<br>Controla equipos, técnicos e intervenciones desde un solo
            lugar.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('login') }}" class="btn-vt">Iniciar Sesión</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-outline-vt">Registrarse</a>
            @endif
        </div>
    </div>

    <p class="footer-text">© {{ date('Y') }} ValleTech — Todos los derechos reservados</p>

</body>

</html>
