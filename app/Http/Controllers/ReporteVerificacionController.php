<?php

namespace App\Http\Controllers;

use App\Models\ReporteVerificacion;
use Illuminate\Http\Request;

class ReporteVerificacionController extends Controller
{
    public function index()
    {
        return response()->json(ReporteVerificacion::all());
    }

    public function show($id)
    {
        $verificacion = ReporteVerificacion::find($id);
        if (!$verificacion) return response()->json(['mensaje'=>'No encontrado'], 404);
        return response()->json($verificacion);
    }

    public function store(Request $request)
    {
        $verificacion = ReporteVerificacion::create($request->all());
        return response()->json($verificacion, 201);
    }

    public function update(Request $request, $id)
    {
        $verificacion = ReporteVerificacion::find($id);
        if (!$verificacion) return response()->json(['mensaje'=>'No encontrado'], 404);
        $verificacion->update($request->all());
        return response()->json($verificacion);
    }

    public function destroy($id)
    {
        $verificacion = ReporteVerificacion::find($id);
        if (!$verificacion) return response()->json(['mensaje'=>'No encontrado'], 404);
        $verificacion->delete();
        return response()->json(['mensaje'=>'Eliminado']);
    }
}
