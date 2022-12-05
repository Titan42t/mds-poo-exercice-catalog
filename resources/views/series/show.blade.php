<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/series/show.css')}}">
    <title>{{$series->primaryTitle}}</title>
</head>
<body>
    <div class="page">
        <div class="series">
            <img src="{{$series->poster}}"/>
            <h1>{{$series->primaryTitle}}</h1>
            <p class="year">Date de sortie : {{$series->startYear}}</p>
            <p>Durée : {{$series->runtimeMinutes}} minutes</p>
            <p>{{$series->plot}}</p>
            <p>{{$series->averageRating}}/10 - {{$series->numVotes}} avis</p>
            <div>
                @foreach ($seasons as $season)
                    <a href="/series/{{$series->id}}/season/{{$season->seasonNumber}}"><p>Saison {{$season->seasonNumber}}</p></a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
