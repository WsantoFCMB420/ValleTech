<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ValleTech — Service and Repair</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --teal-dark:  #0E3C42;
            --teal-mid:   #0C2D38;
            --teal-light: #4db8c8;
            --teal-muted: #a0c4cc;
            --teal-faint: #1a4f57;
            --text-dim:   #6b9ca5;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            background-color: var(--teal-dark);
            font-family: 'DM Sans', sans-serif;
            color: #fff;
            overflow-x: hidden;
        }

        /* ── CIRCUIT BACKGROUND ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(77,184,200,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(77,184,200,.04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 0;
        }

        /* ── NAVBAR ── */
        .vt-nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2.5rem;
            background: rgba(12,29,38,.72);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(77,184,200,.12);
        }

        .nav-logo { font-family: 'Exo 2', sans-serif; font-weight: 900; font-size: 1.25rem; letter-spacing: 3px; color: #fff; text-decoration: none; }
        .nav-logo span { color: var(--teal-light); }
        .nav-sub { font-size: .6rem; letter-spacing: 4px; color: var(--text-dim); display: block; margin-top: -2px; }

        .nav-links { display: flex; gap: .5rem; align-items: center; }

        /* ── BUTTONS ── */
        .btn-vt {
            background: transparent;
            color: #fff;
            border: 1.5px solid var(--teal-light);
            padding: .55rem 1.6rem;
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: .875rem;
            text-decoration: none;
            transition: background .2s, color .2s;
            letter-spacing: .5px;
        }
        .btn-vt:hover { background: var(--teal-light); color: var(--teal-dark); }
        .btn-vt-solid {
            background: var(--teal-light);
            color: var(--teal-dark);
            border: 1.5px solid var(--teal-light);
            padding: .55rem 1.6rem;
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: .875rem;
            text-decoration: none;
            transition: opacity .2s;
            letter-spacing: .5px;
        }
        .btn-vt-solid:hover { opacity: .85; color: var(--teal-dark); }

        /* ── HERO ── */
        .hero {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 6rem 1.5rem 4rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(77,184,200,.1);
            border: 1px solid rgba(77,184,200,.25);
            border-radius: 999px;
            padding: .35rem 1rem;
            font-size: .75rem;
            color: var(--teal-light);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 2rem;
            animation: fadeUp .6s ease both;
        }

        .hero-badge::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--teal-light);
            box-shadow: 0 0 6px var(--teal-light);
            animation: pulse 2s infinite;
        }

        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.3} }

        .hero-title {
            font-family: 'Exo 2', sans-serif;
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 900;
            line-height: 1;
            letter-spacing: 6px;
            margin-bottom: .5rem;
            animation: fadeUp .7s .1s ease both;
        }
        .hero-title span { color: var(--teal-light); }

        .hero-service {
            font-size: .8rem;
            letter-spacing: 7px;
            color: var(--teal-muted);
            text-transform: uppercase;
            margin-bottom: 1.75rem;
            animation: fadeUp .7s .2s ease both;
        }

        .hero-desc {
            max-width: 520px;
            color: var(--teal-muted);
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            animation: fadeUp .7s .3s ease both;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeUp .7s .4s ease both;
        }

        /* ── SCROLL INDICATOR ── */
        .scroll-hint {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .4rem;
            color: var(--text-dim);
            font-size: .7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: fadeUp .7s .8s ease both;
        }
        .scroll-hint .chevron {
            width: 16px; height: 16px;
            border-right: 1.5px solid var(--text-dim);
            border-bottom: 1.5px solid var(--text-dim);
            transform: rotate(45deg);
            animation: bounce 1.6s infinite;
        }
        @keyframes bounce { 0%,100%{transform:rotate(45deg) translateY(0)} 50%{transform:rotate(45deg) translateY(4px)} }

        /* ── STATS STRIP ── */
        .stats-strip {
            position: relative; z-index: 1;
            background: rgba(12,29,38,.7);
            border-top: 1px solid rgba(77,184,200,.1);
            border-bottom: 1px solid rgba(77,184,200,.1);
            padding: 2rem 0;
        }
        .stat-item { text-align: center; }
        .stat-number {
            font-family: 'Exo 2', sans-serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--teal-light);
            line-height: 1;
        }
        .stat-label { font-size: .75rem; color: var(--text-dim); letter-spacing: 1.5px; text-transform: uppercase; margin-top: .3rem; }
        .stat-divider { width: 1px; background: rgba(77,184,200,.15); align-self: stretch; }

        /* ── FEATURES SECTION ── */
        .section {
            position: relative; z-index: 1;
            padding: 5rem 1.5rem;
        }

        .section-label {
            font-size: .7rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--teal-light);
            margin-bottom: .75rem;
        }

        .section-title {
            font-family: 'Exo 2', sans-serif;
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--teal-muted);
            font-size: .95rem;
            line-height: 1.7;
            max-width: 480px;
        }

        /* Feature cards */
        .feat-card {
            background: rgba(12,29,38,.75);
            border: 1px solid rgba(77,184,200,.12);
            border-radius: 12px;
            padding: 1.75rem;
            transition: border-color .25s, transform .25s;
            height: 100%;
        }
        .feat-card:hover { border-color: rgba(77,184,200,.4); transform: translateY(-4px); }

        .feat-icon {
            width: 44px; height: 44px;
            background: rgba(77,184,200,.1);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.2rem;
        }
        .feat-icon svg { width: 22px; height: 22px; stroke: var(--teal-light); fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

        .feat-card h3 { font-family: 'Exo 2', sans-serif; font-size: 1rem; font-weight: 700; margin-bottom: .6rem; }
        .feat-card p  { color: var(--text-dim); font-size: .875rem; line-height: 1.65; margin: 0; }

        /* ── WORKFLOW STEPS ── */
        .step-num {
            font-family: 'Exo 2', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            color: rgba(77,184,200,.12);
            line-height: 1;
            margin-bottom: .5rem;
        }
        .step-title { font-family: 'Exo 2', sans-serif; font-weight: 700; font-size: 1.1rem; margin-bottom: .5rem; }
        .step-desc  { color: var(--text-dim); font-size: .875rem; line-height: 1.65; }

        .step-connector {
            width: 1px;
            background: linear-gradient(to bottom, rgba(77,184,200,.3), transparent);
            height: 40px;
            margin: .5rem auto;
        }

        /* ── CTA SECTION ── */
        .cta-section {
            position: relative; z-index: 1;
            background: rgba(12,29,38,.9);
            border-top: 1px solid rgba(77,184,200,.1);
            border-bottom: 1px solid rgba(77,184,200,.1);
            padding: 5rem 1.5rem;
            text-align: center;
        }
        .cta-glow {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);
            width: 400px; height: 200px;
            background: radial-gradient(ellipse, rgba(77,184,200,.08) 0%, transparent 70%);
            pointer-events: none;
        }

        /* ── FOOTER ── */
        .vt-footer {
            position: relative; z-index: 1;
            padding: 2rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            border-top: 1px solid rgba(77,184,200,.08);
        }
        .footer-copy { font-size: .75rem; color: var(--text-dim); }
        .footer-links { display: flex; gap: 1.5rem; }
        .footer-links a { font-size: .75rem; color: var(--text-dim); text-decoration: none; transition: color .2s; }
        .footer-links a:hover { color: var(--teal-light); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .reveal { opacity: 0; transform: translateY(24px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.visible { opacity: 1; transform: none; }

        /* ── DIVIDER LINE ── */
        .teal-line {
            width: 40px; height: 3px;
            background: var(--teal-light);
            border-radius: 2px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

    <!-- ─────────────── NAVBAR ─────────────── -->
    <nav class="vt-nav">
        <a href="#" class="nav-logo">
            VALLE<span>TECH</span>
            <span class="nav-sub">Service &amp; Repair</span>
        </a>
        <div class="nav-links">
            <a href="#modulos" class="btn-vt" style="border-color:transparent; color:var(--teal-muted);">Módulos</a>
            <a href="#flujo" class="btn-vt" style="border-color:transparent; color:var(--teal-muted);">¿Cómo funciona?</a>
            <a href="{{ route('login') }}" class="btn-vt">Iniciar Sesión</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-vt-solid">Registrarse</a>
            @endif
        </div>
    </nav>

    <!-- ─────────────── HERO ─────────────── -->
    <section class="hero">
        <div class="hero-badge">Sistema activo</div>

        <h1 class="hero-title">VALLE<span>TECH</span></h1>
        <p class="hero-service">Service and Repair</p>

        <p class="hero-desc">
            Plataforma de gestión de mantenimiento para equipos de cómputo.
            Controla equipos, técnicos e intervenciones desde un solo lugar,
            con trazabilidad completa de cada servicio.
        </p>

        <div class="hero-actions">
            <a href="{{ route('login') }}" class="btn-vt-solid" style="padding:.7rem 2.2rem; font-size:1rem;">
                Ingresar al Sistema
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-vt" style="padding:.7rem 2.2rem; font-size:1rem;">
                    Crear Cuenta
                </a>
            @endif
        </div>

        <div class="scroll-hint">
            <span>Descubrir</span>
            <div class="chevron"></div>
        </div>
    </section>

    <!-- ─────────────── STATS STRIP ─────────────── -->
    <div class="stats-strip reveal">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
                <div class="stat-item">
                    <div class="stat-number">+500</div>
                    <div class="stat-label">Equipos gestionados</div>
                </div>
                <div class="stat-divider d-none d-md-block"></div>
                <div class="stat-item">
                    <div class="stat-number">+120</div>
                    <div class="stat-label">Técnicos registrados</div>
                </div>
                <div class="stat-divider d-none d-md-block"></div>
                <div class="stat-item">
                    <div class="stat-number">+3.2k</div>
                    <div class="stat-label">Intervenciones completadas</div>
                </div>
                <div class="stat-divider d-none d-md-block"></div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Tasa de resolución</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ─────────────── MÓDULOS ─────────────── -->
    <section class="section" id="modulos">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-label">Funcionalidades</div>
                <div class="teal-line mx-auto"></div>
                <h2 class="section-title">Todo lo que necesitas en un solo sistema</h2>
                <p class="section-desc mx-auto">
                    ValleTech centraliza la operación de soporte técnico para que
                    nada se pierda entre reportes y solicitudes.
                </p>
            </div>

            <div class="row g-3 reveal">

                <!-- Equipos -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="feat-card">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                        </div>
                        <h3>Inventario de Equipos</h3>
                        <p>Registra y organiza cada equipo con su número de serie, marca, modelo, estado y ubicación dentro de la empresa.</p>
                    </div>
                </div>

                <!-- Técnicos -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="feat-card">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        </div>
                        <h3>Gestión de Técnicos</h3>
                        <p>Administra el equipo de soporte, asigna roles y lleva un historial de intervenciones por técnico y período.</p>
                    </div>
                </div>

                <!-- Órdenes de trabajo -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="feat-card">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12h6M9 16h4"/></svg>
                        </div>
                        <h3>Órdenes de Trabajo</h3>
                        <p>Crea, asigna y da seguimiento a cada solicitud de mantenimiento, con estados, prioridades y fecha de resolución.</p>
                    </div>
                </div>

                <!-- Historial -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="feat-card">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="9"/></svg>
                        </div>
                        <h3>Historial de Intervenciones</h3>
                        <p>Consulta el historial completo de cada equipo: quién lo atendió, qué se hizo y cuánto tiempo tomó resolverlo.</p>
                    </div>
                </div>

                <!-- Reportes -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="feat-card">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M18 9l-5 5-2-2-5 5"/></svg>
                        </div>
                        <h3>Reportes y Estadísticas</h3>
                        <p>Visualiza métricas clave: tiempo de respuesta, fallas recurrentes, carga por técnico y tendencias de mantenimiento.</p>
                    </div>
                </div>

                <!-- Alertas -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="feat-card">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                        </div>
                        <h3>Alertas de Mantenimiento</h3>
                        <p>Configura recordatorios de mantenimiento preventivo para que ningún equipo supere su ciclo de servicio.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ─────────────── FLUJO DE TRABAJO ─────────────── -->
    <section class="section" id="flujo" style="background: rgba(12,29,38,.5);">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-5 reveal">
                    <div class="section-label">¿Cómo funciona?</div>
                    <div class="teal-line"></div>
                    <h2 class="section-title">De la solicitud<br>a la resolución</h2>
                    <p class="section-desc">
                        Cada intervención sigue un flujo claro y trazable.
                        Desde el reporte inicial hasta el cierre con firma del responsable,
                        ValleTech garantiza que nada quede sin atender.
                    </p>
                </div>

                <div class="col-lg-6 offset-lg-1 reveal">
                    <div class="step">
                        <div class="step-num">01</div>
                        <div class="step-title">Reporte de falla o solicitud</div>
                        <div class="step-desc">El usuario o administrador registra el equipo afectado, describe el problema y asigna una prioridad.</div>
                    </div>
                    <div class="step-connector"></div>

                    <div class="step">
                        <div class="step-num">02</div>
                        <div class="step-title">Asignación al técnico</div>
                        <div class="step-desc">El sistema sugiere al técnico disponible según carga de trabajo. El supervisor confirma y notifica.</div>
                    </div>
                    <div class="step-connector"></div>

                    <div class="step">
                        <div class="step-num">03</div>
                        <div class="step-title">Ejecución e intervención</div>
                        <div class="step-desc">El técnico registra las acciones realizadas, piezas usadas y tiempo empleado durante la atención.</div>
                    </div>
                    <div class="step-connector"></div>

                    <div class="step">
                        <div class="step-num">04</div>
                        <div class="step-title">Cierre y seguimiento</div>
                        <div class="step-desc">Se cierra la orden con evidencia fotográfica opcional y el historial queda disponible para auditorías futuras.</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ─────────────── CTA ─────────────── -->
    <section class="cta-section reveal">
        <div class="cta-glow"></div>
        <div class="container position-relative">
            <div class="section-label">Empieza ahora</div>
            <div class="teal-line mx-auto"></div>
            <h2 class="section-title mb-3">¿Listo para tomar el control<br>de tu inventario técnico?</h2>
            <p class="section-desc mx-auto mb-4" style="text-align:center;">
                Ingresa con tu cuenta o regístrate para comenzar a gestionar
                equipos e intervenciones de inmediato.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('login') }}" class="btn-vt-solid" style="padding:.75rem 2.5rem; font-size:1rem;">
                    Iniciar Sesión
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-vt" style="padding:.75rem 2.5rem; font-size:1rem;">
                        Crear Cuenta Gratis
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- ─────────────── FOOTER ─────────────── -->
    <footer class="vt-footer">
        <div class="nav-logo" style="font-size:1rem;">
            VALLE<span style="color:var(--teal-light)">TECH</span>
            <span class="nav-sub">Service &amp; Repair</span>
        </div>
        <p class="footer-copy">© {{ date('Y') }} ValleTech — Todos los derechos reservados</p>
        <div class="footer-links">
            <a href="#">Soporte</a>
            <a href="#">Privacidad</a>
            <a href="#">Términos</a>
        </div>
    </footer>

    <script>
        // Scroll reveal
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>
</html>