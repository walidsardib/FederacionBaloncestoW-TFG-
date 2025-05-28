<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function index()
    {
        $noticias = Noticia::latest()->paginate(10);
        return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('noticias', 'public');
        }

        Noticia::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Noticia creada correctamente.');
    }


    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $imagenPath = $noticia->imagen;
        if ($request->hasFile('imagen')) {
            if ($imagenPath) {
                \Storage::disk('public')->delete($imagenPath);
            }
            $imagenPath = $request->file('imagen')->store('noticias', 'public');
        }

        $noticia->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }
    public function destroy(Noticia $noticia)
    {
        if ($noticia->imagen) {
            \Storage::disk('public')->delete($noticia->imagen);
        }

        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada correctamente.');
    }
}