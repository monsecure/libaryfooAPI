<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $editorials = Editorial::all();
        return response()->json($editorials);
    }

    public function store(Request $request)
    {
        $editorial = Editorial::create($request->all());
        return response()->json($editorial, 201);
    }

    public function show($id)
    {
        $editorial = Editorial::findOrFail($id);
        return response()->json($editorial);
    }

    public function update(Request $request, $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->update($request->all());
        return response()->json($editorial, 200);
    }

    public function destroy($id)
    {
        Editorial::destroy($id);
        return response()->json(null, 204);
    }
}
