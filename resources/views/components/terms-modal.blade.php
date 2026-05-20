@php
    $userId = auth()->check() ? auth()->id() : null;
    $termsCookie = $userId ? "terms_accepted_{$userId}" : 'terms_accepted_generic';
    $cookiesCookie = $userId ? "cookies_accepted_{$userId}" : 'cookies_accepted_generic';
    
    // Do not show on legal pages themselves, otherwise they can't read them!
    $isLegalPage = request()->routeIs('legal.*');
    $shouldShow = !$isLegalPage && (!request()->cookie($termsCookie) || !request()->cookie($cookiesCookie));
@endphp

@if ($shouldShow)
    <style>
        #vt-terms-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(8, 15, 26, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 100000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .vt-terms-modal {
            background: var(--bg-card, #0f1e30);
            border: 1px solid var(--border-bright, rgba(255,255,255,0.14));
            border-radius: 16px;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6);
            color: var(--text-primary, #dce8f0);
            font-family: 'Darker Grotesque', sans-serif;
            animation: vt-modal-in 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes vt-modal-in {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .vt-terms-modal i.shield-icon {
            font-size: 56px;
            color: var(--teal, #1db89a);
            margin-bottom: 20px;
            display: block;
        }

        .vt-terms-modal h3 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .vt-terms-modal p {
            font-size: 18px;
            color: var(--text-muted, #6b8299);
            line-height: 1.6;
            margin-bottom: 28px;
        }
        
        .vt-terms-modal a {
            color: var(--teal, #1db89a);
            text-decoration: none;
            font-weight: 700;
            border-bottom: 1px solid rgba(29, 184, 154, 0.2);
            transition: all 0.2s;
        }

        .vt-terms-modal a:hover {
            border-bottom-color: var(--teal);
        }

        .vt-terms-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .vt-terms-actions .btn-vt {
            background: var(--teal, #1db89a);
            color: #fff;
            border: none;
            padding: 14px 24px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            width: 100%;
            font-family: 'Darker Grotesque', sans-serif;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(29, 184, 154, 0.25);
        }
        
        .vt-terms-actions .btn-vt:hover {
            background: #17a086;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(29, 184, 154, 0.35);
        }
    </style>
    
    <div id="vt-terms-overlay">
        <div class="vt-terms-modal">
            <i class="bi bi-shield-lock shield-icon"></i>
            <h3>Protocolo de Seguridad</h3>
            <p>
                Para acceder al ecosistema industrial de <strong>ValleTech</strong>, es necesario validar la aceptación de nuestra 
                <a href="{{ route('legal.cookies') }}" target="_blank">Política de Cookies</a> y 
                <a href="{{ route('legal.terminos') }}" target="_blank">Términos y Condiciones</a> corporativos.
            </p>
            <div class="vt-terms-actions">
                <button class="btn-vt" onclick="acceptAllAndProceed()">
                    <i class="bi bi-check-circle"></i> Confirmar y Acceder
                </button>
            </div>
        </div>
    </div>
    <script>
        (function() {
            // Instant check to avoid flashing if cookie was just set
            var tName = "{{ $termsCookie }}";
            var cName = "{{ $cookiesCookie }}";
            if (document.cookie.indexOf(tName + '=1') !== -1 && document.cookie.indexOf(cName + '=1') !== -1) {
                document.getElementById('vt-terms-overlay').style.display = 'none';
            }
        })();

        function acceptAllAndProceed() {
            var tName = "{{ $termsCookie }}";
            var cName = "{{ $cookiesCookie }}";
            var expires = "; max-age=31536000; path=/; SameSite=Lax";
            
            document.cookie = tName + "=1" + expires;
            document.cookie = cName + "=1" + expires;
            
            var el = document.getElementById('vt-terms-overlay');
            if (el) {
                el.style.opacity = '0';
                el.style.transition = 'opacity 0.3s ease';
                setTimeout(function() { el.style.display = 'none'; }, 300);
            }
        }
    </script>
@endif
