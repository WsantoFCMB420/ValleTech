@extends('layouts.app')
@section('title', 'Mi Perfil')
@section('topbar-title', 'MI PERFIL')

@section('content')

    <div class="vt-page-header">
        <h1>Mi Perfil</h1>
        <p>Gestiona tu información personal, contraseña y seguridad de la cuenta</p>
    </div>

    @if (session('status') === 'profile-updated')
        <div class="vt-alert vt-alert-success mb-4"><i class="bi bi-check-circle"></i> Perfil actualizado correctamente.</div>
    @endif
    @if (session('status') === 'password-updated')
        <div class="vt-alert vt-alert-success mb-4"><i class="bi bi-check-circle"></i> Contraseña actualizada correctamente.
        </div>
    @endif
    @if (session('status') === '2fa-enabled')
        <div class="vt-alert vt-alert-success mb-4"><i class="bi bi-shield-check"></i> Autenticación de dos factores activada.
        </div>
    @endif
    @if (session('status') === '2fa-disabled')
        <div class="vt-alert vt-alert-warning mb-4"><i class="bi bi-shield-exclamation"></i> Autenticación de dos factores
            desactivada.</div>
    @endif

    <div class="row g-4">
        <div class="col-lg-7">

            {{-- Información Personal --}}
            <div class="vt-card mb-4">
                <div class="vt-card-header">
                    <span class="header-title"><i class="bi bi-person-circle me-2" style="color:var(--teal)"></i>Información
                        Personal</span>
                </div>
                <div class="vt-card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf @method('patch')
                        <div class="vt-form-group">
                            <label class="vt-label">Nombre completo</label>
                            <input type="text" name="name" class="vt-input"
                                value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <div style="color:#e05c6b;font-size:12px;margin-top:5px"><i
                                        class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Correo electrónico</label>
                            <input type="email" name="email" class="vt-input"
                                value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <div style="color:#e05c6b;font-size:12px;margin-top:5px"><i
                                        class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn-vt">
                            <i class="bi bi-floppy"></i> Guardar cambios
                        </button>
                    </form>
                </div>
            </div>

            {{-- Cambiar Contraseña --}}
            <div class="vt-card mb-4">
                <div class="vt-card-header">
                    <span class="header-title"><i class="bi bi-lock me-2" style="color:var(--teal)"></i>Cambiar
                        Contraseña</span>
                </div>
                <div class="vt-card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf @method('put')
                        <div class="vt-form-group">
                            <label class="vt-label">Contraseña actual</label>
                            <input type="password" name="current_password" class="vt-input">
                            @error('current_password')
                                <div style="color:#e05c6b;font-size:12px;margin-top:5px"><i
                                        class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Nueva contraseña</label>
                            <input type="password" name="password" class="vt-input">
                            @error('password')
                                <div style="color:#e05c6b;font-size:12px;margin-top:5px"><i
                                        class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="vt-form-group">
                            <label class="vt-label">Confirmar nueva contraseña</label>
                            <input type="password" name="password_confirmation" class="vt-input">
                        </div>
                        <button type="submit" class="btn-vt">
                            <i class="bi bi-key"></i> Actualizar contraseña
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-5">

            {{-- 2FA --}}
            <div class="vt-card mb-4">
                <div class="vt-card-header">
                    <span class="header-title"><i class="bi bi-shield-lock me-2" style="color:var(--teal)"></i>Autenticación
                        2FA</span>
                    @if (auth()->user()->google2fa_secret)
                        <span class="vt-badge badge-success"><i class="bi bi-circle-fill" style="font-size:6px"></i>
                            ACTIVO</span>
                    @else
                        <span class="vt-badge badge-muted"><i class="bi bi-circle-fill" style="font-size:6px"></i>
                            INACTIVO</span>
                    @endif
                </div>
                <div class="vt-card-body">
                    @if (auth()->user()->google2fa_secret)
                        <p style="font-size:13px;color:var(--text-muted);margin-bottom:16px">
                            Tu cuenta está protegida con autenticación de dos factores. Necesitarás tu aplicación de
                            autenticación cada vez que inicies sesión.
                        </p>
                        <form method="POST" action="{{ route('2fa.disable') }}"
                            onsubmit="return confirm('¿Desactivar la autenticación de dos factores? Esto reduce la seguridad de tu cuenta.')">
                            @csrf
                            <button type="submit" class="btn-vt-danger">
                                <i class="bi bi-shield-x"></i> Desactivar 2FA
                            </button>
                        </form>
                    @else
                        <p style="font-size:13px;color:var(--text-muted);margin-bottom:16px">
                            Añade una capa extra de seguridad. Con 2FA necesitarás un código de tu app autenticadora (Google
                            Authenticator, Authy) para iniciar sesión.
                        </p>

                        @if (session('2fa_temp_secret'))
                            <div
                                style="background:rgba(29,184,154,0.08);border:1px solid rgba(29,184,154,0.2);border-radius:10px;padding:18px;margin-bottom:16px">
                                <p style="font-size:13px;font-weight:700;color:var(--teal);margin-bottom:12px">
                                    <i class="bi bi-qr-code"></i> Paso 1: Escanea el código QR
                                </p>
                                <div
                                    style="text-align:center;background:#fff;padding:16px;border-radius:8px;display:inline-block;margin-bottom:12px">
                                    {!! \App\Http\Controllers\TwoFactorController::getQRCodeSvg(auth()->user(), session('2fa_temp_secret')) !!}
                                </div>
                                <p style="font-size:11px;color:var(--text-muted);margin-bottom:4px">O ingresa manualmente:
                                </p>
                                <code
                                    style="font-size:12px;background:rgba(255,255,255,0.05);padding:4px 8px;border-radius:4px;color:var(--teal)">{{ session('2fa_temp_secret') }}</code>

                                <hr style="border-color:rgba(255,255,255,0.08);margin:16px 0">

                                <p style="font-size:13px;font-weight:700;color:var(--text-primary);margin-bottom:10px">
                                    Paso 2: Confirma con tu código
                                </p>
                                <form method="POST" action="{{ route('2fa.enable') }}">
                                    @csrf
                                    <div class="vt-form-group">
                                        <input type="text" name="code" class="vt-input"
                                            placeholder="Código de 6 dígitos" maxlength="6" required autofocus
                                            style="text-align:center;font-size:22px;letter-spacing:6px;font-weight:700">
                                        @error('code')
                                            <div style="color:#e05c6b;font-size:12px;margin-top:5px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn-vt" style="width:100%">
                                        <i class="bi bi-shield-check"></i> Confirmar y Activar
                                    </button>
                                </form>
                            </div>
                        @else
                            <form method="POST" action="{{ route('2fa.generate') }}">
                                @csrf
                                <button type="submit" class="btn-vt-outline" style="width:100%">
                                    <i class="bi bi-qr-code"></i> Configurar 2FA
                                </button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>

            {{-- Zona de peligro --}}
            <div class="vt-card" style="border-color:rgba(224,92,107,0.25)">
                <div class="vt-card-header" style="border-color:rgba(224,92,107,0.2)">
                    <span class="header-title" style="color:var(--danger)"><i
                            class="bi bi-exclamation-triangle me-2"></i>Zona de Peligro</span>
                </div>
                <div class="vt-card-body">
                    <p style="font-size:13px;color:var(--text-muted);margin-bottom:16px">
                        Una vez eliminada tu cuenta, todos los datos serán borrados permanentemente y no podrán recuperarse.
                    </p>
                    <form method="POST" action="{{ route('profile.destroy') }}"
                        onsubmit="return confirm('¿Estás completamente seguro? Esta acción es IRREVERSIBLE.')">
                        @csrf @method('delete')
                        <div class="vt-form-group">
                            <label class="vt-label">Confirma tu contraseña para continuar</label>
                            <input type="password" name="password" class="vt-input" placeholder="Tu contraseña actual">
                            @error('password', 'userDeletion')
                                <div style="color:#e05c6b;font-size:12px;margin-top:5px">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn-vt-danger" style="width:100%">
                            <i class="bi bi-trash3"></i> Eliminar mi cuenta
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
