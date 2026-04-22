<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function index()
    {
        $equipos = Equipos::latest()->paginate(10);

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
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
        return view('equipos.show', compact('equipo'));
    }

    public function edit(Equipos $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipos $equipo)
    {
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
        $equipo->delete();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo eliminado correctamente.');
    }
}
