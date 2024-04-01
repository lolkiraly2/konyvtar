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
                    <th>Kölcsönzés azonosító</th>
                    <th>Leltáriszám</th>
                    <th>Könyv címe</th>
                    <th>kölcsönző személy</th>
                    <th>Kikölcsönözte</th>
                    <th>Várt visszahozás</th>
                    <th>Visszahozta</th>
                    <!-- Add more columns if needed -->
                </tr>

                @foreach($kolcsonzes as $sor)
                <tr>
                    <td>{{ $sor->id }}</td>
                    <td>{{ $sor->in }}</td>
                    <td>{{ $sor->title }}</td>
                    <td>{{ $sor->name}}</td>
                    <td>{{ $sor->rentdate}}</td>
                    <td>{{ $sor->expiredate}}</td>
                    <td>{{ $sor->tookback}}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>