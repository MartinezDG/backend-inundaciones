<?php

namespace App\Http\Controllers;

use App\Models\LluviaRegistro;
use Illuminate\Http\Request;

class LluviaRegistroController extends Controller
{
    public function index()
    {
        return response()->json(LluviaRegistro::with('estacion')->get());
    }

    public function show($id)
    {
        $registro = LluviaRegistro::with('estacion')->find($id);
        if (!$registro) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }
        return response()->json($registro);
    }

    public function store(Request $request)
    {
        $registro = LluviaRegistro::create($request->all());
        return response()->json($registro, 201);
    }

    public function update(Request $request, $id)
    {
        $registro = LluviaRegistro::find($id);
        if (!$registro) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }
        $registro->update($request->all());
        return response()->json($registro);
    }

    public function destroy($id)
    {
        $registro = LluviaRegistro::find($id);
        if (!$registro) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }
        $registro->delete();
        return response()->json(['mensaje' => 'Registro eliminado correctamente']);
    }
}
