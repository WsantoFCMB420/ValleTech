<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()->rol === 'Tecnico' &&
                in_array($request->route()->getActionMethod(), ['create', 'store', 'edit', 'update', 'destroy'])) {
                abort(403, 'No tienes permiso para realizar esta acción.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $tecnicos = Tecnico::latest()->paginate(10);

        return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
        return view('tecnicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:tecnicos,email',
            'telefono' => 'nullable|string|max:20',
            'especialidad' => 'required|in:Hardware,Software,Redes,General',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        Tecnico::create($request->only('nombre', 'apellido', 'email', 'telefono', 'especialidad', 'estado'));

        return redirect()->route('tecnicos.index')
            ->with('success', 'Técnico registrado correctamente.');
    }

    public function show(Tecnico $tecnico)
    {
        return view('tecnicos.show', compact('tecnico'));
    }

    public function edit(Tecnico $tecnico)
    {
        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(Request $request, Tecnico $tecnico)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:tecnicos,email,'.$tecnico->id,
            'telefono' => 'nullable|string|max:20',
            'especialidad' => 'required|in:Hardware,Software,Redes,General',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        $tecnico->update($request->only('nombre', 'apellido', 'email', 'telefono', 'especialidad', 'estado'));

        return redirect()->route('tecnicos.index')
            ->with('success', 'Técnico actualizado correctamente.');
    }

    public function destroy(Tecnico $tecnico)
    {
        $tecnico->delete();

        return redirect()->route('tecnicos.index')
            ->with('success', 'Técnico eliminado correctamente.');
    }
}
