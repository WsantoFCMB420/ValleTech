<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();

        return view('chat.index', compact('mensajes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string|max:1000',
        ]);

        Mensaje::create([
            'user_id' => auth()->id(),
            'mensaje' => $request->mensaje,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back();
    }

    public function getMessages()
    {
        $mensajes = Mensaje::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();

        return view('chat.messages', compact('mensajes'))->render();
    }
}
