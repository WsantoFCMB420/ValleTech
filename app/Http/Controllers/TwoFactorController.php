<?php

namespace App\Http\Controllers;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    /**
     * Muestra el formulario de verificación 2FA durante el login.
     */
    public function index()
    {
        return view('auth.2fa');
    }

    /**
     * Verifica el código 2FA ingresado en el login.
     */
    public function verifyLogin(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        $google2fa = new Google2FA;
        $user = $request->user();

        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code);

        if ($valid) {
            $request->session()->put('2fa_passed', true);

            return redirect()->intended(route('dashboard', absolute: false));
        }

        return back()->withErrors(['code' => 'El código proporcionado es incorrecto.']);
    }

    /**
     * Genera un secreto temporal y muestra el QR en la página de perfil.
     */
    public function generateSecret(Request $request)
    {
        $google2fa = new Google2FA;
        $secret = $google2fa->generateSecretKey();

        $request->session()->put('2fa_temp_secret', $secret);

        return back()->with('status', '2fa-generated');
    }

    /**
     * Confirma el código del QR y activa definitivamente el 2FA.
     */
    public function enable(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        $secret = $request->session()->get('2fa_temp_secret');
        if (! $secret) {
            return back()->withErrors(['code' => 'Sesión expirada, recarga la página e intenta de nuevo.']);
        }

        $google2fa = new Google2FA;
        $valid = $google2fa->verifyKey($secret, $request->code);

        if ($valid) {
            $user = $request->user();
            $user->google2fa_secret = $secret;
            $user->save();

            $request->session()->forget('2fa_temp_secret');
            $request->session()->put('2fa_passed', true);

            return back()->with('status', '2fa-enabled');
        }

        return back()->withErrors(['code' => 'El código proporcionado es incorrecto.'])->with('status', '2fa-generated');
    }

    /**
     * Desactiva el 2FA para el usuario.
     */
    public function disable(Request $request)
    {
        $user = $request->user();
        $user->google2fa_secret = null;
        $user->save();

        return back()->with('status', '2fa-disabled');
    }

    /**
     * Helper estático para generar el SVG del código QR en las vistas.
     */
    public static function getQRCodeSvg($user, $secret)
    {
        $google2fa = new Google2FA;
        $qrCodeUrl = $google2fa->getQRCodeUrl('ValleTech', $user->email, $secret);

        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd
        );
        $writer = new Writer($renderer);

        return $writer->writeString($qrCodeUrl);
    }
}
