@extends('layouts.app')
@section('title', 'Nuevo Mantenimiento')
@section('topbar-title', 'SYSTEM // NEW LOG ENTRY')

@section('content')
    <div class="vt-page-header d-flex align-items-center justify-content-between">
        <div>
            <h1>Nueva Intervención</h1>
            <p>Registra un nuevo trabajo de mantenimiento en el sistema</p>
        </div>
        <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline"><i class="bi bi-arrow-left"></i> Volver</a>
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

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-tools me-2"
                            style="color:var(--teal)"></i>Datos de la Intervención</span></div>
                <div class="vt-card-body">
                    <form action="{{ route('mantenimientos.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-0">
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Equipo *</label>
                                    <select name="equipo_id" class="vt-input vt-select" required>
                                        <option value="">— Seleccione equipo —</option>
                                        @foreach ($equipos as $equipo)
                                            <option value="{{ $equipo->id }}"
                                                {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
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
                                        <option value="">— Seleccione técnico —</option>
                                        @foreach ($tecnicos as $tecnico)
                                            <option value="{{ $tecnico->id }}"
                                                {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                                                {{ $tecnico->nombre }} {{ $tecnico->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Tipo de Intervención *</label>
                                    <select name="tipo" class="vt-input vt-select" required>
                                        <option value="">— Seleccione tipo —</option>
                                        <option value="Preventivo" {{ old('tipo') == 'Preventivo' ? 'selected' : '' }}>
                                            Preventivo</option>
                                        <option value="Correctivo" {{ old('tipo') == 'Correctivo' ? 'selected' : '' }}>
                                            Correctivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Estado *</label>
                                    <select name="estado" class="vt-input vt-select" required>
                                        <option value="Pendiente"
                                            {{ old('estado', 'Pendiente') == 'Pendiente' ? 'selected' : '' }}>Pendiente
                                        </option>
                                        <option value="En Proceso" {{ old('estado') == 'En Proceso' ? 'selected' : '' }}>En
                                            Proceso</option>
                                        <option value="Completado" {{ old('estado') == 'Completado' ? 'selected' : '' }}>
                                            Completado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Fecha Programada *</label>
                                    <input type="date" name="fecha_programada" class="vt-input"
                                        value="{{ old('fecha_programada') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vt-form-group">
                                    <label class="vt-label">Fecha Realizada</label>
                                    <input type="date" name="fecha_realizada" class="vt-input"
                                        value="{{ old('fecha_realizada') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="vt-form-group">
                                    <label class="vt-label">Descripción del Trabajo *</label>
                                    <textarea name="descripcion" class="vt-input vt-textarea" required
                                        placeholder="Describe detalladamente las tareas realizadas...">{{ old('descripcion') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="vt-form-group">
                                    <label class="vt-label">Observaciones adicionales</label>
                                    <textarea name="observaciones" class="vt-input" rows="2"
                                        placeholder="Notas adicionales, repuestos utilizados, próximas acciones...">{{ old('observaciones') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;gap:12px;margin-top:8px">
                            <button type="submit" class="btn-vt"><i class="bi bi-floppy"></i> Guardar Intervención</button>
                            <a href="{{ route('mantenimientos.index') }}" class="btn-vt-outline">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="vt-card">
                <div class="vt-card-header"><span class="header-title"><i class="bi bi-info-circle me-2"
                            style="color:var(--teal)"></i>Guía Rápida</span></div>
                <div class="vt-card-body" style="display:flex;flex-direction:column;gap:14px">
                    <div
                        style="background:rgba(29,184,154,0.07);border:1px solid rgba(29,184,154,0.15);border-radius:8px;padding:14px">
                        <div style="font-size:12px;font-weight:700;color:var(--teal);margin-bottom:6px"><i
                                class="bi bi-tools"></i> Preventivo</div>
                        <div style="font-size:12px;color:var(--text-muted)">Mantenimiento planificado para prevenir fallos
                            futuros. Inspeciones, lubricaciones, calibraciones.</div>
                    </div>
                    <div
                        style="background:rgba(224,160,60,0.07);border:1px solid rgba(224,160,60,0.15);border-radius:8px;padding:14px">
                        <div style="font-size:12px;font-weight:700;color:var(--warning);margin-bottom:6px"><i
                                class="bi bi-wrench-adjustable"></i> Correctivo</div>
                        <div style="font-size:12px;color:var(--text-muted)">Reparación de una falla ya ocurrida. Incluye
                            sustitución de piezas, diagnóstico y corrección.</div>
                    </div>
                    <hr style="border-color:var(--border)">
                    <div style="font-size:11px;color:var(--text-muted);line-height:1.7">
                        <i class="bi bi-lightbulb" style="color:var(--teal)"></i>
                        Si la intervención ya fue completada, establece la "Fecha Realizada" y el estado en <strong
                            style="color:var(--success)">Completado</strong>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
