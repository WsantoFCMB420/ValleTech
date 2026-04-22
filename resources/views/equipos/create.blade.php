<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Equipo — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
        }

        .card-header-vt {
            background-color: #0E3C42;
            color: #fff;
        }

        .btn-valletech {
            background-color: #0C2D38;
            color: #fff;
        }

        .btn-valletech:hover {
            background-color: #0A202E;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container mt-5" style="max-width:600px">
        <div class="card shadow">
            <div class="card-header card-header-vt">
                <h5 class="mb-0">➕ Registrar Nuevo Equipo</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('equipos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del equipo</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="">-- Seleccione --</option>
                            <option value="Operativo" {{ old('estado') == 'Operativo' ? 'selected' : '' }}>Operativo
                            </option>
                            <option value="En reparación" {{ old('estado') == 'En reparación' ? 'selected' : '' }}>En
                                reparación</option>
                            <option value="Fuera de servicio"
                                {{ old('estado') == 'Fuera de servicio' ? 'selected' : '' }}>Fuera de servicio</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">← Volver</a>
                        <button type="submit" class="btn btn-valletech">Guardar Equipo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
