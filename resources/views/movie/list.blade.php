<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/movie/list.css')}}">
    <title>Liste de films</title>
</head>
<body>
    <div class="page">
        <div class="list">
            @foreach ($movies as $movie)
                <div class="movie">
                    <img src="{{$movie->poster}}"/> 
                    <p>{{$movie->primaryTitle}}</p>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            @if ($page != 0)
                <a href="/movies?page={{$page - 1}}">< Page précédente</a>
            @endif
            <a href="/movies?page={{$page + 1}}">Page suivante ></a>
        </div>
    </div>
</body>
</html>