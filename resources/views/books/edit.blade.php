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
        <div class="w-3/4 ">
            <div>
                <form action="{{route('books.update', $book->inventorynumber)}}" class="personform" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 items-center">

                        <label for="inventorynumber">Leltári szám:</label>
                        <input type="text" id="inventorynumber" name="inventorynumber" value="{{ $book->inventorynumber}}" require>

                        <label for="isbn">Isbn:</label>
                        <select name="isbn" id="isbn">
                            @foreach ($isbns as $isbn)
                            <option value="{{ $isbn }}"  @if($book->isbn->isbn == $isbn) selected @endif>{{ $isbn}}</option>
                            @endforeach
                        </select>

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
            </div>

            <div>
                <form action="{{ route('books.destroy', $book->inventorynumber) }}" class="personform" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" id="persondelete" value="Törlés">
                </form>
            </div>
        </div>
    </div>
</body>

</html>