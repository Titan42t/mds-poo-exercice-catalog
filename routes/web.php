<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $movies = Movie::inRandomOrder()->whereNotNull('poster')->limit(12)->get();

    return view('home', ['movies' => $movies]);
});

Route::get('/movies', [MovieController::class, 'list']);

//Le where permet de prendre l'id que si c'est un chiffre
Route::get('/movie/{id}', [MovieController::class, 'show'])->where(['id' => '[0-9]+']);

Route::get('/movie/random', [MovieController::class, 'random']);

Route::get('/series', [SeriesController::class, 'list']);

Route::get('/genres', [GenreController::class, 'list']);
