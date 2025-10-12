<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    // Listar todos los municipios
    public function index()
    {
        return response()->json(Municipio::all());
    }

    // Mostrar un municipio por ID
    public function show($id)
    {
        $municipio = Municipio::find($id);
        if (!$municipio) {
            return response()->json(['mensaje' => 'Municipio no encontrado'], 404);
        }
        return response()->json($municipio);
    }

    // Crear un nuevo municipio
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:municipios,nombre|max:120',
            'codigo_inegi' => 'nullable|max:20',
        ]);

        $municipio = Municipio::create($request->all());

        return response()->json([
            'mensaje' => 'Municipio creado correctamente',
            'municipio' => $municipio
        ], 201);
    }

    // Actualizar un municipio
    public function update(Request $request, $id)
    {
        $municipio = Municipio::find($id);
        if (!$municipio) {
            return response()->json(['mensaje' => 'Municipio no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|unique:municipios,nombre,'.$id.',id_municipio|max:120',
            'codigo_inegi' => 'nullable|max:20',
        ]);

        $municipio->update($request->all());

        return response()->json([
            'mensaje' => 'Municipio actualizado correctamente',
            'municipio' => $municipio
        ]);
    }

    // Eliminar un municipio
    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        if (!$municipio) {
            return response()->json(['mensaje' => 'Municipio no encontrado'], 404);
        }

        $municipio->delete();

        return response()->json(['mensaje' => 'Municipio eliminado correctamente']);
    }
}
