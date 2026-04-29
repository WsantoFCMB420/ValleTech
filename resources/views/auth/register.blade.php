<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro — ValleTech</title>
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
    <div class="container" style="max-width:420px">
        <div class="text-center mb-4">
            <h2 class="fw-bold logo-title">VALLETECH</h2>
            <p class="logo-sub">SERVICE AND REPAIR</p>
        </div>

        <div class="card shadow">
            <div class="card-header card-header-vt">
                <h5 class="mb-0">Crear Cuenta</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required
                            autofocus autocomplete="name">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required
                            autocomplete="username">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" class="form-control" required
                            autocomplete="new-password">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required
                            autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="small text-muted">
                            ¿Ya tienes cuenta?
                        </a>
                        <button type="submit" class="btn btn-vt">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
