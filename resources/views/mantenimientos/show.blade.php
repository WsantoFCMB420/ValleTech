@extends('layouts.app')
@section('title', 'Detalle Mantenimiento')
@section('topbar-title', 'SYSTEM // LOG DETAIL')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Detalle de Intervención</h1>
            <p>Registro <span
                    style="font-family:monospace;color:var(--teal)">#VT-{{ str_pad($mantenimiento->id, 4, '0', STR_PAD_LEFT) }}</span>
            </p>
        </div>
        <div style="display:flex;gap:10px">
            <a href="{{ route('mantenimientos.edit', $mantenimiento) }}" class="btn-vt-warning"><i class="bi bi-pencil"></i>
                Editar</a>
            <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-file-text me-2"
                            style="color:var(--teal)"></i>Resumen del Registro</span></div>
                <div class="vt-card-body" style="display:flex;flex-direction:column;gap:16px">
                    @php
                        $bc = match ($mantenimiento->estado) {
                            'Completado' => 'badge-success',
                            'En Proceso' => 'badge-warning',
                            default => 'badge-muted',
                        };
                    @endphp
                    <div style="text-align:center;padding:16px 0;border-bottom:1px solid var(--border)">
                        <span class="vt-badge {{ $bc }}"
                            style="font-size:13px;padding:6px 16px">{{ $mantenimiento->estado }}</span>
                    </div>
                    <div>
                        <div
                            style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:4px">
                            Equipo</div>
                        <div style="font-weight:700;font-size:15px">{{ $mantenimiento->equipo->nombre }}</div>
                    </div>
                    <div>
                        <div
                            style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:4px">
                            Técnico</div>
                        <div style="font-weight:700">{{ $mantenimiento->tecnico->nombre }}
                            {{ $mantenimiento->tecnico->apellido }}</div>
                    </div>
                    <div>
                        <div
                            style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:4px">
                            Tipo</div>
                        <span
                            class="vt-badge {{ $mantenimiento->tipo == 'Preventivo' ? 'badge-info' : 'badge-warning' }}">{{ $mantenimiento->tipo }}</span>
                    </div>
                    <hr style="border-color:var(--border);margin:4px 0">
                    <div style="display:flex;justify-content:space-between;font-size:12px">
                        <span style="color:var(--text-muted)">Fecha programada</span>
                        <span>{{ $mantenimiento->fecha_programada->format('d/m/Y') }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:12px">
                        <span style="color:var(--text-muted)">Fecha realizada</span>
                        <span>{{ $mantenimiento->fecha_realizada ? $mantenimiento->fecha_realizada->format('d/m/Y') : '—' }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:12px">
                        <span style="color:var(--text-muted)">Registrado</span>
                        <span>{{ $mantenimiento->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="vt-card mb-4">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-card-text me-2"
                            style="color:var(--teal)"></i>Descripción del Trabajo</span></div>
                <div class="vt-card-body">
                    <p style="font-size:14px;color:var(--text-muted);line-height:1.8">{{ $mantenimiento->descripcion }}</p>
                </div>
            </div>
            @if ($mantenimiento->observaciones)
                <div class="vt-card">
                    <div class="vt-card-header"><span class="header-title"><i class="bi bi-chat-square-text me-2"
                                style="color:var(--teal)"></i>Observaciones</span></div>
                    <div class="vt-card-body">
                        <p style="font-size:14px;color:var(--text-muted);line-height:1.8">
                            {{ $mantenimiento->observaciones }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
