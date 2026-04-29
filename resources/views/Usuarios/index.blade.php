@extends('layouts.app')
@section('title', 'Usuarios')
@section('topbar-title', 'ADMIN // USER MANAGEMENT')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Gestión de Usuarios</h1>
            <p>Control de acceso y roles del sistema</p>
        </div>
        <a href="{{ route('usuarios.create') }}" class="btn-vt"><i class="bi bi-person-plus"></i> Nuevo Usuario</a>
    </div>

    @if (session('success'))
        <div class="vt-alert vt-alert-success mb-4"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="vt-alert vt-alert-danger mb-4"><i class="bi bi-exclamation-triangle"></i> {{ session('error') }}</div>
    @endif

    <div class="vt-card">
        <div class="vt-card-header">
            <span class="header-title"><i class="bi bi-person-gear me-2" style="color:var(--teal)"></i>Registro de
                Usuarios</span>
            <span style="font-size:12px;color:var(--text-muted)">{{ $usuarios->total() }} usuarios</span>
        </div>
        <table class="vt-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Registrado</th>
                    <th>2FA</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td style="font-size:11px;font-family:monospace;color:var(--text-faint)">#{{ $usuario->id }}</td>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div
                                    style="width:30px;height:30px;border-radius:7px;background:{{ $usuario->rol == 'Admin' ? 'rgba(224,92,107,0.25)' : 'var(--teal-dim)' }};display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:#fff">
                                    {{ strtoupper(substr($usuario->name, 0, 2)) }}
                                </div>
                                <span style="font-weight:700">{{ $usuario->name }}</span>
                                @if ($usuario->id === auth()->id())
                                    <span class="vt-badge badge-info" style="font-size:9px">Tú</span>
                                @endif
                            </div>
                        </td>
                        <td style="color:var(--text-muted);font-size:13px">{{ $usuario->email }}</td>
                        <td>
                            <span
                                class="vt-badge {{ $usuario->rol == 'Admin' ? 'badge-danger' : 'badge-muted' }}">{{ $usuario->rol }}</span>
                        </td>
                        <td style="color:var(--text-muted);font-size:12px">{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if ($usuario->google2fa_secret)
                                <span class="vt-badge badge-success"><i class="bi bi-shield-check"></i> ON</span>
                            @else
                                <span class="vt-badge badge-muted"><i class="bi bi-shield-x"></i> OFF</span>
                            @endif
                        </td>
                        <td>
                            <div style="display:flex;gap:6px">
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn-vt-warning btn-sm-vt"><i
                                        class="bi bi-pencil"></i></a>
                                @if ($usuario->id !== auth()->id())
                                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('¿Eliminar usuario {{ $usuario->name }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-vt-danger btn-sm-vt"><i
                                                class="bi bi-trash3"></i></button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;color:var(--text-muted);padding:48px">
                            <i class="bi bi-people" style="font-size:32px;display:block;margin-bottom:10px;opacity:0.4"></i>
                            No hay usuarios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($usuarios->hasPages())
            <div style="padding:16px 20px;border-top:1px solid var(--border)">
                <nav class="vt-pagination">{{ $usuarios->links() }}</nav>
            </div>
        @endif
    </div>
@endsection
