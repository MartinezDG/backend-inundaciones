<?php

namespace App\Http\Controllers;

use App\Models\Alcantarilla;
use Illuminate\Http\Request;

class AlcantarillaController extends Controller
{
    // Listar todas las alcantarillas
    public function index()
    {
        return response()->json(
            Alcantarilla::with(['municipio', 'creador', 'registros'])->get()
        );
    }

    // Mostrar una alcantarilla por ID
    public function show($id)
    {
        $alcantarilla = Alcantarilla::with(['municipio', 'creador', 'registros'])->find($id);
        if (!$alcantarilla) {
            return response()->json(['mensaje' => 'Alcantarilla no encontrada'], 404);
        }
        return response()->json($alcantarilla);
    }

    // Crear una nueva alcantarilla
    public function store(Request $request)
    {
        $alcantarilla = Alcantarilla::create($request->all());
        return response()->json($alcantarilla, 201);
    }

    // Actualizar alcantarilla existente
    public function update(Request $request, $id)
    {
        $alcantarilla = Alcantarilla::find($id);
        if (!$alcantarilla) {
            return response()->json(['mensaje' => 'Alcantarilla no encontrada'], 404);
        }
        $alcantarilla->update($request->all());
        return response()->json($alcantarilla);
    }

    // Eliminar alcantarilla
    public function destroy($id)
    {
        $alcantarilla = Alcantarilla::find($id);
        if (!$alcantarilla) {
            return response()->json(['mensaje' => 'Alcantarilla no encontrada'], 404);
        }
        $alcantarilla->delete();
        return response()->json(['mensaje' => 'Alcantarilla eliminada correctamente']);
    }
}
