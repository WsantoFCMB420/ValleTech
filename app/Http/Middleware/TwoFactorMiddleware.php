<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Si el usuario está autenticado y tiene 2FA activado
        if ($user && $user->google2fa_secret) {
            // Si la sesión aún no ha sido verificada para 2FA
            if (!$request->session()->get('2fa_passed')) {
                // Prevenir bucles de redirección si ya estamos en las rutas de 2FA o intentando cerrar sesión
                if (!$request->is('2fa') && !$request->is('2fa/verify') && !$request->is('logout')) {
                    return redirect()->route('2fa.index');
                }
            }
        }

        return $next($request);
    }
}
