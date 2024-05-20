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
                        <select name="personSelect" id="personSelect" onchange="changename()">
                            <option value="0">Válassz egy nevet</option>
                            @foreach ($people as $person)
                            <option value="{{ $person->id }}">{{ $person->name}}</option>
                            @endforeach
                        </select>

                        <div id="personData" class="col-span-full"></div>

                        <label for="title">Könyv címe: </label>
                        <select name="title" id="title" onchange="changetitle()">
                            <option value="0">Válassz egy könyvet</option>
                            @foreach ($titles as $t)
                            <option value="{{ $t->title }}">{{ $t->title}}</option>
                            @endforeach
                        </select>


                        <label for="inumber">Leltári szám: </label>
                        <select name="inumber" id="inumber">
                        </select>


                        <label for="rentdate">Kölcsönzés napja: </label>
                        <input type="date" name="rentdate" id="rentdate" value="{{date('Y-m-d')}}" readonly>

                        <label for="expiredate">Kölcsönzés lejártja: </label>
                        <input type="date" name="expiredate" id="expiredate" value="" readonly>

                        <input type="submit" id="saverent" value="Kölcsönzés" class="col-span-full" style="display:none">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="{{ URL::asset('js/rent.js') }}"></script>
<script>
    let kolcsonozhet = true;

    function changename() {
        var personId = document.getElementById('personSelect').value
        console.log("Választott ID: " + personId)
        if (personId) {
            fetch("{{ route('get.persondata') }}?person_id=" + personId)
                .then(response => response.json())
                .then(data => {
                    
                    if (data.type !== "professor") {           
                        if (CanRent(data.type, data.borrowCount)) {
                            let number = remainrents(data.type, data.borrowCount)
                            document.getElementById('personData').innerHTML = "Az illető még " + number + " könyvet kölcsönözhet!"
                            document.getElementById('expiredate').value = SetExpireDate(data.type);
                            kolcsonozhet = true

                        } else {
                            document.getElementById('personData').innerHTML = "Az illető már nem kölcsönözhet több könyvet!";
                            document.getElementById('expiredate').value = "";
                            kolcsonozhet = false
                        }
                    } else {
                        document.getElementById('personData').innerHTML = "A tanárok bármennnyi könyvet kikölcsönözhetnek!"
                        document.getElementById('expiredate').value = SetExpireDate(data.type);
                        kolcsonozhet = true
                    }

                    inumbercheck()
                    inumbercheck2()
                    if (document.getElementById('personSelect').value != "0" && inumbercheck() && kolcsonozhet == true)
                        document.getElementById('saverent').style.display = "block";
                    else
                        document.getElementById('saverent').style.display = "none";
                })
                .catch(error => console.error('Error:', error));


        }
    }

    function changetitle() {
        var title = document.getElementById('title').value
        if (title) {
            fetch("{{ route('get.bookdata') }}?title=" + title)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    document.getElementById("inumber").innerHTML = "";
                    if (data.length === 0) {
                        let newOption = document.createElement("option");
                        newOption.textContent = "Nincs kikölcsönözhető könyv!";
                        newOption.value = "0";
                        document.getElementById("inumber").appendChild(newOption);
                    } else {
                        for (let i = 0; i < data.length; i++) {
                            let newOption = document.createElement("option");
                            newOption.textContent = data[i].inventorynumber;
                            newOption.value = data[i].inventorynumber;
                            console.log(newOption)
                            document.getElementById("inumber").appendChild(newOption);
                        }
                    }

                    console.log("inumber value: " + document.getElementById('inumber').value)
                    inumbercheck()
                    inumbercheck2()
                    if (document.getElementById('personSelect').value != "0" && inumbercheck() && kolcsonozhet == true)
                        document.getElementById('saverent').style.display = "block";
                    else
                        document.getElementById('saverent').style.display = "none";
                })
                .catch(error => console.error('Error:', error));
        }
    }

    function inumbercheck() {
        if (document.getElementById('inumber').length == 0)
            return false //console.log("Üres az inumber")
        else if (document.getElementById('inumber').value == "0")
            return false //console.log("nincs könyv")
        else
            return true //console.log("van könyv")
    }

    function inumbercheck2() {
        if (document.getElementById('inumber').length == 0)
            console.log("Üres az inumber")
        else if (document.getElementById('inumber').value == "0")
            console.log("nincs könyv")
        else
            console.log("van könyv")
    }
</script>

</html>