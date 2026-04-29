@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('topbar-title', 'ADMIN // EDIT USER')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Editar Usuario</h1>
            <p>Modificando: <span style="color:var(--teal)">{{ $usuario->name }}</span></p>
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
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-pencil me-2"
                            style="color:var(--teal)"></i>Datos del Usuario</span></div>
                <div class="vt-card-body">
                    <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
                        @csrf @method('PUT')
                        <div class="vt-form-group"><label class="vt-label">Nombre completo *</label><input type="text"
                                name="name" class="vt-input" value="{{ old('name', $usuario->name) }}" required></div>
                        <div class="vt-form-group"><label class="vt-label">Correo electrónico *</label><input type="email"
                                name="email" class="vt-input" value="{{ old('email', $usuario->email) }}" required></div>
                        <div class="vt-form-group">
                            <label class="vt-label">Nueva contraseña <span
                                    style="font-size:10px;color:var(--text-faint)">(vacío = sin cambios)</span></label>
                            <input type="password" name="password" class="vt-input" placeholder="••••••••">
                        </div>
                        <div class="vt-form-group"><label class="vt-label">Confirmar contraseña</label><input
                                type="password" name="password_confirmation" class="vt-input" placeholder="••••••••"></div>
                        <div class="vt-form-group"><label class="vt-label">Rol *</label>
                            <select name="rol" class="vt-input vt-select" required>
                                <option value="Tecnico" {{ old('rol', $usuario->rol) == 'Tecnico' ? 'selected' : '' }}>
                                    Técnico</option>
                                <option value="Admin" {{ old('rol', $usuario->rol) == 'Admin' ? 'selected' : '' }}>
                                    Administrador</option>
                            </select>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Actualizar Usuario</button>
                            <a href="{{ route('usuarios.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
