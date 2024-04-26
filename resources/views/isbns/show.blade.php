<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvtár</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header')
    @include('layout.menu')

    <div class="flex flex-row w-4/5 mx-auto mt-10 justify-center">

        <div class="basis-6/8">
        <button><a href="{{ route('isbns.index') }}">Vissza</a></button>

            <p>ISBN: {{$isbn->isbn}}</p>
            <p>Írta: {{$isbn->writer}}</p>
            <p>Cím: {{$isbn->title}}</p>
            <p>Kiadó: {{$isbn->publisher}}</p>
            <p>Kiadva ekkor: {{$isbn->publishedAt}}</p>
        </div>
    </div>
</body>

</html>