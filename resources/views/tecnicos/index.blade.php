@extends('layouts.app')
@section('title', 'Técnicos')
@section('topbar-title', 'STAFF // PERSONNEL REGISTRY')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Registro de Técnicos</h1>
            <p>Gestión del personal técnico especializado</p>
        </div>
        <a href="{{ route('tecnicos.create') }}" class="btn-vt"><i class="bi bi-person-plus"></i> Nuevo Técnico</a>
    </div>

    @if (session('success'))
        <div class="vt-alert vt-alert-success mb-4"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
    @endif

    <div class="vt-card">
        <div class="vt-card-header">
            <span class="header-title"><i class="bi bi-people me-2" style="color:var(--teal)"></i>Personal Técnico</span>
            <span style="font-size:12px;color:var(--text-muted)">{{ $tecnicos->total() }} registros</span>
        </div>
        <table class="vt-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tecnicos as $tecnico)
                    <tr>
                        <td style="font-size:11px;font-family:monospace;color:var(--text-faint)">
                            #{{ str_pad($tecnico->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div
                                    style="width:32px;height:32px;border-radius:8px;background:var(--teal-dim);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;color:#fff;flex-shrink:0">
                                    {{ strtoupper(substr($tecnico->nombre, 0, 1) . substr($tecnico->apellido, 0, 1)) }}
                                </div>
                                <div>
                                    <div style="font-weight:700">{{ $tecnico->nombre }} {{ $tecnico->apellido }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="color:var(--text-muted);font-size:13px">{{ $tecnico->email }}</td>
                        <td style="color:var(--text-muted);font-size:13px">{{ $tecnico->telefono ?? '—' }}</td>
                        <td><span class="vt-badge badge-info">{{ $tecnico->especialidad }}</span></td>
                        <td>
                            <span class="vt-badge {{ $tecnico->estado == 'Activo' ? 'badge-success' : 'badge-muted' }}">
                                {{ $tecnico->estado }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex;gap:6px">
                                <a href="{{ route('tecnicos.show', $tecnico) }}" class="btn-vt-outline btn-sm-vt"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ route('tecnicos.edit', $tecnico) }}" class="btn-vt-warning btn-sm-vt"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="{{ route('tecnicos.destroy', $tecnico) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('¿Eliminar este técnico?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-vt-danger btn-sm-vt"><i
                                            class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;color:var(--text-muted);padding:48px">
                            <i class="bi bi-people" style="font-size:32px;display:block;margin-bottom:10px;opacity:0.4"></i>
                            No hay técnicos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($tecnicos->hasPages())
            <div style="padding:16px 20px;border-top:1px solid var(--border)">
                <nav class="vt-pagination">{{ $tecnicos->links() }}</nav>
            </div>
        @endif
    </div>
@endsection
