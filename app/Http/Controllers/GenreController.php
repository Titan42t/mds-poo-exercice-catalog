<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function list() {
        $genres = Genre::query()->orderBy('label', 'asc')->get();

        return view('genre.list', [
            'genres' => $genres
        ]);
    }
}
