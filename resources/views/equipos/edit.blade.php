@extends('layouts.app')
@section('title', 'Editar Equipo')
@section('topbar-title', 'EQUIPMENT // EDIT')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Editar Equipo</h1>
            <p>Modificando: <span style="color:var(--teal)">{{ $equipo->nombre }}</span></p>
        </div>
        <div style="display:flex;gap:10px">
            <a href="{{ route('equipos.show', $equipo) }}" class="btn-vt-outline"><i class="bi bi-eye"></i> Ver</a>
            <a href="{{ route('equipos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
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
        <div class="col-lg-7">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-pencil me-2"
                            style="color:var(--teal)"></i>Datos del Equipo</span></div>
                <div class="vt-card-body">
                    <form action="{{ route('equipos.update', $equipo) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="vt-form-group">
                            <label class="vt-label">Nombre del equipo *</label>
                            <input type="text" name="nombre" class="vt-input"
                                value="{{ old('nombre', $equipo->nombre) }}" required>
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Estado *</label>
                            <select name="estado" class="vt-input vt-select" required>
                                @foreach (['Activo', 'Inactivo', 'En Mantenimiento', 'Fuera de servicio', 'Operativo', 'En reparación'] as $est)
                                    <option value="{{ $est }}"
                                        {{ old('estado', $equipo->estado) == $est ? 'selected' : '' }}>{{ $est }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Descripción</label>
                            <textarea name="descripcion" class="vt-input vt-textarea">{{ old('descripcion', $equipo->descripcion) }}</textarea>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Actualizar Equipo</button>
                            <a href="{{ route('equipos.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
