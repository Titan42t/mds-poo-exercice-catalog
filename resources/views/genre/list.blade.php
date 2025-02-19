<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/genre/list.css')}}">
    <title>Liste de genres</title>
</head>
<body>
    <div class="page">
        @foreach ($genres as $genre)
            <a href="/movies?genre={{$genre->label}}"><p class="genre">{{$genre->label}}</p></a>
        @endforeach
    </div>
</body>
</html>