<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones — ValleTech</title>
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
            --teal-dim: #157a68;
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
            min-height: 100vh;
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

        .toc {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 24px 28px;
            margin-bottom: 40px;
        }

        .toc h3 {
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 14px;
            font-weight: 700;
        }

        .toc ol {
            padding-left: 20px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .toc a {
            color: var(--teal);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .toc a:hover {
            text-decoration: underline;
        }

        .section {
            margin-bottom: 40px;
            scroll-margin-top: 20px;
        }

        .section h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-primary);
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

        .highlight-box {
            background: rgba(29, 184, 154, 0.07);
            border: 1px solid rgba(29, 184, 154, 0.2);
            border-radius: 8px;
            padding: 16px 20px;
            margin: 16px 0;
            font-size: 13px;
            color: var(--teal);
        }

        .warning-box {
            background: rgba(224, 92, 107, 0.07);
            border: 1px solid rgba(224, 92, 107, 0.2);
            border-radius: 8px;
            padding: 16px 20px;
            margin: 16px 0;
            font-size: 13px;
            color: #e05c6b;
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
            <a href="{{ route('login') }}" class="topbar-back"><i class="bi bi-arrow-left"></i> Volver al inicio</a>
        @endauth
    </header>

    <div class="hero">
        <div class="hero-badge"><i class="bi bi-shield-check"></i> Documento Legal</div>
        <h1>Términos y Condiciones</h1>
        <p>Por favor, lea detenidamente estos términos antes de utilizar el sistema ValleTech CMMS. Al acceder, acepta
            estas condiciones.</p>
    </div>

    <div class="container">

        <div class="toc">
            <h3><i class="bi bi-list-ul"></i> Índice de contenidos</h3>
            <ol>
                <li><a href="#aceptacion">Aceptación de los términos</a></li>
                <li><a href="#uso">Uso del sistema</a></li>
                <li><a href="#cuentas">Cuentas y acceso</a></li>
                <li><a href="#datos">Propiedad de los datos</a></li>
                <li><a href="#prohibiciones">Usos prohibidos</a></li>
                <li><a href="#responsabilidad">Limitación de responsabilidad</a></li>
                <li><a href="#privacidad">Privacidad</a></li>
                <li><a href="#modificaciones">Modificaciones</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ol>
        </div>

        <div class="section" id="aceptacion">
            <h2><i class="bi bi-file-check"></i> 1. Aceptación de los Términos</h2>
            <p>Al acceder y utilizar el Sistema de Gestión de Mantenimiento Industrial (CMMS) de ValleTech, usted acepta
                estar sujeto a estos Términos y Condiciones. Si no está de acuerdo con alguna parte de estos términos,
                no podrá acceder al servicio.</p>
            <div class="highlight-box"><i class="bi bi-info-circle"></i> Última actualización:
                {{ date('d \d\e F \d\e Y') }}. Estos términos son efectivos para todos los usuarios registrados del
                sistema.</div>
        </div>

        <div class="section" id="uso">
            <h2><i class="bi bi-gear"></i> 2. Uso del Sistema</h2>
            <p>ValleTech CMMS es una plataforma de gestión de mantenimiento industrial diseñada para uso profesional
                dentro de organizaciones autorizadas. El sistema permite:</p>
            <ul>
                <li>Registro y seguimiento de equipos e activos industriales</li>
                <li>Programación y registro de intervenciones de mantenimiento</li>
                <li>Gestión del personal técnico y asignación de tareas</li>
                <li>Generación de reportes y análisis de desempeño</li>
                <li>Control de acceso basado en roles de usuario</li>
            </ul>
            <p>El uso del sistema debe ser exclusivamente para los fines establecidos por su organización. Cualquier uso
                fuera del contexto profesional autorizado está prohibido.</p>
        </div>

        <div class="section" id="cuentas">
            <h2><i class="bi bi-person-badge"></i> 3. Cuentas y Acceso</h2>
            <p>Para acceder al sistema, debe poseer credenciales válidas proporcionadas por un administrador autorizado.
                Usted es responsable de:</p>
            <ul>
                <li>Mantener la confidencialidad de su contraseña y credenciales de acceso</li>
                <li>Todas las actividades realizadas bajo su cuenta de usuario</li>
                <li>Notificar inmediatamente al administrador ante cualquier uso no autorizado de su cuenta</li>
                <li>No compartir sus credenciales con terceros</li>
            </ul>
            <p>ValleTech recomienda activar la Autenticación de Dos Factores (2FA) para mayor seguridad de su cuenta.
            </p>
        </div>

        <div class="section" id="datos">
            <h2><i class="bi bi-database"></i> 4. Propiedad de los Datos</h2>
            <p>Todos los datos ingresados al sistema (registros de equipos, mantenimientos, personal técnico) son
                propiedad de la organización que opera la instancia del sistema. ValleTech no reclama propiedad sobre
                estos datos.</p>
            <p>La organización es responsable de mantener copias de seguridad de su información y de garantizar la
                exactitud de los datos ingresados al sistema.</p>
        </div>

        <div class="section" id="prohibiciones">
            <h2><i class="bi bi-slash-circle"></i> 5. Usos Prohibidos</h2>
            <p>Queda estrictamente prohibido:</p>
            <ul>
                <li>Intentar acceder a funcionalidades o datos sin autorización</li>
                <li>Modificar, copiar o distribuir el código fuente del sistema sin autorización</li>
                <li>Utilizar el sistema para actividades ilícitas o que violen leyes vigentes</li>
                <li>Introducir malware, virus u otro software malicioso</li>
                <li>Realizar ataques de fuerza bruta o intentos de intrusión</li>
                <li>Suplantar la identidad de otro usuario</li>
            </ul>
            <div class="warning-box"><i class="bi bi-exclamation-triangle"></i> El incumplimiento de estas prohibiciones
                puede resultar en la suspensión inmediata del acceso y acciones legales correspondientes.</div>
        </div>

        <div class="section" id="responsabilidad">
            <h2><i class="bi bi-shield-exclamation"></i> 6. Limitación de Responsabilidad</h2>
            <p>ValleTech no será responsable por daños directos, indirectos, incidentales o consecuentes derivados del
                uso o la imposibilidad de uso del sistema, incluyendo pero no limitado a pérdida de datos o interrupción
                de operaciones.</p>
            <p>El sistema se proporciona "tal cual" y ValleTech no garantiza que el servicio sea ininterrumpido, libre
                de errores o completamente seguro.</p>
        </div>

        <div class="section" id="privacidad">
            <h2><i class="bi bi-lock"></i> 7. Privacidad</h2>
            <p>El tratamiento de datos personales en el sistema se rige por nuestra <a
                    href="{{ route('legal.cookies') }}" style="color:var(--teal)">Política de Cookies y Privacidad</a>.
                Al utilizar el sistema, acepta dicha política.</p>
        </div>

        <div class="section" id="modificaciones">
            <h2><i class="bi bi-pencil-square"></i> 8. Modificaciones</h2>
            <p>ValleTech se reserva el derecho de modificar estos términos en cualquier momento. Los cambios entrarán en
                vigor a partir de su publicación en el sistema. El uso continuado del sistema tras la publicación de
                cambios constituye aceptación de los nuevos términos.</p>
        </div>

        <div class="section" id="contacto">
            <h2><i class="bi bi-envelope"></i> 9. Contacto</h2>
            <p>Para consultas relacionadas con estos Términos y Condiciones, puede contactar al administrador del
                sistema a través de los canales oficiales de su organización.</p>
            <div class="highlight-box"><i class="bi bi-building"></i> ValleTech Industrial Management System — Versión
                {{ date('Y') }}. Estos términos aplican a todos los usuarios de la plataforma.</div>
        </div>

    </div>

    <footer class="footer">
        &copy; {{ date('Y') }} ValleTech CMMS · <a href="{{ route('legal.cookies') }}">Política de Cookies</a> · <a
            href="{{ route('legal.terminos') }}">Términos y Condiciones</a>
        @auth · <a href="{{ route('dashboard') }}">Volver al sistema</a>@endauth
    </footer>
</body>

</html>
