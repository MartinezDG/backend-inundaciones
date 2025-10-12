<?php

namespace App\Http\Controllers;

use App\Models\RefugioServicio;
use Illuminate\Http\Request;

class RefugioServicioController extends Controller
{
    public function index()
    {
        return response()->json(RefugioServicio::all());
    }

    public function show($id)
    {
        $servicio = RefugioServicio::find($id);
        if (!$servicio) {
            return response()->json(['mensaje' => 'Servicio no encontrado'], 404);
        }
        return response()->json($servicio);
    }

    public function store(Request $request)
    {
        $servicio = RefugioServicio::create($request->all());
        return response()->json($servicio, 201);
    }

    public function update(Request $request, $id)
    {
        $servicio = RefugioServicio::find($id);
        if (!$servicio) {
            return response()->json(['mensaje' => 'Servicio no encontrado'], 404);
        }
        $servicio->update($request->all());
        return response()->json($servicio);
    }

    public function destroy($id)
    {
        $servicio = RefugioServicio::find($id);
        if (!$servicio) {
            return response()->json(['mensaje' => 'Servicio no encontrado'], 404);
        }
        $servicio->delete();
        return response()->json(['mensaje' => 'Servicio eliminado correctamente']);
    }
}
