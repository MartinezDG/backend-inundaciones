<?php

namespace App\Http\Controllers;

use App\Models\ReporteInundacion;
use Illuminate\Http\Request;

class ReporteInundacionController extends Controller
{
    // Listar todos los reportes
    public function index()
    {
        return response()->json(
            ReporteInundacion::with(['usuario', 'municipio', 'estadoReporte', 'verificador'])->get()
        );
    }

    // Mostrar un reporte por ID
    public function show($id)
    {
        $reporte = ReporteInundacion::with(['usuario', 'municipio', 'estadoReporte', 'verificador'])->find($id);
        if (!$reporte) {
            return response()->json(['mensaje' => 'Reporte no encontrado'], 404);
        }
        return response()->json($reporte);
    }

    // Crear un nuevo reporte
    public function store(Request $request)
    {
        $reporte = ReporteInundacion::create($request->all());
        return response()->json($reporte, 201);
    }

    // Actualizar reporte existente
    public function update(Request $request, $id)
    {
        $reporte = ReporteInundacion::find($id);
        if (!$reporte) {
            return response()->json(['mensaje' => 'Reporte no encontrado'], 404);
        }
        $reporte->update($request->all());
        return response()->json($reporte);
    }

    // Eliminar reporte
    public function destroy($id)
    {
        $reporte = ReporteInundacion::find($id);
        if (!$reporte) {
            return response()->json(['mensaje' => 'Reporte no encontrado'], 404);
        }
        $reporte->delete();
        return response()->json(['mensaje' => 'Reporte eliminado correctamente']);
    }
}
