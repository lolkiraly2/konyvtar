<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kölcsönzés szerkesztés</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header')
    @include('layout.menu')

    <div class="flex flex-row w-4/5 mx-auto mt-10 justify-center">
        <div class="w-3/4 ">
            <div>
                <form action="{{route('rents.update', $rent->id)}}" class="personform" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 items-center">
                        <label for="personid" hidden>personid</label>
                        <input type="text" name="personid" id="personid" readonly hidden value="{{$rent->person_id}}">

                        <label for="personname">Kölcsönző személy:</label>
                        <input type="text" name="personname" id="personname" readonly value="{{$rent->person->name}}">


                        <label for="inumber">Könyv Leltáriszáma: </label>
                        <input type="text" name="inumber" id="inumber" readonly value="{{$rent->inumber}}">


                        <label for="booktitle">Könyv címe:</label>
                        <input type="text" name="booktitle" id="booktitle" readonly value="{{$rent->isbn->title}}">

                        <label for="rentdate">Kölcsönzés napja: </label>
                        <input type="date" name="rentdate" id="rentdate" value="{{$rent->rentdate}}" readonly>

                        <label for="expiredate">Kölcsönzés lejártja: </label>
                        <input type="date" name="expiredate" id="expiredate" value="{{$rent->expiredate}}" readonly>

                        <label for="tookback">Visszahozta: </label>
                        <input type="date" name="tookback" id="tookback" value="{{date('Y-m-d')}}" readonly>

                        <input type="submit" id="saverent" value="Visszahozta" class="col-span-full">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>