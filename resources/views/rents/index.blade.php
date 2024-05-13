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
        <!-- <div class="basis-2/8">
            szűrő felület helye
        </div> -->

        <div class="basis-6/8">
        <button><a href="{{ route('rents.create') }}">Új kölcsönzés</a></button>
            <table>

                <tr>
                    <th>Kölcsönzés azonosító</th>
                    <th>Leltáriszám</th>
                    <th>Könyv címe</th>
                    <th>kölcsönző személy</th>
                    <th>Kikölcsönözte</th>
                    <th>Várt visszahozás</th>
                    <th></th>
                </tr>

                @foreach($rents as $rent)
                <tr>
                    <td>{{ $rent->id }}</td>
                    <td>{{ $rent->inumber }}</td>
                    <td>{{ $rent->isbn->title }}</td>
                    <td>{{ $rent->person->name}}</td>
                    <td>{{ $rent->rentdate}}</td>
                    <td>{{ $rent->expiredate}}</td>
                    <td><a href="{{ route('rents.edit', $rent->id) }}">Szerkesztés</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>