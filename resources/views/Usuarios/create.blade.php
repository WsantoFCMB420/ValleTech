@extends('layouts.app')
@section('title', 'Nuevo Usuario')
@section('topbar-title', 'ADMIN // CREATE USER')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Crear Usuario</h1>
            <p>Añade un nuevo usuario con acceso al sistema</p>
        </div>
        <a href="{{ route('usuarios.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
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
        <div class="col-lg-6">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-person-plus me-2"
                            style="color:var(--teal)"></i>Datos del Usuario</span></div>
                <div class="vt-card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}">
                        @csrf
                        <div class="vt-form-group"><label class="vt-label">Nombre completo *</label><input type="text"
                                name="name" class="vt-input" value="{{ old('name') }}" required
                                placeholder="Juan García"></div>
                        <div class="vt-form-group"><label class="vt-label">Correo electrónico *</label><input type="email"
                                name="email" class="vt-input" value="{{ old('email') }}" required
                                placeholder="usuario@empresa.com"></div>
                        <div class="vt-form-group"><label class="vt-label">Contraseña *</label><input type="password"
                                name="password" class="vt-input" required placeholder="••••••••"></div>
                        <div class="vt-form-group"><label class="vt-label">Confirmar contraseña *</label><input
                                type="password" name="password_confirmation" class="vt-input" required
                                placeholder="••••••••"></div>
                        <div class="vt-form-group"><label class="vt-label">Rol *</label>
                            <select name="rol" class="vt-input vt-select" required>
                                <option value="Tecnico" {{ old('rol', 'Tecnico') == 'Tecnico' ? 'selected' : '' }}>Técnico
                                </option>
                                <option value="Admin" {{ old('rol') == 'Admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Crear Usuario</button>
                            <a href="{{ route('usuarios.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
