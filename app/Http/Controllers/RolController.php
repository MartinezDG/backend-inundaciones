<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        return response()->json(Rol::all());
    }

    public function show($id)
    {
        $rol = Rol::find($id);
        if (!$rol) {
            return response()->json(['mensaje' => 'Rol no encontrado'], 404);
        }
        return response()->json($rol);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:roles,nombre|max:50',
            'descripcion' => 'nullable|max:255',
        ]);

        $rol = Rol::create($request->all());

        return response()->json([
            'mensaje' => 'Rol creado correctamente',
            'rol' => $rol
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);
        if (!$rol) {
            return response()->json(['mensaje' => 'Rol no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|unique:roles,nombre,'.$id.',id_rol|max:50',
            'descripcion' => 'nullable|max:255',
        ]);

        $rol->update($request->all());

        return response()->json([
            'mensaje' => 'Rol actualizado correctamente',
            'rol' => $rol
        ]);
    }

    public function destroy($id)
    {
        $rol = Rol::find($id);
        if (!$rol) {
            return response()->json(['mensaje' => 'Rol no encontrado'], 404);
        }

        $rol->delete();

        return response()->json(['mensaje' => 'Rol eliminado correctamente']);
    }
}
