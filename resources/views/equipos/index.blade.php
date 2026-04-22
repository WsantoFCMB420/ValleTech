<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Equipos — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
        }

        .navbar {
            background-color: #0E3C42;
        }

        .btn-valletech {
            background-color: #0C2D38;
            color: #fff;
            border: none;
        }

        .btn-valletech:hover {
            background-color: #0A202E;
            color: #fff;
        }

        .badge-operativo {
            background-color: #198754;
        }

        .badge-reparacion {
            background-color: #fd7e14;
        }

        .badge-fuera {
            background-color: #dc3545;
        }

        .card-header-vt {
            background-color: #0E3C42;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold fs-4">⚙️ ValleTech — CMMS</span>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header card-header-vt d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Gestión de Equipos</h5>
                <a href="{{ route('equipos.create') }}" class="btn btn-sm btn-light fw-bold">+ Nuevo Equipo</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->id }}</td>
                                <td>{{ $equipo->nombre }}</td>
                                <td>
                                    @php
                                        $clase = match ($equipo->estado) {
                                            'Operativo' => 'badge-operativo',
                                            'En reparación' => 'badge-reparacion',
                                            'Fuera de servicio' => 'badge-fuera',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $clase }}">{{ $equipo->estado }}</span>
                                </td>
                                <td>{{ Str::limit($equipo->descripcion, 50) }}</td>
                                <td>
                                    <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('equipos.edit', $equipo) }}"
                                        class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('equipos.destroy', $equipo) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('¿Eliminar este equipo?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No hay equipos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $equipos->links() }}
            </div>
        </div>
    </div>
</body>

</html>
