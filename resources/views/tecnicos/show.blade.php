@extends('layouts.app')
@section('title', $tecnico->nombre . ' ' . $tecnico->apellido)
@section('topbar-title', 'STAFF // TECHNICIAN PROFILE')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>{{ $tecnico->nombre }} {{ $tecnico->apellido }}</h1>
            <p>Perfil del técnico registrado</p>
        </div>
        <div style="display:flex;gap:10px">
            <a href="{{ route('tecnicos.edit', $tecnico) }}" class="btn-vt-warning"><i class="bi bi-pencil"></i> Editar</a>
            <a href="{{ route('tecnicos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-person-badge me-2"
                            style="color:var(--teal)"></i>Información del Técnico</span></div>
                <div class="vt-card-body" style="display:flex;flex-direction:column;gap:16px">
                    <div style="text-align:center;padding:16px 0;border-bottom:1px solid var(--border)">
                        <div
                            style="width:60px;height:60px;border-radius:14px;background:var(--teal-dim);display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:900;color:#fff;margin:0 auto 12px">
                            {{ strtoupper(substr($tecnico->nombre, 0, 1) . substr($tecnico->apellido, 0, 1)) }}
                        </div>
                        <div style="font-size:18px;font-weight:800">{{ $tecnico->nombre }} {{ $tecnico->apellido }}</div>
                        <span class="vt-badge badge-info" style="margin-top:6px">{{ $tecnico->especialidad }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:13px"><span
                            style="color:var(--text-muted)">Email</span><span>{{ $tecnico->email }}</span></div>
                    <div style="display:flex;justify-content:space-between;font-size:13px"><span
                            style="color:var(--text-muted)">Teléfono</span><span>{{ $tecnico->telefono ?? '—' }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:13px">
                        <span style="color:var(--text-muted)">Estado</span>
                        <span
                            class="vt-badge {{ $tecnico->estado == 'Activo' ? 'badge-success' : 'badge-muted' }}">{{ $tecnico->estado }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:12px"><span
                            style="color:var(--text-muted)">Registrado</span><span>{{ $tecnico->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
