@extends('layouts.app')
@section('title', 'Mantenimientos')
@section('topbar-title', 'SYSTEM // LOGS')

@section('content')

    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Registro de Mantenimientos</h1>
            <p>Historial completo de intervenciones y trabajos programados</p>
        </div>
        <a href="{{ route('mantenimientos.create') }}" class="btn-vt">
            <i class="bi bi-plus-circle"></i> Nueva Intervención
        </a>
    </div>

    @if (session('success'))
        <div class="vt-alert vt-alert-success mb-4"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
    @endif

    {{-- Filtros --}}
    <div class="vt-card mb-4">
        <div class="vt-card-header">
            <span class="header-title"><i class="bi bi-funnel me-2" style="color:var(--teal)"></i>Filtros de búsqueda</span>
            @if (request()->hasAny(['buscar', 'tipo', 'estado', 'equipo_id']))
                <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline btn-sm-vt">
                    <i class="bi bi-x-circle"></i> Limpiar
                </a>
            @endif
        </div>
        <div class="vt-card-body">
            <form method="GET" action="{{ route('mantenimientos.index') }}"
                style="display:flex;flex-wrap:wrap;gap:12px;align-items:flex-end">
                <div style="flex:1;min-width:180px">
                    <label class="vt-label">Buscar</label>
                    <input type="text" name="buscar" class="vt-input" placeholder="Equipo, descripción..."
                        value="{{ request('buscar') }}">
                </div>
                <div style="min-width:140px">
                    <label class="vt-label">Tipo</label>
                    <select name="tipo" class="vt-input vt-select">
                        <option value="">Todos</option>
                        <option value="Preventivo" {{ request('tipo') == 'Preventivo' ? 'selected' : '' }}>Preventivo
                        </option>
                        <option value="Correctivo" {{ request('tipo') == 'Correctivo' ? 'selected' : '' }}>Correctivo
                        </option>
                    </select>
                </div>
                <div style="min-width:140px">
                    <label class="vt-label">Estado</label>
                    <select name="estado" class="vt-input vt-select">
                        <option value="">Todos</option>
                        <option value="Pendiente" {{ request('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente
                        </option>
                        <option value="En Proceso" {{ request('estado') == 'En Proceso' ? 'selected' : '' }}>En Proceso
                        </option>
                        <option value="Completado" {{ request('estado') == 'Completado' ? 'selected' : '' }}>Completado
                        </option>
                    </select>
                </div>
                <div style="min-width:160px">
                    <label class="vt-label">Equipo</label>
                    <select name="equipo_id" class="vt-input vt-select">
                        <option value="">Todos</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}"
                                {{ request('equipo_id') == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn-vt">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="vt-card">
        <div class="vt-card-header">
            <span class="header-title"><i class="bi bi-tools me-2" style="color:var(--teal)"></i>Intervenciones
                Registradas</span>
            <span style="font-size:12px;color:var(--text-muted)">{{ $mantenimientos->total() }} registros</span>
        </div>
        <table class="vt-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Equipo</th>
                    <th>Técnico</th>
                    <th>Tipo</th>
                    <th>Fecha Prog.</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mantenimientos as $m)
                    <tr>
                        <td style="color:var(--text-faint);font-size:11px;font-family:monospace">
                            #VT-{{ str_pad($m->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td style="font-weight:700">{{ $m->equipo->nombre }}</td>
                        <td style="color:var(--text-muted)">{{ $m->tecnico->nombre }} {{ $m->tecnico->apellido }}</td>
                        <td>
                            @if ($m->tipo == 'Preventivo')
                                <span class="vt-badge badge-info">Preventivo</span>
                            @else
                                <span class="vt-badge badge-warning">Correctivo</span>
                            @endif
                        </td>
                        <td style="color:var(--text-muted);font-size:12px">{{ $m->fecha_programada->format('d/m/Y') }}</td>
                        <td>
                            @php
                                $bc = match ($m->estado) {
                                    'Completado' => 'badge-success',
                                    'En Proceso' => 'badge-warning',
                                    default => 'badge-muted',
                                };
                            @endphp
                            <span class="vt-badge {{ $bc }}">{{ $m->estado }}</span>
                        </td>
                        <td>
                            <div style="display:flex;gap:6px;flex-wrap:wrap">
                                <a href="{{ route('mantenimientos.show', $m) }}" class="btn-vt-outline btn-sm-vt">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('mantenimientos.edit', $m) }}" class="btn-vt-warning btn-sm-vt">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if (auth()->user()->rol === 'Admin')
                                    <form action="{{ route('mantenimientos.destroy', $m) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('¿Eliminar este mantenimiento?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-vt-danger btn-sm-vt"><i
                                                class="bi bi-trash3"></i></button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;color:var(--text-muted);padding:48px">
                            <i class="bi bi-inbox" style="font-size:32px;display:block;margin-bottom:10px;opacity:0.4"></i>
                            No hay mantenimientos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($mantenimientos->hasPages())
            <div style="padding:16px 20px;border-top:1px solid var(--border)">
                <nav class="vt-pagination">{{ $mantenimientos->links() }}</nav>
            </div>
        @endif
    </div>

@endsection
