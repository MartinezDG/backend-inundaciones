<?php

namespace App\Http\Controllers;

use App\Models\EstacionMeteorologica;
use Illuminate\Http\Request;

class EstacionMeteorologicaController extends Controller
{
    public function index()
    {
        return response()->json(
            EstacionMeteorologica::with(['municipio', 'creador', 'registros'])->get()
        );
    }

    public function show($id)
    {
        $estacion = EstacionMeteorologica::with(['municipio', 'creador', 'registros'])->find($id);
        if (!$estacion) {
            return response()->json(['mensaje' => 'Estación no encontrada'], 404);
        }
        return response()->json($estacion);
    }

    public function store(Request $request)
    {
        $estacion = EstacionMeteorologica::create($request->all());
        return response()->json($estacion, 201);
    }

    public function update(Request $request, $id)
    {
        $estacion = EstacionMeteorologica::find($id);
        if (!$estacion) {
            return response()->json(['mensaje' => 'Estación no encontrada'], 404);
        }
        $estacion->update($request->all());
        return response()->json($estacion);
    }

    public function destroy($id)
    {
        $estacion = EstacionMeteorologica::find($id);
        if (!$estacion) {
            return response()->json(['mensaje' => 'Estación no encontrada'], 404);
        }
        $estacion->delete();
        return response()->json(['mensaje' => 'Estación eliminada correctamente']);
    }
}
