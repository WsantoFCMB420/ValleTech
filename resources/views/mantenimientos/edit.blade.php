@extends('layouts.app')
@section('title', 'Editar Mantenimiento')
@section('topbar-title', 'SYSTEM // EDIT LOG ENTRY')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Editar Intervención</h1>
            <p>Registro <span
                    style="font-family:monospace;color:var(--teal)">#VT-{{ str_pad($mantenimiento->id, 4, '0', STR_PAD_LEFT) }}</span>
                · {{ $mantenimiento->equipo->nombre }}</p>
        </div>
        <div style="display:flex;gap:10px">
            <a href="{{ route('mantenimientos.show', $mantenimiento) }}" class="btn-vt-outline"><i class="bi bi-eye"></i>
                Ver</a>
            <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="vt-alert vt-alert-danger mb-4">
            <i class="bi bi-exclamation-triangle"></i>
            <div>
                @foreach ($errors->all() as $e)
                    <div>{{ $e }}</div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-pencil me-2"
                            style="color:var(--teal)"></i>Datos de la Intervención</span></div>
                <div class="vt-card-body">
                    <form action="{{ route('mantenimientos.update', $mantenimiento) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Equipo *</label>
                                    <select name="equipo_id" class="vt-input vt-select" required>
                                        @foreach ($equipos as $equipo)
                                            <option value="{{ $equipo->id }}"
                                                {{ old('equipo_id', $mantenimiento->equipo_id) == $equipo->id ? 'selected' : '' }}>
                                                {{ $equipo->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Técnico Asignado *</label>
                                    <select name="tecnico_id" class="vt-input vt-select" required>
                                        @foreach ($tecnicos as $tecnico)
                                            <option value="{{ $tecnico->id }}"
                                                {{ old('tecnico_id', $mantenimiento->tecnico_id) == $tecnico->id ? 'selected' : '' }}>
                                                {{ $tecnico->nombre }} {{ $tecnico->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Tipo *</label>
                                    <select name="tipo" class="vt-input vt-select" required>
                                        @foreach (['Preventivo', 'Correctivo'] as $tipo)
                                            <option value="{{ $tipo }}"
                                                {{ old('tipo', $mantenimiento->tipo) == $tipo ? 'selected' : '' }}>
                                                {{ $tipo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Estado *</label>
                                    <select name="estado" class="vt-input vt-select" required>
                                        @foreach (['Pendiente', 'En Proceso', 'Completado'] as $est)
                                            <option value="{{ $est }}"
                                                {{ old('estado', $mantenimiento->estado) == $est ? 'selected' : '' }}>
                                                {{ $est }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Fecha Programada *</label>
                                    <input type="date" name="fecha_programada" class="vt-input"
                                        value="{{ old('fecha_programada', $mantenimiento->fecha_programada->format('Y-m-d')) }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Fecha Realizada</label>
                                    <input type="date" name="fecha_realizada" class="vt-input"
                                        value="{{ old('fecha_realizada', $mantenimiento->fecha_realizada?->format('Y-m-d')) }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="vt-form-group">
                                    <label class="vt-label">Descripción *</label>
                                    <textarea name="descripcion" class="vt-input vt-textarea" required>{{ old('descripcion', $mantenimiento->descripcion) }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="vt-form-group">
                                    <label class="vt-label">Observaciones</label>
                                    <textarea name="observaciones" class="vt-input" rows="2">{{ old('observaciones', $mantenimiento->observaciones) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Actualizar
                                Intervención</button>
                            <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
