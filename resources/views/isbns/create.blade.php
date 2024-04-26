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
                        <input type="text" id="isbn" name="isbn" require>

                        <label for="writer">Író: </label>
                        <input type="text" id="writer" name="writer" require>

                        <label for="title">Cím: </label>
                        <input type="text" id="title" name="title" require>

                        <label for="publisher">Kiadó:</label>
                        <input type="text" id="publisher" name="publisher" require>

                        <label for="publishedAt">Kiadás éve:</label>
                        <input type="text" id="publishedAt" name="publishedAt" require>

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>