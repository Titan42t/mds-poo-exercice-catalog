<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/series/list.css')}}">
    <title>Liste de films</title>
</head>
<body>
    <div class="page">
        <div class="list">
            @foreach ($list as $series)
                <a href="/series/{{$series->id}}" class="series">
                    <div>
                        <img src="{{$series->poster}}"/> 
                        <div>
                            <p class="title">{{$series->primaryTitle}}</p>
                            <p class="date">{{$series->startYear}}</p>
                        </div>
                        <p class="avis">{{$series->averageRating}}/10 ⭐</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="pagination">
            @if ($page != 0)
                <a href="{{$list->appends(request()->query())->previousPageUrl()}}">< Page précédente</a>
            @endif
            <a href="{{$list->appends(request()->query())->nextPageUrl()}}">Page suivante ></a>
        </div>
        <div>
        </div>
    </div>
</body>
</html>