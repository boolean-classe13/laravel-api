<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::all();
        return response()->json([
            'success' => true,
            'count' => $movies->count(),
            'results' => $movies
        ]);
    }

    public function best() {
        $movies = Movie::where('rating', '>', 8)->orderBy('rating', 'desc')->get();
        return response()->json([
            'success' => true,
            'count' => $movies->count(),
            'results' => $movies
        ]);
    }

    public function show($id) {
        $movie = Movie::find($id);
        if($movie) {
            return response()->json([
                'success' => true,
                'results' => $movie
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun film trovato con questo id',
                'results' => []
            ]);
        }
    }

    public function store(Request $request) {
        $dati = $request->all();
        $nuovo_movie = new Movie();
        $nuovo_movie->fill($dati);
        $nuovo_movie->save();
        return response()->json([
            'success' => true,
            'results' => $nuovo_movie
        ]);
    }

    public function update(Request $request, $id) {
        $dati = $request->all();
        $movie = Movie::find($id);
        if($movie) {
            $movie->update($dati);
            return response()->json([
                'success' => true,
                'results' => $movie
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun film trovato con questo id',
                'results' => []
            ]);
        }
    }

    public function destroy($id) {
        $movie = Movie::find($id);
        if($movie) {
            $movie->delete();
            return response()->json([
                'success' => true,
                'results' => []
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun film trovato con questo id',
                'results' => []
            ]);
        }
    }


}
