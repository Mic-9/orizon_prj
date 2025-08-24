<?php

namespace App\Http\Controllers;

use App\Models\Paese;
use Illuminate\Http\Request;

class PaeseController extends Controller
{
    public function index()
    {
        return response()->json(Paese::all(), 200);
    }

    public function show($id)
    {
        $paese = Paese::find($id);
        if ($paese) {
            return response()->json($paese, 200);
        } else {
            return response()->json(['message' => 'Paese non trovato'], 404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $paese = Paese::create($validatedData);

        return response()->json($paese, 201);
    }

    public function update(Request $request, $id)
    {
        $paese = Paese::find($id);

        if ($paese) {
            $request->validate([
                'nome' => 'sometimes|required|string|max:255|unique:paesi,nome,' . $id,
            ]);

            $paese->update($request->only(['nome']));

            return response()->json($paese, 200);
        } else {
            return response()->json(['message' => 'Paese non trovato'], 404);
        }
    }
    public function destroy($id)
    {
        $paese = Paese::find($id);

        if ($paese) {
            $paese->delete();
            return response()->json(['message' => 'Paese eliminato con successo'], 200);
        } else {
            return response()->json(['message' => 'Paese non trovato'], 404);
        }
    }
}
