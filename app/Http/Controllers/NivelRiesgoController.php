<?php

namespace App\Http\Controllers;

use App\Models\NivelRiesgo;
use Illuminate\Http\Request;

class NivelRiesgoController extends Controller
{
    public function index()
    {
        return response()->json(NivelRiesgo::all());
    }

    public function show($id)
    {
        $nivel = NivelRiesgo::find($id);
        if (!$nivel) {
            return response()->json(['mensaje' => 'Nivel de riesgo no encontrado'], 404);
        }
        return response()->json($nivel);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:niveles_riesgo,codigo|max:30',
            'descripcion' => 'nullable|max:255',
        ]);

        $nivel = NivelRiesgo::create($request->all());

        return response()->json([
            'mensaje' => 'Nivel de riesgo creado correctamente',
            'nivel' => $nivel
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $nivel = NivelRiesgo::find($id);
        if (!$nivel) {
            return response()->json(['mensaje' => 'Nivel de riesgo no encontrado'], 404);
        }

        $request->validate([
            'codigo' => 'required|unique:niveles_riesgo,codigo,'.$id.',id_nivel|max:30',
            'descripcion' => 'nullable|max:255',
        ]);

        $nivel->update($request->all());

        return response()->json([
            'mensaje' => 'Nivel de riesgo actualizado correctamente',
            'nivel' => $nivel
        ]);
    }

    public function destroy($id)
    {
        $nivel = NivelRiesgo::find($id);
        if (!$nivel) {
            return response()->json(['mensaje' => 'Nivel de riesgo no encontrado'], 404);
        }

        $nivel->delete();

        return response()->json(['mensaje' => 'Nivel de riesgo eliminado correctamente']);
    }
}
