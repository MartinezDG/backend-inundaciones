<?php

namespace App\Http\Controllers;

use App\Models\EstadoReporte;
use Illuminate\Http\Request;

class EstadoReporteController extends Controller
{
    public function index()
    {
        return response()->json(EstadoReporte::all());
    }

    public function show($id)
    {
        $estado = EstadoReporte::find($id);
        if (!$estado) {
            return response()->json(['mensaje' => 'Estado de reporte no encontrado'], 404);
        }
        return response()->json($estado);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:estados_reporte,codigo|max:30',
            'descripcion' => 'nullable|max:255',
        ]);

        $estado = EstadoReporte::create($request->all());

        return response()->json([
            'mensaje' => 'Estado de reporte creado correctamente',
            'estado' => $estado
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $estado = EstadoReporte::find($id);
        if (!$estado) {
            return response()->json(['mensaje' => 'Estado de reporte no encontrado'], 404);
        }

        $request->validate([
            'codigo' => 'required|unique:estados_reporte,codigo,'.$id.',id_estado|max:30',
            'descripcion' => 'nullable|max:255',
        ]);

        $estado->update($request->all());

        return response()->json([
            'mensaje' => 'Estado de reporte actualizado correctamente',
            'estado' => $estado
        ]);
    }

    public function destroy($id)
    {
        $estado = EstadoReporte::find($id);
        if (!$estado) {
            return response()->json(['mensaje' => 'Estado de reporte no encontrado'], 404);
        }

        $estado->delete();

        return response()->json(['mensaje' => 'Estado de reporte eliminado correctamente']);
    }
}
