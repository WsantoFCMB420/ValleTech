<!DOCTYPE html>
<html lang="es" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <title>Verificar Correo — ValleTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        (function() {
            var t = localStorage.getItem('vt-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root, [data-theme="dark"] {
            --bg-base: #080f1a;
            --bg-card: #0f1e30;
            --border: rgba(255, 255, 255, 0.07);
            --teal: #1db89a;
            --teal-dim: #157a68;
            --text-primary: #dce8f0;
            --text-muted: #6b8299;
        }

        [data-theme="light"] {
            --bg-base: #f0f2f5;
            --bg-card: #ffffff;
            --border: rgba(0, 0, 0, 0.08);
            --teal: #14957e;
            --teal-dim: #11806c;
            --text-primary: #1a2332;
            --text-muted: #5a6a7e;
        }

        html.theme-transition, html.theme-transition *, html.theme-transition *::before, html.theme-transition *::after {
            transition: background-color .35s ease, color .35s ease, border-color .35s ease !important;
        }

        body {
            background-color: var(--bg-base);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card-header-vt {
            background-color: var(--teal-dim);
            color: #fff;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
        }

        .card-body {
            color: var(--text-primary);
        }

        .btn-vt {
            background-color: var(--teal);
            color: #fff;
            border: none;
        }

        .btn-vt:hover {
            background-color: var(--teal-dim);
            color: #fff;
        }

        .logo-title {
            color: var(--text-primary);
            letter-spacing: 2px;
        }

        .logo-sub {
            color: var(--text-muted);
            font-size: 0.75rem;
            letter-spacing: 3px;
        }

        .text-muted {
            color: var(--text-muted) !important;
        }

        .vt-theme-float-switch { position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;align-items:center;gap:8px;background:rgba(10,21,37,.85);backdrop-filter:blur(10px);padding:6px 10px 6px 14px;border-radius:20px;border:1px solid rgba(255,255,255,.1);box-shadow:0 4px 20px rgba(0,0,0,.3) }
        .vt-theme-float-switch .switch-label { font-size:11px;font-weight:700;color:rgba(255,255,255,.6);letter-spacing:.5px }
        .vt-theme-switch-mini { position:relative;display:inline-flex;align-items:center;cursor:pointer }
        .vt-theme-switch-mini input { opacity:0;width:0;height:0;position:absolute }
        .vt-switch-track-mini { width:44px;height:24px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:12px;position:relative;transition:background .3s;display:flex;align-items:center;padding:0 5px;justify-content:space-between }
        .vt-switch-track-mini .icon-moon,.vt-switch-track-mini .icon-sun { font-size:11px;z-index:1;color:rgba(255,255,255,.5) }
        .vt-switch-track-mini::after { content:'';width:18px;height:18px;background:#1db89a;border-radius:50%;position:absolute;top:2px;left:3px;transition:transform .3s cubic-bezier(.4,0,.2,1);box-shadow:0 2px 6px rgba(0,0,0,.3) }
        .vt-theme-switch-mini input:checked + .vt-switch-track-mini::after { transform:translateX(20px) }
    </style>
</head>

<body>
    <div class="container" style="max-width:480px">
        <div class="text-center mb-4">
            <h2 class="fw-bold logo-title">VALLETECH</h2>
            <p class="logo-sub">SERVICE AND REPAIR</p>
        </div>

        <div class="card shadow">
            <div class="card-header card-header-vt">
                <h5 class="mb-0">Verificar Correo Electrónico</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">
                    ¡Gracias por registrarte! Antes de continuar, verifica tu correo haciendo clic en el enlace que te
                    enviamos. Si no lo recibiste, podemos enviarte otro.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success small">
                        Se ha enviado un nuevo enlace de verificación a tu correo.
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-vt btn-sm">
                            Reenviar correo de verificación
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link btn-sm text-muted">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="vt-theme-float-switch">
        <span class="switch-label">Tema</span>
        <label class="vt-theme-switch-mini">
            <input type="checkbox" id="theme-checkbox">
            <span class="vt-switch-track-mini">
                <i class="bi bi-moon-stars icon-moon"></i>
                <i class="bi bi-sun-fill icon-sun"></i>
            </span>
        </label>
    </div>

    <script>
        (function() {
            var html = document.documentElement;
            var cb = document.getElementById('theme-checkbox');
            cb.checked = (localStorage.getItem('vt-theme') === 'light');
            cb.addEventListener('change', function() {
                html.classList.add('theme-transition');
                var theme = cb.checked ? 'light' : 'dark';
                html.setAttribute('data-theme', theme);
                localStorage.setItem('vt-theme', theme);
                setTimeout(function() { html.classList.remove('theme-transition'); }, 400);
            });
        })();
    </script>
</body>

</html>
