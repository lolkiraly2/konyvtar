<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tag</title>
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

            <div class="mt-5">
                <p>Aktuális Kölcsönzések</p>
                <table>

                    <tr>
                        <th>Kölcsönzés azonosító</th>
                        <th>Leltáriszám</th>
                        <th>Könyv címe</th>
                        <th>Kikölcsönözte</th>
                        <th>Várt visszahozás</th>
                    </tr>

                    @foreach($rentingbooks as $rentingbook)
                    <tr>
                        <td>{{ $rentingbook->id }}</td>
                        <td>{{ $rentingbook->inumber }}</td>
                        <td>{{ $rentingbook->isbn->title }}</td>
                        <td>{{ $rentingbook->rentdate}}</td>
                        <td>{{ $rentingbook->expiredate}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>

            <div class="mt-5">
                <p>Korábbi Kölcsönzések</p>
                <table>

                    <tr>
                        <th>Kölcsönzés azonosító</th>
                        <th>Leltáriszám</th>
                        <th>Könyv címe</th>
                        <th>Kikölcsönözte</th>
                        <th>Visszahozta</th>
                    </tr>

                    @foreach($rentedbooks as $rentedbook)
                    <tr>
                        <td>{{ $rentedbook->id }}</td>
                        <td>{{ $rentedbook->inumber }}</td>
                        <td>{{ $rentedbook->findtitle() }}</td>
                        <td>{{ $rentedbook->rentdate}}</td>
                        <td>{{ $rentedbook->tookback}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</body>

</html>