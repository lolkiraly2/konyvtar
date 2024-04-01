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
            <button class="bg-indigo-600 p-1 mb-5">Új tag</button>
            <table>

                <tr>
                    <th>Olvasószám</th>
                    <th>Név</th>
                    <th>Irányítószám</th>
                    <th>Város</th>
                    <th>Utca</th>
                    <th>típus</th>
                    <th>elérhetőség</th>
                </tr>

                @foreach($emberek as $sor)
                <tr>
                    <td>{{ $sor->id }}</td>
                    <td>{{ $sor->name }}</td>
                    <td>{{ $sor->postcode}}</td>
                    <td>{{ $sor->city }}</td>
                    <td>{{ $sor->street}}</td>
                    <td>{{ $sor->typename()}}</td>
                    <td>{{ $sor->contact }}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>