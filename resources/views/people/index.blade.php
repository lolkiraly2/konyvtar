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

    <div class="flex flex-row w-4/5 mx-auto mt-10">
        <div class="basis-2/8">
            <!-- szűrő felület helye -->
            <form action="{{ route('people.index') }}" class="personform">
                <select name="Soption" id="Soption" onchange="pi()">
                    <option value="name">név</option>
                    <option value="postcode">Irányítószám</option>
                    <option value="city">Város</option>
                    <option value="street">Utca</option>
                    <option value="type">Típus</option>
                    <option value="contact">Elérhetőség</option>
                </select> <br>
                <div id="personinput">
                    <input type="text" name="value" id="value" placeholder="Szűrés feltétele"> <br>
                </div>

                <input type="submit" value="Szűrés">
            </form>
        </div>

        <div class="basis-6/8">
            <button><a href="{{ route('people.create') }}">Új tag</a></button>
            <p>@if(isset($value)) Szűrés: {{$option}}: {{$value}} @endif</p>
            <table>

                <tr>
                    <th>Név</th>
                    <th>Irányítószám</th>
                    <th>Város</th>
                    <th>Utca</th>
                    <th>típus</th>
                    <th>elérhetőség</th>
                    <th></th>
                </tr>

                @foreach($people as $person)
                <tr>
                    <td><a href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a></td>
                    <td>{{ $person->postcode}}</td>
                    <td>{{ $person->city }}</td>
                    <td>{{ $person->street}}</td>
                    <td>{{ $person->typename()}}</td>
                    <td>{{ $person->contact }}</td>
                    <td><a href="{{ route('people.edit', $person->id) }}">Szerkesztés</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

<script>
    function pi() {
        let value = document.getElementById('Soption').value

        if (value === 'type') {
            document.getElementById('personinput').innerHTML = "";
            document.getElementById('personinput').innerHTML = '<select name="value" id="value"><option value="student">Diák</option>' +
                '<option value="professor">Professor</option><option value="fromElsewhere">Másik egyetemi</option><option value="other">Külsős</option> </select>';
        } else {
            document.getElementById('personinput').innerHTML = "";
            document.getElementById('personinput').innerHTML = '<input type="text" name="value" id="value"> <br>';
        }
    }
</script>

</html>