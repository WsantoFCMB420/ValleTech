<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipos::query();

        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%'.$request->buscar.'%')
                ->orWhere('descripcion', 'like', '%'.$request->buscar.'%');
        }

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $equipos = $query->latest()->paginate(10);

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        if (auth()->user()->rol === 'Tecnico') {
            abort(403);
        }

        return view('equipos.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->rol === 'Tecnico') {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|in:Operativo,En reparación,Fuera de servicio',
            'descripcion' => 'nullable|string',
        ]);

        Equipos::create($request->only('nombre', 'estado', 'descripcion'));

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo registrado correctamente.');
    }

    public function show(Equipos $equipo)
    {
        $mantenimientos = $equipo->mantenimientos()
            ->with('tecnico')
            ->latest()
            ->get();

        return view('equipos.show', compact('equipo', 'mantenimientos'));
    }

    public function edit(Equipos $equipo)
    {
        if (auth()->user()->rol === 'Tecnico') {
            abort(403);
        }

        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipos $equipo)
    {
        if (auth()->user()->rol === 'Tecnico') {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|in:Operativo,En reparación,Fuera de servicio',
            'descripcion' => 'nullable|string',
        ]);

        $equipo->update($request->only('nombre', 'estado', 'descripcion'));

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipos $equipo)
    {
        if (auth()->user()->rol === 'Tecnico') {
            abort(403);
        }
        $equipo->delete();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo eliminado correctamente.');
    }
}
