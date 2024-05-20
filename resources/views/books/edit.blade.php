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
                <form action="{{route('books.update',$book->inventorynumber)}}" class="personform" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 items-center">

                        <label for="inventorynumber">Leltári szám:</label>
                        <input type="text" id="inventorynumber" name="inventorynumber" value="{{$book->inventorynumber}}" require>

                        <label for="title">Könyv címe:</label>
                        <select name="title" id="title">
                            @foreach ($titles as $title)
                            @if($title == $selectedtitle->first())
                            <option value="{{ $title }}" selected>{{ $title }}</option>
                            @else
                            <option value="{{ $title }}">{{ $title }}</option>
                            @endif
                            @endforeach
                        </select>

                        <label for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" require value="{{$book->isbn_id}}" readonly>

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
            </div>

            <div>
                @if($booked == false)
                <form action="{{ route('books.destroy', $book->inventorynumber) }}" class="personform" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" id="persondelete" value="Törlés">
                </form>
                @else
                <p>Kikölcsönzött könyv nem törölhető!</p>
                @endif
            </div>
        </div>
    </div>
</body>

<script>
    //Cím változás
    document.getElementById('title').addEventListener('change', function() {
        var title = this.value;
        //console.log("Választott könyv leltári száma: " + inumber)
        if (title) {
            fetch("{{ route('get.isbn') }}?title=" + title)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('isbn').value = data
                })
                .catch(error => console.error('Error:', error));
        }

    });
</script>

</html>