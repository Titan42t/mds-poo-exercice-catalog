<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id) {
        $movie = Movie::find($id);

        return view('movie.show', ['movie' => $movie]);
    }

    public function list(Request $request) {
        $page = $request->input('page');
        $orderBy = $request->input('order_by');
        $order = $request->input('order', 'asc');
        $getGenre = $request->input('genre');

        if ($getGenre != null) {
            $id = Genre::query()->where('label', $getGenre)->first();
            $query = Genre::find($id->id)->movies();
        } else {
            $query = Movie::query();
        }

        if ($orderBy == "startYear" || $orderBy == "averageRating" || $orderBy == "primaryTitle") {
            $query->orderBy($orderBy, $order);
        }

        $movies = $query->paginate(20);

        return view('movie.list', [
            'movies' => $movies,
            'page' => $page
        ]);
    }

    public function random() {
        $movie = Movie::inRandomOrder()->first();

        return view('movie.show', [
            'movie' => $movie
        ]);
    }
}
