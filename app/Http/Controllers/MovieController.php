<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    function show($id) {
        echo "Votre id : " + $id;
    }
}
