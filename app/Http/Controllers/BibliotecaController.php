<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function index()
    {
        $bibliotecas = Biblioteca::all();
        return response()->json($bibliotecas);
    }

    public function store(Request $request)
    {
        $biblioteca = Biblioteca::create($request->all());
        return response()->json($biblioteca, 201);
    }

    public function show($id)
    {
        $biblioteca = Biblioteca::findOrFail($id);
        return response()->json($biblioteca);
    }

    public function update(Request $request, $id)
    {
        $biblioteca = Biblioteca::findOrFail($id);
        $biblioteca->update($request->all());
        return response()->json($biblioteca, 200);
    }

    public function destroy($id)
    {
        Biblioteca::destroy($id);
        return response()->json(null, 204);
    }
}
