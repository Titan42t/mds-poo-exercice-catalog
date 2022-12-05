<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function show($id) {
        $series = Series::find($id);

        return view('series.show', ['series' => $series]);
    }

    public function list(Request $request) {
        $page = $request->input('page');
        $orderBy = $request->input('order_by');
        $order = $request->input('order', 'asc');
        $getGenre = $request->input('genre');

        if ($getGenre != null) {
            $id = Genre::query()->where('label', $getGenre)->first();
            $query = Genre::find($id->id)->series();
        } else {
            $query = Series::query();
        }

        if ($orderBy == "startYear" || $orderBy == "averageRating" || $orderBy == "primaryTitle") {
            $query->orderBy($orderBy, $order);
        }

        $series = $query->paginate(20);

        return view('series.list', [
            'list' => $series,
            'page' => $page
        ]);
    }

    public function random() {
        $series = Series::inRandomOrder()->first();

        return view('series.show', [
            'series' => $series
        ]);
    }
}
