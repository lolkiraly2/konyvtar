<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISBN számok</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header')
    @include('layout.menu')

    <div class="flex flex-row w-4/5 mx-auto mt-10">
        <div class="basis-2/8">
            <!-- szűrő felület helye -->
            <form action="{{ route('isbns.index') }}" class="personform">
                <select name="Soption" id="Soption">
                    <option value="isbn">ISBN szám</option>
                    <option value="writer">Író</option>
                    <option value="title">Cím</option>
                    <option value="publisher">Kiadó</option>
                    <option value="PublishedAt">Kiadás éve</option>
                </select> <br>
                <div id="personinput">
                    <input type="text" name="value" id="value" placeholder="Szűrés feltétele"> <br>
                </div>

                <input type="submit" value="Szűrés">
            </form>
        </div>

        <div class="basis-6/8">
            <button><a href="{{ route('isbns.create') }}">Új ISBN</a></button>
            <p>@if(isset($value)) Szűrés: {{$option}}: {{$value}} @endif</p>
            <table>

                <tr>
                    <th>ISBN szám</th>
                    <th>Cím</th>
                    <th>Író</th>
                    <th>Kiadó</th>
                    <th>Kiadás éve</th>
                    <th></th>
                </tr>

                @foreach($isbns as $isbn)
                <tr>
                    <td><a href="{{ route('isbns.show', $isbn->isbn) }}">{{ $isbn->isbn }}</a></td>
                    <td>{{ $isbn->title }}</td>
                    <td>{{ $isbn->writer}}</td>
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