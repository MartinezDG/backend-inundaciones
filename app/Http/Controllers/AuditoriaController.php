<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditoria;

class AuditoriaController extends Controller
{
    // Obtener todos los registros
    public function index()
    {
        $auditorias = Auditoria::all();
        return response()->json($auditorias);
    }

    // Obtener un registro específico
    public function show($id)
    {
        $registro = Auditoria::find($id);

        if (!$registro) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }

        return response()->json($registro);
    }

    // Crear un nuevo registro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'entidad' => 'required|string|max:100',
            'id_entidad' => 'required|integer',
            'accion' => 'required|string|max:50',
            'usuario_id' => 'nullable|integer',
            'detalles' => 'nullable|string|max:500',
        ]);

        $nuevo = Auditoria::create($validated);
        return response()->json($nuevo, 201);
    }

    // Eliminar un registro
    public function destroy($id)
    {
        $registro = Auditoria::find($id);

        if (!$registro) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }

        $registro->delete();
        return response()->json(['mensaje' => 'Registro eliminado correctamente']);
    }
}
