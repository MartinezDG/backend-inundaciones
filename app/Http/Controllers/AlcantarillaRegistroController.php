<?php

namespace App\Http\Controllers;

use App\Models\AlcantarillaRegistro;
use Illuminate\Http\Request;

class AlcantarillaRegistroController extends Controller
{
    // GET /alcantarilla-registros
    public function index()
    {
        return response()->json(AlcantarillaRegistro::all(), 200);
    }

    // GET /alcantarilla-registros/{id}
    public function show($id)
    {
        $registro = AlcantarillaRegistro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($registro, 200);
    }

    // POST /alcantarilla-registros
    public function store(Request $request)
    {
        $request->validate([
            'id_alcantarilla' => 'required|exists:alcantarillas,id_alcantarilla',
            'fecha_hora' => 'required|date',
            'caudal_lps' => 'required|numeric',
            'duracion_segundos' => 'nullable|integer',
            'observaciones' => 'nullable|string',
        ]);

        $registro = AlcantarillaRegistro::create($request->all());
        return response()->json($registro, 201);
    }

    // PUT /alcantarilla-registros/{id}
    public function update(Request $request, $id)
    {
        $registro = AlcantarillaRegistro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $request->validate([
            'id_alcantarilla' => 'sometimes|exists:alcantarillas,id_alcantarilla',
            'fecha_hora' => 'sometimes|date',
            'caudal_lps' => 'sometimes|numeric',
            'duracion_segundos' => 'nullable|integer',
            'observaciones' => 'nullable|string',
        ]);

        $registro->update($request->all());
        return response()->json($registro, 200);
    }

    // DELETE /alcantarilla-registros/{id}
    public function destroy($id)
    {
        $registro = AlcantarillaRegistro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $registro->delete();
        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
