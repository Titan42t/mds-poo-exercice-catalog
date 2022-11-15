<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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

        $query = Movie::query();
        if ($orderBy == "startYear" || $orderBy == "averageRating" || $orderBy == "originalTitle") {
            $query->orderBy($orderBy, $order);
        }

        $movies = $query->paginate(20);

        return view('movie.list', [
            'movies' => $movies,
            'page' => $page
        ]);
    }
}
