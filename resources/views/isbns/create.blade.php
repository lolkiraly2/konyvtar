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
                <form action="{{route('isbns.store')}}" class="personform" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 items-center">
                        <label for="isbn">ISBN szám: </label>
                        <input type="text" id="isbn" name="isbn" require value="{{old('isbn')}}">

                        <label for="writer">Író: </label>
                        <input type="text" id="writer" name="writer" require value="{{old('writer')}}">

                        <label for="title">Cím: </label>
                        <input type="text" id="title" name="title" require value="{{old('title')}}">

                        <label for="publisher">Kiadó:</label>
                        <input type="text" id="publisher" name="publisher" require value="{{old('publisher')}}">

                        <label for="publishedAt">Kiadás éve:</label>
                        <input type="text" id="publishedAt" name="publishedAt" require value="{{old('publishedAt')}}">

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
                @include('layout.errors')
            </div>
        </div>
    </div>
</body>

</html>