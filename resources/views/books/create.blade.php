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
                <form action="{{route('books.store')}}" class="personform" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 items-center">

                        <label for="inventorynumber">Leltári szám:</label>
                        <input type="text" id="inventorynumber" name="inventorynumber" require placeholder="100 és 9999999 közötti szám">

                        <label for="title">Könyv címe:</label>
                        <select name="title" id="title">
                            @foreach ($titles as $title)
                            <option value="{{ $title }}" {{ old('title') == $title ? 'selected' : '' }}>{{ $title}}</option>
                            @endforeach
                        </select>

                        <label for="isbn_id">ISBN:</label>
                        <input type="text" id="isbn_id" name="isbn_id" require readonly>

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
                @include('layout.errors')
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
                    document.getElementById('isbn_id').value = data
                })
                .catch(error => console.error('Error:', error));
        }

    });

    //isbn mező kitöltése az oldal megnyitása után
    window.addEventListener("load", (event) => {
        var title = document.getElementById('title').value;
        if (title) {
            fetch("{{ route('get.isbn') }}?title=" + title)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('isbn_id').value = data
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>

</html>