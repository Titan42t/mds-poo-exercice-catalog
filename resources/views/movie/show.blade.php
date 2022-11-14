<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/movie/show.css')}}">
    <title>{{$movie->primaryTitle}}</title>
</head>
<body>
    <div class="page">
        <div class="movie">
            <img src="{{$movie->poster}}"/>
            <h1>{{$movie->primaryTitle}}</h1>
            <p class="year">Date de sortie : {{$movie->startYear}}</p>
            <p>Durée : {{$movie->runtimeMinutes}} minutes</p>
            <p>{{$movie->plot}}</p>
            <p>{{$movie->averageRating}}/10 - {{$movie->numVotes}} avis</p>
        </div>
    </div>
</body>
</html>
