<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Mantenimiento;
use App\Models\Tecnico;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEquipos = Equipos::count();
        $equiposOperativos = Equipos::where('estado', 'Operativo')->count();
        $equiposReparacion = Equipos::where('estado', 'En reparación')->count();
        $equiposFuera = Equipos::where('estado', 'Fuera de servicio')->count();

        $totalTecnicos = Tecnico::where('estado', 'Activo')->count();

        $mantenimientosPendientes = Mantenimiento::where('estado', 'Pendiente')->count();
        $mantenimientosEnProceso = Mantenimiento::where('estado', 'En Proceso')->count();
        $mantenimientosCompletados = Mantenimiento::where('estado', 'Completado')->count();
        $totalMantenimientos = Mantenimiento::count();

        $actividadReciente = Mantenimiento::with(['equipo', 'tecnico'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalEquipos',
            'equiposOperativos',
            'equiposReparacion',
            'equiposFuera',
            'totalTecnicos',
            'mantenimientosPendientes',
            'mantenimientosEnProceso',
            'mantenimientosCompletados',
            'totalMantenimientos',
            'actividadReciente'
        ));
    }
}
