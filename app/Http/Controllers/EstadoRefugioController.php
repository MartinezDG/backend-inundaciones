<?php

namespace App\Http\Controllers;

use App\Models\EstadoRefugio;
use Illuminate\Http\Request;

class EstadoRefugioController extends Controller
{
    public function index()
    {
        return response()->json(EstadoRefugio::all());
    }

    public function show($id)
    {
        $estado = EstadoRefugio::find($id);
        if (!$estado) {
            return response()->json(['mensaje' => 'Estado de refugio no encontrado'], 404);
        }
        return response()->json($estado);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:estados_refugio,codigo|max:30',
            'descripcion' => 'nullable|max:255',
        ]);

        $estado = EstadoRefugio::create($request->all());

        return response()->json([
            'mensaje' => 'Estado de refugio creado correctamente',
            'estado' => $estado
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $estado = EstadoRefugio::find($id);
        if (!$estado) {
            return response()->json(['mensaje' => 'Estado de refugio no encontrado'], 404);
        }

        $request->validate([
            'codigo' => 'required|unique:estados_refugio,codigo,'.$id.',id_estado_refugio|max:30',
            'descripcion' => 'nullable|max:255',
        ]);

        $estado->update($request->all());

        return response()->json([
            'mensaje' => 'Estado de refugio actualizado correctamente',
            'estado' => $estado
        ]);
    }

    public function destroy($id)
    {
        $estado = EstadoRefugio::find($id);
        if (!$estado) {
            return response()->json(['mensaje' => 'Estado de refugio no encontrado'], 404);
        }

        $estado->delete();

        return response()->json(['mensaje' => 'Estado de refugio eliminado correctamente']);
    }
}

