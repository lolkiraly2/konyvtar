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

    <div class="flex flex-row w-4/5 mx-auto mt-10">
        <div class="basis-2/8">
            szűrő felület helye
        </div>

        <div class="basis-6/8">
            <button><a href="{{ route('people.create') }}">Új tag</a></button>
            <table>

                <tr>
                    <th>Név</th>
                    <th>Irányítószám</th>
                    <th>Város</th>
                    <th>Utca</th>
                    <th>típus</th>
                    <th>elérhetőség</th>
                    <th></th>
                </tr>

                @foreach($people as $person)
                <tr>
                    <td><a href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a></td>
                    <td>{{ $person->postcode}}</td>
                    <td>{{ $person->city }}</td>
                    <td>{{ $person->street}}</td>
                    <td>{{ $person->typename()}}</td>
                    <td>{{ $person->contact }}</td>
                    <td><a href="{{ route('people.edit', $person->id) }}">Szerkesztés</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>