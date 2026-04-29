@extends('layouts.app')
@section('title', 'Nuevo Técnico')
@section('topbar-title', 'STAFF // ONBOARD TECHNICIAN')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Registrar Técnico</h1>
            <p>Añade un nuevo técnico al registro de personal</p>
        </div>
        <a href="{{ route('tecnicos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
    @if ($errors->any())
        <div class="vt-alert vt-alert-danger mb-4"><i class="bi bi-exclamation-triangle"></i>
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
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-person-plus me-2"
                            style="color:var(--teal)"></i>Datos del Técnico</span></div>
                <div class="vt-card-body">
                    <form action="{{ route('tecnicos.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="vt-form-group"><label class="vt-label">Nombre *</label><input type="text"
                                        name="nombre" class="vt-input" value="{{ old('nombre') }}" required
                                        placeholder="Juan"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group"><label class="vt-label">Apellido *</label><input type="text"
                                        name="apellido" class="vt-input" value="{{ old('apellido') }}" required
                                        placeholder="García"></div>
                            </div>
                            <div class="col-12">
                                <div class="vt-form-group"><label class="vt-label">Email *</label><input type="email"
                                        name="email" class="vt-input" value="{{ old('email') }}" required
                                        placeholder="tecnico@empresa.com"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group"><label class="vt-label">Teléfono</label><input type="text"
                                        name="telefono" class="vt-input" value="{{ old('telefono') }}"
                                        placeholder="+58 412 000 0000"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group"><label class="vt-label">Especialidad *</label>
                                    <select name="especialidad" class="vt-input vt-select" required>
                                        <option value="">— Seleccione —</option>
                                        @foreach (['Hardware', 'Software', 'Redes', 'Eléctrico', 'Mecánico', 'Hidráulico', 'General'] as $esp)
                                            <option value="{{ $esp }}"
                                                {{ old('especialidad') == $esp ? 'selected' : '' }}>{{ $esp }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group"><label class="vt-label">Estado *</label>
                                    <select name="estado" class="vt-input vt-select" required>
                                        <option value="Activo" {{ old('estado', 'Activo') == 'Activo' ? 'selected' : '' }}>
                                            Activo</option>
                                        <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>
                                            Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Guardar Técnico</button>
                            <a href="{{ route('tecnicos.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
