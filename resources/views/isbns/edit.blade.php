<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISBN szám szerkesztés</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header')
    @include('layout.menu')

    <div class="flex flex-row w-4/5 mx-auto mt-10 justify-center">
        <div class="w-3/4 ">
            <div>
                <form action="{{route('isbns.update', $isbn->isbn)}}" class="personform" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 items-center">
                        <label for="isbn">ISBN szám: </label>
                        <input type="text" id="isbn" name="isbn" require value="{{ $isbn->isbn }}">

                        <label for="writer">Író: </label>
                        <input type="text" id="writer" name="writer" require value="{{ $isbn->writer }}">

                        <label for="title">Cím: </label>
                        <input type="text" id="title" name="title" require value="{{ $isbn->title }}">

                        <label for="publisher">Kiadó:</label>
                        <input type="text" id="publisher" name="publisher" require value="{{ $isbn->publisher }}">

                        <label for="publishedAt">Kiadás éve:</label>
                        <input type="text" id="publishedAt" name="publishedAt" require value="{{ $isbn->publishedAt }}">

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
                @include('layout.errors')
            </div>

            <div>
                @if($rented == false)
                <form action="{{ route('isbns.destroy', $isbn->isbn) }}" class="personform" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" id="persondelete" value="Törlés">
                </form>
                @else
                <p>Van legalább 1 olyan könyv, amihez ez az ISBN szám tartozik, és ki van kölcsönözve, ezért nem törölhető!</p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>