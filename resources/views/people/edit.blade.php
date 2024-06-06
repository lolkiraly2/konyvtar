<?php
function typename($type)
{
    switch ($type) {
        case 'student':
            return 'Diák';
        case 'professor':
            return 'Professzor';
        case 'fromElsewhere':
            return 'Másik egyetemi';
        case 'other':
            return 'Külsős';
    }
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagok szerkesztése</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header')
    @include('layout.menu')

    <div class="flex flex-row w-4/5 mx-auto mt-10 justify-center">
        <div class="w-3/4 ">
            <div>
                <form action="{{route('people.update', $person->id)}}" class="personform" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 items-center">
                        <label for="name">Név: </label>
                        <input type="text" id="name" name="name" require value="{{$person->name}}">

                        <label for="postcode">Irányítószám: </label>
                        <input type="text" id="postcode" name="postcode" require value="{{$person->postcode}}">

                        <label for="city">Város: </label>
                        <input type="text" id="city" name="city" require value="{{$person->city}}">

                        <label for="street">Utca</label>
                        <input type="text" id="street" name="street" require value="{{$person->street}}">

                        <label for="number">Házszám</label>
                        <input type="text" id="number" name="number" require value="{{$person->number}}">

                        <label for="type">Kategória:</label>
                        <select name="type" id="type">
                            @foreach ($types as $type)
                            <option value="{{ $type }}" @if($person->type == $type) selected @endif>{{ typename($type)}}</option>
                            @endforeach
                        </select>

                        <label for="contact">Elérhetőség: </label>
                        <input type="email" id="contact" name="contact" require value="{{$person->contact}}">

                        <input type="number" name="borrowCount" id="borrowCount" value="{{$person->borrowCount}}" readonly hidden>

                        <input type="submit" value="Mentés" class="col-span-full">
                    </div>
                </form>
                @include('layout.errors')
            </div>

            <div>
                @if($hasbook == false)
                <form action="{{ route('people.destroy', $person->id) }}" class="personform" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" id="persondelete" value="Törlés">
                </form>
                @else
                <p>A tag nem törölhető, mert még van nála könyv!</p>
                @endif
            </div>
            

        </div>
    </div>
</body>

</html>