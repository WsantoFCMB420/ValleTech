<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acceso Denegado — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0E3C42;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .logo-title {
            font-size: 2rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: 4px;
        }

        .logo-title span {
            color: #4db8c8;
        }

        .logo-sub {
            color: #a0c4cc;
            font-size: 0.8rem;
            letter-spacing: 5px;
        }

        .error-code {
            font-size: 6rem;
            font-weight: 900;
            color: #4db8c8;
            line-height: 1;
        }

        .card-error {
            background-color: #0C2D38;
            border: none;
            border-radius: 12px;
            padding: 2.5rem;
            max-width: 480px;
            width: 100%;
            text-align: center;
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
    </style>
</head>

<body>
    <div class="text-center">
        <div class="mb-3">
            <div class="logo-title">VALLE<span>TECH</span></div>
            <div class="logo-sub">SERVICE AND REPAIR</div>
        </div>

        <div class="card-error shadow-lg">
            <div class="error-code">403</div>
            <h4 class="text-white mt-2 mb-2">Acceso Denegado</h4>
            <p class="text-muted mb-4">No tienes permiso para acceder a esta sección. Contacta al administrador si crees
                que es un error.</p>
            <a href="{{ route('dashboard') }}" class="btn-vt">← Volver al Dashboard</a>
        </div>
    </div>
</body>

</html>
