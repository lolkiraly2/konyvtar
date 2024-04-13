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
            <button class="bg-indigo-600 p-1 mb-5">Új Kölcsönzés</button>
            <table>

                <tr>
                    <th>Leltáriszám</th>
                    <th>ISBN</th>
                    <th>Címe</th>
                    <th>Szerzője</th>
                    <th>Kiadója</th>
                    <th>Kiadás éve</th>
                </tr>

                @foreach($konyv as $sor)
                <tr>
                    <td>{{ $sor->inventorynumber }}</td>
                    <td>{{ $sor->isbn->isbn }}</td>
                    <td>{{ $sor->isbn->title }}</td>
                    <td>{{ $sor->isbn->writer }}</td>
                    <td>{{ $sor->isbn->publisher }}</td>
                    <td>{{ $sor->isbn->publishedAt }}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>