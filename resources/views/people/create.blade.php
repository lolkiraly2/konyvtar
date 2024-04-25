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
                <form action="{{route('people.store')}}" class="personform" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 items-center">
                        <label for="name">Név: </label>
                        <input type="text" id="name" name="name" require>

                        <label for="postcode">Irányítószám: </label>
                        <input type="text" id="postcode" name="postcode" require>

                        <label for="city">Város: </label>
                        <input type="text" id="city" name="city" require>

                        <label for="street">Utca</label>
                        <input type="text" id="street" name="street" require>

                        <label for="number">Házszám</label>
                        <input type="text" id="number" name="number" require>

                        <label for="type">Kategória:</label>
                        <select name="type" id="type">
                            <option value="student">Diák</option>
                            <option value="professor">Professor</option>
                            <option value="fromElsewhere">Másik egyetemi</option>
                            <option value="other">Külsős</option>
                        </select>

                        <label for="contact">Elérhetőség: </label>
                        <input type="email" id="contact" name="contact">

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>