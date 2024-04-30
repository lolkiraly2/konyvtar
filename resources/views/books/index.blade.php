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
                    <td>{{ $book->isbn->isbn}}</td>
                    <td>{{ $book->isbn->title }}</td>
                    <td><a href="{{ route('books.edit', $book->inventorynumber) }}">Szerkesztés</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>