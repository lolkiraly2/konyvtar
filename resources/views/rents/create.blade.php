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
                <form action="{{route('rents.store')}}" class="personform" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 items-center">
                        <label for="personSelect">Kölcsönző személy: </label>
                        <select name="personSelect" id="personSelect">
                            <option value="0">Válassz egy nevet</option>
                            @foreach ($people as $person)
                            <option value="{{ $person->id }}">{{ $person->name}}</option>
                            @endforeach
                        </select>

                        <div id="personData" class="col-span-full"></div>


                        <label for="inumber">Könyv Leltáriszáma: </label>
                        <select name="inumber" id="inumber">
                            <option value="0">Válassz egy könyvet</option>
                            @foreach ($inumbers as $inumber)
                            <option value="{{ $inumber->inventorynumber }}">{{ $inumber->inventorynumber}}</option>
                            @endforeach
                        </select>

                        <label for="booktitle">Könyv címe:</label>
                        <input type="text" name="booktitle" id="booktitle" readonly>

                        <label for="rentdate">Kölcsönzés napja: </label>
                        <input type="date" name="rentdate" id="rentdate" value="{{date('Y-m-d')}}" readonly>

                        <label for="expiredate">Kölcsönzés lejártja: </label>
                        <input type="date" name="expiredate" id="expiredate" value="" readonly>

                        <input type="submit" id="saverent" value="Kölcsönzés" class="col-span-full" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="{{ URL::asset('js/rent.js') }}"></script>
<script>
    //Személy választás
    document.getElementById('personSelect').addEventListener('change', function() {
        var personId = this.value;
        console.log("Választott ID: " + personId)
        if (personId) {
            fetch("{{ route('get.persondata') }}?person_id=" + personId)
                .then(response => response.json())
                .then(data => {
                    if (data.type !== "professor") {
                        if (CanRent(data.type, data.borrowCount)) {
                            let number = remainrents(data.type, data.borrowCount)
                            document.getElementById('personData').innerHTML = "Az illető még " + number + " könyvet kölcsönözhet"
                            document.getElementById('saverent').disabled = false;
                            document.getElementById('expiredate').value = SetExpireDate(data.type);

                        } else {
                            document.getElementById('personData').innerHTML = "Az illető már nem kölcsönözhet több könyvet";
                            document.getElementById('saverent').disabled = true;
                            document.getElementById('expiredate').value = "";
                        }
                    } else {
                        document.getElementById('personData').innerHTML = "A tanárok bármennnyi könyvet kikölcsönözhetnek!"
                        document.getElementById('saverent').disabled = false;
                        document.getElementById('expiredate').value = SetExpireDate(data.type);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        //Lett-e kiválasztva könyv vagy személy a személy választás után
        if (document.getElementById('personSelect').value == "0") {
            document.getElementById('saverent').disabled = true;
            document.getElementById('expiredate').value = "";
        }

        if (document.getElementById('inumber').value == "0") {
            document.getElementById('saverent').disabled = true;
            document.getElementById('expiredate').value = "";
        }
        //Hiba: könyv kiválasztása nélkül is lehet kölcsönözni, lehet mivel nem kap választ a Json tól az utolsó if nem fut le
    });

    //Könyv változás
    document.getElementById('inumber').addEventListener('change', function() {
        var inumber = this.value;
        //console.log("Választott könyv leltári száma: " + inumber)
        if (inumber) {
            fetch("{{ route('get.bookdata') }}?inumber=" + inumber)
                .then(response => response.json())
                .then(data => {
                    //console.log(data)
                    document.getElementById('booktitle').value = data[0].title;
                })
                .catch(error => console.error('Error:', error));
        }

        //Lett-e kiválasztva könyv vagy személy a személy választás után
        if (document.getElementById('personSelect').value == "0") {
            document.getElementById('saverent').disabled = true;
            document.getElementById('expiredate').value = "";
        }

        if (document.getElementById('inumber').value == "0") {
            document.getElementById('saverent').disabled = true;
            document.getElementById('expiredate').value = "";
            document.getElementById('booktitle').value = "";
        }
    });
</script>

</html>