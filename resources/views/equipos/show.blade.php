@extends('layouts.app')
@section('title', $equipo->nombre)
@section('topbar-title', 'EQUIPMENT // ASSET DETAIL')

@section('content')
<div class="vt-page-header d-flex align-items-center justify-content-between">
    <div>
        <h1>{{ $equipo->nombre }}</h1>
        <p>ID <span style="font-family:monospace;color:var(--teal)">#{{ str_pad($equipo->id, 4, '0', STR_PAD_LEFT) }}</span> · Registrado {{ $equipo->created_at->format('d/m/Y') }}</p>
    </div>
    <div style="display:flex;gap:10px;flex-wrap:wrap">
        @if(auth()->user()->rol === 'Admin')
        <a href="{{ route('equipos.edit', $equipo) }}" class="btn-vt-warning"><i class="bi bi-pencil"></i> Editar</a>
        @endif
        <a href="{{ route('mantenimientos.create') }}" class="btn-vt"><i class="bi bi-plus-circle"></i> Nuevo Mant.</a>
        <a href="{{ route('equipos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="vt-card">
            <div class="vt-card-header"><span class="header-title"><i class="bi bi-cpu me-2" style="color:var(--teal)"></i>Información del Activo</span></div>
            <div class="vt-card-body" style="display:flex;flex-direction:column;gap:14px">
                <div>
                    <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:4px">Nombre</div>
                    <div style="font-size:16px;font-weight:700">{{ $equipo->nombre }}</div>
                </div>
                <div>
                    <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:4px">Estado</div>
                    @php
                        $sc = match($equipo->estado ?? 'Activo') {
                            'Activo','Operativo' => 'badge-success',
                            'Inactivo','Fuera de servicio' => 'badge-danger',
                            'En Mantenimiento','En reparación' => 'badge-warning',
                            default => 'badge-muted',
                        };
                    @endphp
                    <span class="vt-badge {{ $sc }}">{{ $equipo->estado ?? 'Activo' }}</span>
                </div>
                <div>
                    <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:4px">Descripción</div>
                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6">{{ $equipo->descripcion ?? 'Sin descripción registrada.' }}</div>
                </div>
                <hr style="border-color:var(--border);margin:4px 0">
                <div style="display:flex;justify-content:space-between;font-size:12px">
                    <span style="color:var(--text-muted)">Registrado</span>
                    <span>{{ $equipo->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:12px">
                    <span style="color:var(--text-muted)">Intervenciones</span>
                    <span style="font-weight:700;color:var(--teal)">{{ $mantenimientos->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="vt-card">
            <div class="vt-card-header">
                <span class="header-title"><i class="bi bi-tools me-2" style="color:var(--teal)"></i>Historial de Intervenciones</span>
                <span style="font-size:12px;color:var(--text-muted)">{{ $mantenimientos->count() }} total</span>
            </div>
            <table class="vt-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Técnico</th>
                        <th>Prog.</th>
                        <th>Realizado</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mantenimientos as $m)
                    <tr>
                        <td style="font-size:11px;font-family:monospace;color:var(--text-faint)">#VT-{{ str_pad($m->id,4,'0',STR_PAD_LEFT) }}</td>
                        <td>
                            <span class="vt-badge {{ $m->tipo == 'Preventivo' ? 'badge-info' : 'badge-warning' }}">{{ $m->tipo }}</span>
                        </td>
                        <td style="color:var(--text-muted)">{{ $m->tecnico->nombre }} {{ $m->tecnico->apellido }}</td>
                        <td style="font-size:12px;color:var(--text-muted)">{{ $m->fecha_programada->format('d/m/Y') }}</td>
                        <td style="font-size:12px;color:var(--text-muted)">{{ $m->fecha_realizada ? $m->fecha_realizada->format('d/m/Y') : '—' }}</td>
                        <td>
                            @php $bc = match($m->estado) { 'Completado'=>'badge-success','En Proceso'=>'badge-warning', default=>'badge-muted' }; @endphp
                            <span class="vt-badge {{ $bc }}">{{ $m->estado }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center;color:var(--text-muted);padding:40px">
                            <i class="bi bi-inbox" style="font-size:28px;display:block;margin-bottom:8px;opacity:0.4"></i>
                            Sin intervenciones registradas para este equipo.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
