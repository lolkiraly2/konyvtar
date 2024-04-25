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
        <button><a href="{{ route('people.index') }}">Vissza</a></button>

            <p>Olvasószám: {{$person->id}}</p>
            <p>Név: {{$person->name}}</p>
            <p>Irányítószám: {{$person->postcode}}</p>
            <p>Város: {{$person->city}}</p>
            <p>Utca/ házszám: {{$person->street}} {{$person->number}}.</p>
            <p>típus: {{ $person->typename()}}</p>
            <p>elérhetősév: {{ $person->contact}}</p>

        </div>
    </div>
</body>

</html>