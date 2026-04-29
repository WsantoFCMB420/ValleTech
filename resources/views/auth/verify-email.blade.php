<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Verificar Correo — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0E3C42;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card-header-vt {
            background-color: #0C2D38;
            color: #fff;
        }

        .btn-vt {
            background-color: #0C2D38;
            color: #fff;
            border: none;
        }

        .btn-vt:hover {
            background-color: #0A202E;
            color: #fff;
        }

        .logo-title {
            color: #fff;
            letter-spacing: 2px;
        }

        .logo-sub {
            color: #a0c4cc;
            font-size: 0.75rem;
            letter-spacing: 3px;
        }
    </style>
</head>

<body>
    <div class="container" style="max-width:480px">
        <div class="text-center mb-4">
            <h2 class="fw-bold logo-title">VALLETECH</h2>
            <p class="logo-sub">SERVICE AND REPAIR</p>
        </div>

        <div class="card shadow">
            <div class="card-header card-header-vt">
                <h5 class="mb-0">Verificar Correo Electrónico</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">
                    ¡Gracias por registrarte! Antes de continuar, verifica tu correo haciendo clic en el enlace que te
                    enviamos. Si no lo recibiste, podemos enviarte otro.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success small">
                        Se ha enviado un nuevo enlace de verificación a tu correo.
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-vt btn-sm">
                            Reenviar correo de verificación
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link btn-sm text-muted">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
