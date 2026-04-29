<?php

use App\Http\Controllers\EquiposController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\UsuarioController;
use App\Models\Equipos;
use App\Models\Mantenimiento;
use App\Models\Tecnico;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Páginas legales — acceso público
Route::get('/terminos-y-condiciones', function () {
    return view('legal.terminos');
})->name('legal.terminos');

Route::get('/politica-de-cookies', function () {
    return view('legal.cookies');
})->name('legal.cookies');

Route::get('/dashboard', function () {
    $totalEquipos = Equipos::count();
    $mantenimientosPendientes = Mantenimiento::where('estado', 'Pendiente')->count();
    $mantenimientosCompletados = Mantenimiento::where('estado', 'Completado')->count();
    $tecnicosActivos = Tecnico::where('estado', 'Activo')->count();
    $ultimosMantenimientos = Mantenimiento::with(['equipo', 'tecnico'])
        ->latest()->take(5)->get();

    return view('dashboard', compact(
        'totalEquipos',
        'mantenimientosPendientes',
        'mantenimientosCompletados',
        'tecnicosActivos',
        'ultimosMantenimientos'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 2FA
    Route::get('/2fa', [TwoFactorController::class, 'index'])->name('2fa.index');
    Route::post('/2fa/verify', [TwoFactorController::class, 'verifyLogin'])->name('2fa.verify');
    Route::post('/2fa/generate', [TwoFactorController::class, 'generateSecret'])->name('2fa.generate');
    Route::post('/2fa/enable', [TwoFactorController::class, 'enable'])->name('2fa.enable');
    Route::post('/2fa/disable', [TwoFactorController::class, 'disable'])->name('2fa.disable');

    // Todos pueden ver equipos y mantenimientos
    Route::resource('equipos', EquiposController::class);
    Route::resource('mantenimientos', MantenimientoController::class);

    // Solo Admin
    Route::middleware('rol:Admin')->group(function () {
        Route::resource('tecnicos', TecnicoController::class);
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
    });
});

require __DIR__.'/auth.php';
