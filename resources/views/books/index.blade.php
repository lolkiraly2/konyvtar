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
            <!-- szűrő felület helye -->
            <form action="{{ route('books.index') }}" class="personform">
                <select name="Soption" id="Soption">
                    <option value="inventorynumber">Leltári szám</option>
                    <option value="isbn_id">ISBN szám</option>
                    <option value="title">Cím</option>
                </select> <br>
                <div id="personinput">
                    <input type="text" name="value" id="value"> <br>
                </div>

                <input type="submit" value="Szűrés" placeholder="Szűrés feltétele">
            </form>
        </div>

        <div class="basis-6/8">
            <button><a href="{{ route('books.create') }}">Új Könyv rögzítés</a></button>
            <table>

                <tr>
                    <th>Leltári szám:</th>
                    <th>ISBN</th>
                    <th>Cím</th>
                    <th></th>
                </tr>

                @foreach($books as $book)
                <tr>
                    <td><a href="{{ route('books.show', $book->inventorynumber) }}">{{ $book->inventorynumber }}</a></td>
                    <td>{{ $book->isbn}}</td>
                    <td>{{ $book->title }}</td>
                    <td><a href="{{ route('books.edit', $book->inventorynumber) }}">Szerkesztés</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>