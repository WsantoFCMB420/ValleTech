<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña — ValleTech CMMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root{--bg-base:#080f1a;--bg-card:#0f1e30;--bg-input:#0d1a28;--border:rgba(255,255,255,.07);--border-bright:rgba(255,255,255,.14);--teal:#1db89a;--teal-dim:#157a68;--teal-glow:rgba(29,184,154,.18);--text-primary:#dce8f0;--text-muted:#6b8299;--text-faint:#3d5568}
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Darker Grotesque',sans-serif;background:var(--bg-base);color:var(--text-primary);min-height:100vh;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden}
        body::before{content:'';position:absolute;width:500px;height:500px;background:radial-gradient(circle,rgba(29,184,154,.08) 0%,transparent 70%);top:-150px;left:-100px;border-radius:50%;pointer-events:none}
        body::after{content:'';position:absolute;width:400px;height:400px;background:radial-gradient(circle,rgba(29,184,154,.05) 0%,transparent 70%);bottom:-100px;right:-80px;border-radius:50%;pointer-events:none}
        .reset-container{width:100%;max-width:440px;padding:24px;position:relative;z-index:1}
        .reset-brand{text-align:center;margin-bottom:36px}
        .reset-brand-icon{width:56px;height:56px;background:var(--teal);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:900;color:#fff;margin:0 auto 16px;box-shadow:0 8px 32px rgba(29,184,154,.3)}
        .reset-brand h1{font-size:22px;font-weight:900;letter-spacing:4px;text-transform:uppercase;color:var(--text-primary);margin-bottom:4px}
        .reset-brand p{font-size:11px;letter-spacing:3px;text-transform:uppercase;color:var(--text-muted)}
        .reset-card{background:var(--bg-card);border:1px solid var(--border);border-radius:16px;padding:36px 32px;box-shadow:0 4px 40px rgba(0,0,0,.3)}
        .reset-title{font-size:20px;font-weight:800;margin-bottom:4px;color:var(--text-primary);display:flex;align-items:center;gap:10px}
        .reset-title i{font-size:22px;color:var(--teal)}
        .reset-subtitle{font-size:13px;color:var(--text-muted);margin-bottom:28px;line-height:1.5}
        .vt-label{display:block;margin-bottom:6px;font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--text-muted)}
        .vt-input{width:100%;padding:11px 14px;background:var(--bg-input);border:1px solid var(--border-bright);border-radius:8px;color:var(--text-primary);font-family:'Darker Grotesque',sans-serif;font-size:15px;transition:border-color .2s,box-shadow .2s;outline:none}
        .vt-input:focus{border-color:var(--teal-dim);box-shadow:0 0 0 3px var(--teal-glow)}
        .vt-input::placeholder{color:var(--text-faint)}
        .form-group{margin-bottom:18px}
        .input-wrapper{position:relative}
        .input-wrapper .toggle-password{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text-muted);cursor:pointer;font-size:16px;padding:4px;transition:color .2s}
        .input-wrapper .toggle-password:hover{color:var(--teal)}
        .text-danger-vt{font-size:12px;color:#e05c6b;margin-top:5px;display:flex;align-items:center;gap:4px}
        .btn-reset{width:100%;padding:13px;background:var(--teal);border:none;border-radius:8px;color:#fff;font-family:'Darker Grotesque',sans-serif;font-size:15px;font-weight:800;letter-spacing:.5px;cursor:pointer;transition:all .2s;margin-top:8px;display:flex;align-items:center;justify-content:center;gap:8px}
        .btn-reset:hover{background:#17a086;transform:translateY(-1px);box-shadow:0 4px 20px rgba(29,184,154,.3)}
        .btn-reset:active{transform:translateY(0)}
        .password-hint{display:flex;align-items:center;gap:6px;margin-top:6px;font-size:11px;color:var(--text-faint)}
        .reset-footer{margin-top:24px;text-align:center;font-size:13px;color:var(--text-muted)}
        .reset-footer a{color:var(--teal);text-decoration:none;font-weight:700;transition:color .2s}
        .reset-footer a:hover{color:#25d4b2;text-decoration:underline}
        @media(max-width:480px){.reset-card{padding:28px 20px}.reset-container{padding:16px}}
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-brand">
            <div class="reset-brand-icon">VT</div>
            <h1>ValleTech</h1>
            <p>Industrial Management System</p>
        </div>
        <div class="reset-card">
            <div class="reset-title"><i class="bi bi-key"></i> Restablecer Contraseña</div>
            <p class="reset-subtitle">Crea una nueva contraseña segura para tu cuenta.</p>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form-group">
                    <label class="vt-label" for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="vt-input" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="usuario@empresa.com">
                    @error('email')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="vt-label" for="password">Nueva contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" class="vt-input" required autocomplete="new-password" placeholder="••••••••">
                        <button type="button" class="toggle-password" onclick="togglePassword('password',this)"><i class="bi bi-eye"></i></button>
                    </div>
                    @error('password')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                    <div class="password-hint"><i class="bi bi-info-circle"></i> Mínimo 8 caracteres</div>
                </div>
                <div class="form-group">
                    <label class="vt-label" for="password_confirmation">Confirmar contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="vt-input" required autocomplete="new-password" placeholder="••••••••">
                        <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation',this)"><i class="bi bi-eye"></i></button>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger-vt"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn-reset"><i class="bi bi-shield-lock"></i> Restablecer Contraseña</button>
            </form>
            <div class="reset-footer">
                <a href="{{ route('login') }}"><i class="bi bi-arrow-left"></i> Volver al inicio de sesión</a>
            </div>
        </div>
    </div>
    <script>
        function togglePassword(id,btn){const i=document.getElementById(id),ic=btn.querySelector('i');if(i.type==='password'){i.type='text';ic.classList.replace('bi-eye','bi-eye-slash')}else{i.type='password';ic.classList.replace('bi-eye-slash','bi-eye')}}
    </script>
</body>
</html>
