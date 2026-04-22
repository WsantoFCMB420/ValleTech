<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Equipo — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
        }

        .card-header-vt {
            background-color: #0E3C42;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container mt-5" style="max-width:600px">
        <div class="card shadow">
            <div class="card-header card-header-vt">
                <h5 class="mb-0">🔍 Detalle del Equipo</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $equipo->id }}</p>
                <p><strong>Nombre:</strong> {{ $equipo->nombre }}</p>
                <p><strong>Estado:</strong> {{ $equipo->estado }}</p>
                <p><strong>Descripción:</strong> {{ $equipo->descripcion ?? '—' }}</p>
                <p><strong>Creado:</strong> {{ $equipo->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('equipos.index') }}" class="btn btn-secondary">← Volver al listado</a>
                <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</body>

</html>
