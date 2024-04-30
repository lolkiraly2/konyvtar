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
        <button><a href="{{ route('books.index') }}">Vissza</a></button>

            <p>Leltári szám: {{$book->inventorynumber}}</p>
            <p>ISBN: {{$book->isbn->isbn}}</p>

        </div>
    </div>
</body>

</html>