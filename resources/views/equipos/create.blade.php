@extends('layouts.app')
@section('title', 'Nuevo Equipo')
@section('topbar-title', 'EQUIPMENT // NEW ASSET')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Registrar Nuevo Equipo</h1>
            <p>Añade un nuevo activo industrial al sistema</p>
        </div>
        <a href="{{ route('equipos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
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
        <div class="col-lg-7">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-cpu me-2"
                            style="color:var(--teal)"></i>Datos del Equipo</span></div>
                <div class="vt-card-body">
                    <form action="{{ route('equipos.store') }}" method="POST">
                        @csrf
                        <div class="vt-form-group">
                            <label class="vt-label">Nombre del equipo *</label>
                            <input type="text" name="nombre" class="vt-input" value="{{ old('nombre') }}" required
                                placeholder="Ej. Compresor HVAC-X1">
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Estado *</label>
                            <select name="estado" class="vt-input vt-select" required>
                                <option value="">— Seleccione un estado —</option>
                                @foreach (['Activo', 'Inactivo', 'En Mantenimiento', 'Fuera de servicio'] as $est)
                                    <option value="{{ $est }}" {{ old('estado') == $est ? 'selected' : '' }}>
                                        {{ $est }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Descripción</label>
                            <textarea name="descripcion" class="vt-input vt-textarea" placeholder="Descripción técnica del equipo...">{{ old('descripcion') }}</textarea>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Guardar Equipo</button>
                            <a href="{{ route('equipos.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
