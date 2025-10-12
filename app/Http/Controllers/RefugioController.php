<?php

namespace App\Http\Controllers;

use App\Models\Refugio;
use Illuminate\Http\Request;

class RefugioController extends Controller
{
    // Listar todos los refugios
    public function index()
    {
        return response()->json(
            Refugio::with(['municipio','estadoRefugio','servicios'])->get()
        );
    }

    // Mostrar un refugio por ID
    public function show($id)
    {
        $refugio = Refugio::with(['municipio','estadoRefugio','servicios'])->find($id);
        if (!$refugio) {
            return response()->json(['mensaje' => 'Refugio no encontrado'], 404);
        }
        return response()->json($refugio);
    }

    // Crear un nuevo refugio
    public function store(Request $request)
    {
        $refugio = Refugio::create($request->all());
        return response()->json($refugio, 201);
    }

    // Actualizar refugio existente
    public function update(Request $request, $id)
    {
        $refugio = Refugio::find($id);
        if (!$refugio) {
            return response()->json(['mensaje' => 'Refugio no encontrado'], 404);
        }
        $refugio->update($request->all());
        return response()->json($refugio);
    }

    // Eliminar refugio
    public function destroy($id)
    {
        $refugio = Refugio::find($id);
        if (!$refugio) {
            return response()->json(['mensaje' => 'Refugio no encontrado'], 404);
        }
        $refugio->delete();
        return response()->json(['mensaje' => 'Refugio eliminado correctamente']);
    }
}
