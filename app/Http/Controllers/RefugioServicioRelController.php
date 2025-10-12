<?php

namespace App\Http\Controllers;

use App\Models\RefugioServicioRel;
use Illuminate\Http\Request;

class RefugioServicioRelController extends Controller
{
    public function index()
    {
        return response()->json(
            RefugioServicioRel::with(['refugio','servicio'])->get()
        );
    }

    public function show($id)
    {
        $rel = RefugioServicioRel::with(['refugio','servicio'])->find($id);
        if (!$rel) {
            return response()->json(['mensaje' => 'Relación no encontrada'], 404);
        }
        return response()->json($rel);
    }

    public function store(Request $request)
    {
        $rel = RefugioServicioRel::create($request->all());
        return response()->json($rel, 201);
    }

    public function update(Request $request, $id)
    {
        $rel = RefugioServicioRel::find($id);
        if (!$rel) {
            return response()->json(['mensaje' => 'Relación no encontrada'], 404);
        }
        $rel->update($request->all());
        return response()->json($rel);
    }

    public function destroy($id)
    {
        $rel = RefugioServicioRel::find($id);
        if (!$rel) {
            return response()->json(['mensaje' => 'Relación no encontrada'], 404);
        }
        $rel->delete();
        return response()->json(['mensaje' => 'Relación eliminada correctamente']);
    }
}

