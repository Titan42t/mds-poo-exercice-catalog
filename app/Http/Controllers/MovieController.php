<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    function show($id) {
        $movie = Movie::find($id);

        return view('movie.show', ['movie' => $movie]);
    }

    function list(Request $request) {
        $page = $request->input('page');
        
        $movies = Movie::all()->skip($page * 20)->take(20);

        return view('movie.list', [
            'movies' => $movies,
            'page' => $page
        ]);
    }
}
