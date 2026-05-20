<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::latest()->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|in:Admin,Tecnico',
            'estado' => 'required|in:Pendiente,Aprobado,Rechazado',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'estado' => $request->estado,
        ]);

        if ($user->rol === 'Tecnico' && $user->estado === 'Aprobado') {
            $parts = explode(' ', $user->name, 2);
            \App\Models\Tecnico::firstOrCreate(
                ['email' => $user->email],
                [
                    'nombre' => $parts[0] ?? $user->name,
                    'apellido' => $parts[1] ?? '',
                    'especialidad' => 'General',
                    'estado' => 'Activo'
                ]
            );
        }

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$usuario->id,
            'rol' => 'required|in:Admin,Tecnico',
            'estado' => 'required|in:Pendiente,Aprobado,Rechazado',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol,
            'estado' => $request->estado,
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $usuario->update(['password' => Hash::make($request->password)]);
        }

        if ($usuario->rol === 'Tecnico' && $usuario->estado === 'Aprobado') {
            $parts = explode(' ', $usuario->name, 2);
            \App\Models\Tecnico::firstOrCreate(
                ['email' => $usuario->email],
                [
                    'nombre' => $parts[0] ?? $usuario->name,
                    'apellido' => $parts[1] ?? '',
                    'especialidad' => 'General',
                    'estado' => 'Activo'
                ]
            );
        }

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return redirect()->route('usuarios.index')
                ->with('error', 'No puedes eliminar tu propio usuario.');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
