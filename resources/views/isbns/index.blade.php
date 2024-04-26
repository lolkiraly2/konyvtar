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
            <button><a href="{{ route('isbns.create') }}">Új ISBN</a></button>
            <table>

                <tr>
                    <th>ISBN szám</th>
                    <th>Író</th>
                    <th>Cím</th>
                    <th>Kiadó</th>
                    <th>Kiadás éve</th>
                    <th></th>
                </tr>

                @foreach($isbns as $isbn)
                <tr>
                    <td><a href="{{ route('isbns.show', $isbn->isbn) }}">{{ $isbn->isbn }}</a></td>
                    <td>{{ $isbn->writer}}</td>
                    <td>{{ $isbn->title }}</td>
                    <td>{{ $isbn->publisher}}</td>
                    <td>{{ $isbn->publishedAt}}</td>
                    <td><a href="{{ route('isbns.edit', $isbn->isbn) }}">Szerkesztés</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>