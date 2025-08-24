<?php

namespace App\Http\Controllers;

use App\Models\Viaggio;
use Illuminate\Http\Request;

class ViaggioController extends Controller
{
    public function index(Request $request)
    {
        $query = Viaggio::query();

        if ($request->has('paese_id')) {
            $paeseIds = is_array($request->input('paese_id')) ? $request->input('paese_id') : [$request->input('paese_id')];

            foreach ($paeseIds as $paeseId) {
                $query->whereHas('paesi', function ($q) use ($paeseId) {
                    $q->where('paesi.id', $paeseId);
                });
            }
        }
        if ($request->has('posti_disponibili')) {
            $query->where('posti_disponibili', '>=', $request->input('posti_disponibili'));
        }
        $viaggi = $query->with('paesi')->get();


        return response()->json($viaggi, 200);
    }

    public function show($id)
    {
        $viaggio = Viaggio::with('paesi')->find($id);

        if ($viaggio) {
            return response()->json($viaggio, 200);
        } else {
            return response()->json(['message' => 'Viaggio non trovato'], 404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paesi' => 'required|array',
            'paesi.*' => 'exists:paesi,id',
            'posti_disponibili' => 'required|integer',
        ]);

        $viaggio = new Viaggio;
        $viaggio->posti_disponibili = $validatedData['posti_disponibili'];
        $viaggio->save();

        $viaggio->paesi()->sync($validatedData['paesi']);

        $viaggio->load('paesi');

        return response()->json($viaggio, 201);
    }

    public function update(Request $request, $id)
    {
        $viaggio = Viaggio::find($id);

        if (!$viaggio) {
            return response()->json(['message' => 'Viaggio non trovato'], 404);
        }

        $validatedData = $request->validate([
            'paesi' => 'sometimes|array',
            'paesi.*' => 'sometimes|exists:paesi,id',
            'posti_disponibili' => 'sometimes|integer|min:1',
        ]);

        if (isset($validatedData['paesi'])) {
            $viaggio->paesi()->sync($validatedData['paesi']);
        }

        if (isset($validatedData['posti_disponibili'])) {
            $viaggio->posti_disponibili = $validatedData['posti_disponibili'];
        }

        $viaggio->save();

        $viaggio->load('paesi');
        return response()->json($viaggio, 200);
    }

    public function destroy($id)
    {
        $viaggio = Viaggio::find($id);

        if ($viaggio) {

            $viaggio->paesi()->detach();

            $viaggio->delete();
            return response()->json(['message' => 'Viaggio eliminato'], 200);
        } else {
            return response()->json(['message' => 'Viaggio non trovato'], 404);
        }
    }
}
