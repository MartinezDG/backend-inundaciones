<?php

namespace App\Http\Controllers;

use App\Models\ZonaRiesgo;
use Illuminate\Http\Request;

class ZonaRiesgoController extends Controller
{
    // Listar todas las zonas
    public function index()
    {
        return response()->json(ZonaRiesgo::with(['municipio', 'nivelRiesgo'])->get());
    }

    // Mostrar una zona por ID
    public function show($id)
    {
        $zona = ZonaRiesgo::with(['municipio', 'nivelRiesgo'])->find($id);
        if (!$zona) {
            return response()->json(['mensaje' => 'Zona no encontrada'], 404);
        }
        return response()->json($zona);
    }

    // Crear una nueva zona
    public function store(Request $request)
    {
        $zona = ZonaRiesgo::create($request->all());
        return response()->json($zona, 201);
    }

    // Actualizar zona existente
    public function update(Request $request, $id)
    {
        $zona = ZonaRiesgo::find($id);
        if (!$zona) {
            return response()->json(['mensaje' => 'Zona no encontrada'], 404);
        }
        $zona->update($request->all());
        return response()->json($zona);
    }

    // Eliminar zona
    public function destroy($id)
    {
        $zona = ZonaRiesgo::find($id);
        if (!$zona) {
            return response()->json(['mensaje' => 'Zona no encontrada'], 404);
        }
        $zona->delete();
        return response()->json(['mensaje' => 'Zona eliminada correctamente']);
    }
}
