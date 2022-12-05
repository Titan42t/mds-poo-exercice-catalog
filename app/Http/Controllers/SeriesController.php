<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
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

    public function show($id) {
        $series = Series::find($id);

        $seasons = Episode::query()->where('series_id', $id)->groupBy('seasonNumber')->get([
            'seasonNumber'
        ]);

        return view('series.show', [
            'series' => $series,
            'seasons' => $seasons
        ]);
    }

    public function random() {
        $series = Series::inRandomOrder()->first();

        return view('series.show', [
            'series' => $series
        ]);
    }

    public function showSeason($id, $season_num) {
        //DB::enableQueryLog();

        /* $query = DB::getQueryLog();

        dd($query); */

        /*return view('series.season', [
            'list' => $episodes
        ]);*/
    }
}
