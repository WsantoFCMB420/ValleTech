<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
        }

        .card-header-vt {
            background-color: #0E3C42;
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
    </style>
</head>

<body>
    <div class="container mt-5" style="max-width:480px">
        <div class="card shadow">
            <div class="card-header card-header-vt">
                <h5 class="mb-0">Recuperar Contraseña</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-4">
                    ¿Olvidaste tu contraseña? Ingresa tu correo y te enviaremos un enlace para restablecerla.
                </p>

                @if (session('status'))
                    <div class="alert alert-success small">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required
                            autofocus>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-vt">Enviar enlace</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
