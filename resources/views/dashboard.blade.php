@extends('layouts.app')
@section('title', 'Overview')
@section('topbar-title', 'ASSETCORE CMMS')

@section('content')

    <div class="vt-page-header d-flex align-items-start justify-content-between">
        <div>
            <h1>Overview</h1>
            <p>Sistema de Gestión de Mantenimiento Industrial · {{ now()->format('d M Y') }}</p>
        </div>
        <div style="text-align:right">
            <div style="font-size:11px;color:var(--text-muted); letter-spacing:1px; text-transform:uppercase;">
                Usuario activo
            </div>
            <div style="font-size:14px;font-weight:700;color:var(--teal)">{{ auth()->user()->name }}</div>
        </div>
    </div>

    {{-- KPI Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-lg-3 col-sm-6">
            <div class="vt-kpi kpi-teal">
                <div class="vt-kpi-label">Equipos Registrados</div>
                <div class="vt-kpi-value">{{ $totalEquipos }}</div>
                <div class="vt-kpi-sub">Activos en sistema</div>
                <i class="bi bi-cpu vt-kpi-icon"></i>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="vt-kpi kpi-danger">
                <div class="vt-kpi-label">Pendientes</div>
                <div class="vt-kpi-value">{{ $mantenimientosPendientes }}</div>
                <div class="vt-kpi-sub">Mantenimientos en espera</div>
                <i class="bi bi-exclamation-triangle vt-kpi-icon"></i>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="vt-kpi kpi-success">
                <div class="vt-kpi-label">Completados</div>
                <div class="vt-kpi-value">{{ $mantenimientosCompletados }}</div>
                <div class="vt-kpi-sub">Intervenciones cerradas</div>
                <i class="bi bi-check-circle vt-kpi-icon"></i>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="vt-kpi kpi-info">
                <div class="vt-kpi-label">Técnicos Activos</div>
                <div class="vt-kpi-value">{{ $tecnicosActivos }}</div>
                <div class="vt-kpi-sub">Personal operativo</div>
                <i class="bi bi-people vt-kpi-icon"></i>
            </div>
        </div>
    </div>

    {{-- Recent Interventions + Quick Access --}}
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="vt-card">
                <div class="vt-card-header">
                    <span class="header-title"><i class="bi bi-tools me-2" style="color:var(--teal)"></i>Últimas
                        Intervenciones</span>
                    <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline btn-sm-vt">
                        Ver archivo <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>
                <table class="vt-table">
                    <thead>
                        <tr>
                            <th>Equipo</th>
                            <th>Técnico</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultimosMantenimientos as $m)
                            <tr>
                                <td style="font-weight:700">{{ $m->equipo->nombre }}</td>
                                <td style="color:var(--text-muted)">{{ $m->tecnico->nombre }} {{ $m->tecnico->apellido }}
                                </td>
                                <td>
                                    @if ($m->tipo == 'Preventivo')
                                        <span class="vt-badge badge-info">{{ $m->tipo }}</span>
                                    @else
                                        <span class="vt-badge badge-warning">{{ $m->tipo }}</span>
                                    @endif
                                </td>
                                <td style="color:var(--text-muted);font-size:12px">
                                    {{ $m->fecha_programada->format('d/m/Y') }}</td>
                                <td>
                                    @php
                                        $badgeClass = match ($m->estado) {
                                            'Completado' => 'badge-success',
                                            'En Proceso' => 'badge-warning',
                                            default => 'badge-muted',
                                        };
                                    @endphp
                                    <span class="vt-badge {{ $badgeClass }}">{{ $m->estado }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;color:var(--text-muted);padding:32px">
                                    <i class="bi bi-inbox" style="font-size:24px;display:block;margin-bottom:8px"></i>
                                    No hay mantenimientos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            {{-- Quick Access --}}
            <div class="vt-card mb-3">
                <div class="vt-card-header">
                    <span class="header-title">Acceso Rápido</span>
                </div>
                <div class="vt-card-body" style="display:flex;flex-direction:column;gap:10px">
                    <a href="{{ route('equipos.index') }}" class="btn-vt-outline" style="justify-content:flex-start">
                        <i class="bi bi-cpu"></i> Gestionar Equipos
                    </a>
                    <a href="{{ route('mantenimientos.create') }}" class="btn-vt" style="justify-content:flex-start">
                        <i class="bi bi-plus-circle"></i> Nueva Intervención
                    </a>
                    @if (auth()->user()->rol === 'Admin')
                        <a href="{{ route('tecnicos.index') }}" class="btn-vt-outline" style="justify-content:flex-start">
                            <i class="bi bi-people"></i> Ver Técnicos
                        </a>
                        <a href="{{ route('usuarios.index') }}" class="btn-vt-outline" style="justify-content:flex-start">
                            <i class="bi bi-person-gear"></i> Gestionar Usuarios
                        </a>
                    @endif
                </div>
            </div>

            {{-- System Status --}}
            <div class="vt-card">
                <div class="vt-card-header">
                    <span class="header-title">
                        <span
                            style="display:inline-block;width:8px;height:8px;border-radius:50%;background:var(--success);margin-right:6px"></span>
                        Estado del Sistema
                    </span>
                </div>
                <div class="vt-card-body" style="display:flex;flex-direction:column;gap:12px">
                    @php
                        $ratio =
                            $mantenimientosCompletados + $mantenimientosPendientes > 0
                                ? round(
                                    ($mantenimientosCompletados /
                                        max(1, $mantenimientosCompletados + $mantenimientosPendientes)) *
                                        100,
                                )
                                : 0;
                    @endphp
                    <div>
                        <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:5px">
                            <span style="color:var(--text-muted)">Tasa de resolución</span>
                            <span style="font-weight:700;color:var(--success)">{{ $ratio }}%</span>
                        </div>
                        <div style="height:4px;background:var(--border);border-radius:4px">
                            <div style="height:4px;background:var(--success);border-radius:4px;width:{{ $ratio }}%">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;font-size:12px">
                        <span style="color:var(--text-muted)">Base de Datos</span>
                        <span class="vt-badge badge-success"><i class="bi bi-circle-fill" style="font-size:6px"></i>
                            ACTIVE</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;font-size:12px">
                        <span style="color:var(--text-muted)">Core Engine</span>
                        <span class="vt-badge badge-success"><i class="bi bi-circle-fill" style="font-size:6px"></i>
                            NOMINAL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
