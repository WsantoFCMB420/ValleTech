<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Cookies — ValleTech</title>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --bg-base: #080f1a;
            --bg-card: #0f1e30;
            --border: rgba(255, 255, 255, 0.07);
            --border-bright: rgba(255, 255, 255, 0.14);
            --teal: #1db89a;
            --text-primary: #dce8f0;
            --text-muted: #6b8299;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Darker Grotesque', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
        }

        .topbar {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
            padding: 14px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .topbar-icon {
            width: 34px;
            height: 34px;
            background: var(--teal);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 14px;
            color: #fff;
        }

        .topbar-name {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 2px;
            color: var(--text-primary);
            text-transform: uppercase;
        }

        .topbar-back {
            font-size: 13px;
            color: var(--teal);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .topbar-back:hover {
            text-decoration: underline;
        }

        .hero {
            background: linear-gradient(135deg, #0a1525, #0f2a3a);
            border-bottom: 1px solid var(--border);
            padding: 60px 40px;
            text-align: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(29, 184, 154, 0.1);
            border: 1px solid rgba(29, 184, 154, 0.25);
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: var(--teal);
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .hero p {
            font-size: 14px;
            color: var(--text-muted);
            max-width: 560px;
            margin: 0 auto;
        }

        .container {
            max-width: 820px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section h2 i {
            color: var(--teal);
            font-size: 18px;
        }

        .section p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .section ul {
            padding-left: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 12px;
        }

        .section li {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* Cookie type table */
        .cookie-table {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
        }

        .cookie-table th {
            padding: 10px 14px;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #3d5568;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
            text-align: left;
        }

        .cookie-table td {
            padding: 12px 14px;
            font-size: 13px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        .cookie-table tbody tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .cookie-name {
            font-weight: 700;
            color: var(--text-primary);
            font-family: monospace;
            font-size: 12px;
        }

        .badge-necessary {
            background: rgba(29, 184, 154, 0.15);
            color: var(--teal);
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 700;
        }

        .badge-functional {
            background: rgba(58, 176, 219, 0.15);
            color: #3ab0db;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 700;
        }

        .highlight-box {
            background: rgba(29, 184, 154, 0.07);
            border: 1px solid rgba(29, 184, 154, 0.2);
            border-radius: 8px;
            padding: 16px 20px;
            margin: 16px 0;
            font-size: 13px;
            color: var(--teal);
        }

        /* Consent toggle visual */
        .consent-panel {
            background: var(--bg-card);
            border: 1px solid var(--border-bright);
            border-radius: 12px;
            padding: 24px;
            margin-top: 24px;
        }

        .consent-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
        }

        .consent-row:last-child {
            border-bottom: none;
        }

        .consent-info h4 {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .consent-info p {
            font-size: 12px;
            color: var(--text-muted);
            margin: 0;
        }

        .toggle-required {
            font-size: 11px;
            font-weight: 700;
            color: var(--teal);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .footer {
            border-top: 1px solid var(--border);
            padding: 28px 40px;
            text-align: center;
            font-size: 12px;
            color: var(--text-muted);
        }

        .footer a {
            color: var(--teal);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header class="topbar">
        <a href="/" class="topbar-brand">
            <div class="topbar-icon">VT</div>
            <span class="topbar-name">ValleTech</span>
        </a>
        @auth
            <a href="{{ route('dashboard') }}" class="topbar-back"><i class="bi bi-arrow-left"></i> Volver al sistema</a>
        @else
            <a href="{{ route('login') }}" class="topbar-back"><i class="bi bi-arrow-left"></i> Iniciar sesión</a>
        @endauth
    </header>

    <div class="hero">
        <div class="hero-badge"><i class="bi bi-cookie"></i> Política de Privacidad</div>
        <h1>Política de Cookies</h1>
        <p>Información transparente sobre cómo ValleTech CMMS utiliza cookies para garantizar el correcto funcionamiento
            del sistema.</p>
    </div>

    <div class="container">

        <div class="section">
            <h2><i class="bi bi-info-circle"></i> ¿Qué son las cookies?</h2>
            <p>Las cookies son pequeños archivos de texto que se almacenan en su dispositivo cuando visita un sitio web
                o utiliza una aplicación web. Permiten que el sistema recuerde sus preferencias y estado de sesión entre
                visitas.</p>
            <div class="highlight-box"><i class="bi bi-clock-history"></i> Última actualización:
                {{ date('d \d\e F \d\e Y') }}. Esta política aplica exclusivamente al sistema ValleTech CMMS.</div>
        </div>

        <div class="section">
            <h2><i class="bi bi-cookie"></i> Cookies que utilizamos</h2>
            <p>ValleTech CMMS utiliza únicamente cookies estrictamente necesarias para el funcionamiento del sistema. No
                utilizamos cookies de seguimiento ni publicidad de terceros.</p>

            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Duración</th>
                        <th>Propósito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="cookie-name">valletech_session</span></td>
                        <td><span class="badge-necessary">Necesaria</span></td>
                        <td>Sesión</td>
                        <td>Mantiene la sesión del usuario autenticado</td>
                    </tr>
                    <tr>
                        <td><span class="cookie-name">XSRF-TOKEN</span></td>
                        <td><span class="badge-necessary">Necesaria</span></td>
                        <td>Sesión</td>
                        <td>Protección contra ataques CSRF en formularios</td>
                    </tr>
                    <tr>
                        <td><span class="cookie-name">cookies_accepted</span></td>
                        <td><span class="badge-functional">Funcional</span></td>
                        <td>1 año</td>
                        <td>Recuerda si el usuario aceptó esta política</td>
                    </tr>
                    <tr>
                        <td><span class="cookie-name">remember_web_*</span></td>
                        <td><span class="badge-functional">Funcional</span></td>
                        <td>30 días</td>
                        <td>Recuerda las credenciales si seleccionó "Recordarme"</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2><i class="bi bi-shield-check"></i> Gestión del consentimiento</h2>
            <p>A continuación se muestra un resumen de los tipos de cookies y su estado. Las cookies necesarias no
                pueden desactivarse ya que son imprescindibles para el funcionamiento del sistema.</p>

            <div class="consent-panel">
                <div class="consent-row">
                    <div class="consent-info">
                        <h4>Cookies estrictamente necesarias</h4>
                        <p>Esenciales para la autenticación, seguridad y navegación del sistema. No pueden desactivarse.
                        </p>
                    </div>
                    <span class="toggle-required"><i class="bi bi-lock-fill"></i> Siempre activas</span>
                </div>
                <div class="consent-row">
                    <div class="consent-info">
                        <h4>Cookies funcionales</h4>
                        <p>Mejoran la experiencia de uso recordando preferencias como el estado de sesión persistente.
                        </p>
                    </div>
                    <span class="toggle-required" style="color:#3ab0db"><i class="bi bi-check-circle-fill"></i>
                        Activas</span>
                </div>
                <div class="consent-row">
                    <div class="consent-info">
                        <h4>Cookies de análisis y publicidad</h4>
                        <p>ValleTech CMMS no utiliza cookies de análisis externo ni publicidad.</p>
                    </div>
                    <span class="toggle-required" style="color:#3d5568"><i class="bi bi-x-circle-fill"></i> No
                        usadas</span>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="bi bi-trash3"></i> Cómo eliminar las cookies</h2>
            <p>Puede gestionar y eliminar las cookies desde la configuración de su navegador:</p>
            <ul>
                <li><strong style="color:var(--text-primary)">Google Chrome:</strong> Configuración → Privacidad y
                    seguridad → Cookies y otros datos de sitios</li>
                <li><strong style="color:var(--text-primary)">Mozilla Firefox:</strong> Opciones → Privacidad y
                    Seguridad → Cookies y datos del sitio</li>
                <li><strong style="color:var(--text-primary)">Microsoft Edge:</strong> Configuración → Cookies y
                    permisos de sitio</li>
                <li><strong style="color:var(--text-primary)">Safari:</strong> Preferencias → Privacidad → Gestionar
                    datos del sitio web</li>
            </ul>
            <p>Tenga en cuenta que eliminar las cookies de sesión cerrará su sesión en el sistema y deberá volver a
                autenticarse.</p>
        </div>

        <div class="section">
            <h2><i class="bi bi-person-lock"></i> Sus derechos</h2>
            <p>De acuerdo con la legislación vigente de protección de datos, usted tiene derecho a:</p>
            <ul>
                <li>Acceder a la información personal que el sistema almacena sobre usted</li>
                <li>Solicitar la rectificación de datos incorrectos</li>
                <li>Solicitar la eliminación de su cuenta y datos personales</li>
                <li>Oponerse al procesamiento de sus datos</li>
            </ul>
            <p>Para ejercer estos derechos, contacte al administrador del sistema a través de los canales oficiales de
                su organización.</p>
        </div>

        <div class="section">
            <h2><i class="bi bi-arrow-repeat"></i> Cambios en esta política</h2>
            <p>ValleTech se reserva el derecho de actualizar esta Política de Cookies. Le notificaremos sobre cambios
                significativos mediante un aviso visible en el sistema. El uso continuado del sistema tras los cambios
                implica su aceptación.</p>
        </div>

    </div>

    <footer class="footer">
        &copy; {{ date('Y') }} ValleTech CMMS · <a href="{{ route('legal.cookies') }}">Política de Cookies</a> · <a
            href="{{ route('legal.terminos') }}">Términos y Condiciones</a>
        @auth · <a href="{{ route('dashboard') }}">Volver al sistema</a>@endauth
    </footer>
</body>

</html>
