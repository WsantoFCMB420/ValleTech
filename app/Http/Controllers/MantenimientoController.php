<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Mantenimiento;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index(Request $request)
    {
        $query = Mantenimiento::with(['equipo', 'tecnico']);

        if ($request->filled('buscar')) {
            $query->where('descripcion', 'like', '%'.$request->buscar.'%')
                ->orWhereHas('equipo', function ($q) use ($request) {
                    $q->where('nombre', 'like', '%'.$request->buscar.'%');
                });
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('equipo_id')) {
            $query->where('equipo_id', $request->equipo_id);
        }

        $mantenimientos = $query->latest()->paginate(10);
        $equipos = Equipos::orderBy('nombre')->get();

        return view('mantenimientos.index', compact('mantenimientos', 'equipos'));
    }

    public function create()
    {
        $equipos = Equipos::orderBy('nombre')->get();
        $tecnicos = Tecnico::where('estado', 'Activo')->orderBy('nombre')->get();

        return view('mantenimientos.create', compact('equipos', 'tecnicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'tipo' => 'required|in:Preventivo,Correctivo',
            'descripcion' => 'required|string',
            'fecha_programada' => 'required|date',
            'fecha_realizada' => 'nullable|date',
            'estado' => 'required|in:Pendiente,En Proceso,Completado',
            'observaciones' => 'nullable|string',
        ]);

        Mantenimiento::create($request->only(
            'equipo_id', 'tecnico_id', 'tipo', 'descripcion',
            'fecha_programada', 'fecha_realizada', 'estado', 'observaciones'
        ));

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento registrado correctamente.');
    }

    public function show(Mantenimiento $mantenimiento)
    {
        $mantenimiento->load(['equipo', 'tecnico']);

        return view('mantenimientos.show', compact('mantenimiento'));
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        $equipos = Equipos::orderBy('nombre')->get();
        $tecnicos = Tecnico::where('estado', 'Activo')->orderBy('nombre')->get();

        return view('mantenimientos.edit', compact('mantenimiento', 'equipos', 'tecnicos'));
    }

    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'tipo' => 'required|in:Preventivo,Correctivo',
            'descripcion' => 'required|string',
            'fecha_programada' => 'required|date',
            'fecha_realizada' => 'nullable|date',
            'estado' => 'required|in:Pendiente,En Proceso,Completado',
            'observaciones' => 'nullable|string',
        ]);

        $mantenimiento->update($request->only(
            'equipo_id', 'tecnico_id', 'tipo', 'descripcion',
            'fecha_programada', 'fecha_realizada', 'estado', 'observaciones'
        ));

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento actualizado correctamente.');
    }

    public function destroy(Mantenimiento $mantenimiento)
    {
        if (auth()->user()->rol === 'Tecnico') {
            abort(403);
        }

        $mantenimiento->delete();

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento eliminado correctamente.');
    }
}
