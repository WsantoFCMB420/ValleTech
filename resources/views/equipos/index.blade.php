@extends('layouts.app')
@section('title', 'Equipos')
@section('topbar-title', 'EQUIPMENT // INVENTORY')

@section('content')

    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Flota de Equipos</h1>
            <p>Gestión y monitoreo de activos industriales registrados</p>
        </div>
        @if (auth()->user()->rol === 'Admin')
            <a href="{{ route('equipos.create') }}" class="btn-vt">
                <i class="bi bi-plus-circle"></i> Añadir Equipo
            </a>
        @endif
    </div>

    <div class="vt-card">
        <div class="vt-card-header">
            <span class="header-title"><i class="bi bi-cpu me-2" style="color:var(--teal)"></i>Registro de Equipos</span>
            <span style="font-size:12px;color:var(--text-muted)">{{ $equipos->total() }} activos en sistema</span>
        </div>
        <table class="vt-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Equipo</th>
                    <th>Tipo</th>
                    <th>Ubicación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipos as $equipo)
                    <tr>
                        <td style="color:var(--text-faint);font-size:11px;font-family:monospace">
                            #{{ str_pad($equipo->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div style="font-weight:700;color:var(--text-primary)">{{ $equipo->nombre }}</div>
                            <div style="font-size:11px;color:var(--text-muted)">{{ $equipo->marca ?? '—' }}
                                {{ $equipo->modelo ?? '' }}</div>
                        </td>
                        <td><span class="vt-badge badge-info">{{ $equipo->tipo }}</span></td>
                        <td style="color:var(--text-muted);font-size:13px">{{ $equipo->ubicacion ?? '—' }}</td>
                        <td>
                            @php
                                $sc = match ($equipo->estado ?? 'Activo') {
                                    'Activo' => 'badge-success',
                                    'Inactivo' => 'badge-danger',
                                    'En Mantenimiento' => 'badge-warning',
                                    default => 'badge-muted',
                                };
                            @endphp
                            <span class="vt-badge {{ $sc }}">{{ $equipo->estado ?? 'Activo' }}</span>
                        </td>
                        <td>
                            <div style="display:flex;gap:6px;flex-wrap:wrap">
                                <a href="{{ route('equipos.show', $equipo) }}" class="btn-vt-outline btn-sm-vt">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                @if (auth()->user()->rol === 'Admin')
                                    <a href="{{ route('equipos.edit', $equipo) }}" class="btn-vt-warning btn-sm-vt">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('¿Eliminar este equipo?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-vt-danger btn-sm-vt">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;color:var(--text-muted);padding:48px 16px">
                            <i class="bi bi-inbox" style="font-size:32px;display:block;margin-bottom:10px;opacity:0.4"></i>
                            No hay equipos registrados.
                            @if (auth()->user()->rol === 'Admin')
                                <br><a href="{{ route('equipos.create') }}" class="btn-vt"
                                    style="margin-top:16px;display:inline-flex">
                                    <i class="bi bi-plus-circle"></i> Añadir primer equipo
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($equipos->hasPages())
            <div style="padding:16px 20px;border-top:1px solid var(--border)">
                <nav class="vt-pagination">{{ $equipos->links() }}</nav>
            </div>
        @endif
    </div>

@endsection
