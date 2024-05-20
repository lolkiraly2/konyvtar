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
        <!-- <div class="basis-2/8">
            szűrő felület helye
        </div> -->

        <div class="basis-6/8">
            <table>

                <tr>
                    <th>Kölcsönzés azonosító</th>
                    <th>Leltáriszám</th>
                    <th>Könyv címe</th>
                    <th>kölcsönző személy</th>
                    <th>Kikölcsönözte</th>
                    <th>Visszahozta</th>

                </tr>

                @foreach($renthistories as $renthistory)
                <tr>
                    <td>{{ $renthistory->id }}</td>
                    <td>{{ $renthistory->inumber }}</td>
                    <td>{{ $renthistory->findtitle() }}</td>
                    <td>{{ $renthistory->findname() }}</td>
                    <td>{{ $renthistory->rentdate}}</td>
                    <td>{{ $renthistory->tookback}}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>

</html>