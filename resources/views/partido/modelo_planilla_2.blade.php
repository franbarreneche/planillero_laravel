<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Planillero Laravel</title>

    <style>
       table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  text-align: left;
}
.medio {
    border-bottom: 1px solid white;
}
.page-break {
    page-break-after: always;
}
    </style>
</head>

<body>
    @foreach ($partidos as $partido)
    <section class="section">
        <div class="container">
            <div class="table-container mb-4">
                <table class="table is-bordered is-narrow is-fullwidth">
                    <tbody>
                        <td width="40%">
                            <h3>{{$partido->local->nombre}}</h3>
                        </td>
                        <td></td>
                        <td></td>
                        <td width="40%">
                            <h3>{{$partido->visitante->nombre}}</h3>
                        </td>
                    </tbody>
                </table>
            </div>
            <div class="table-container is-size-7">
                <table class="table is-bordered is-narrow is-fullwidth">
                    <thead>
                        <tr>
                            <td width="5%">N°</td>
                            <td>Jugador 1</td>
                            <td width="5%">G</td>
                            <td width="5%">A</td>
                            <td width="5%">R/A</td>
                            <td width="5%" class="medio"></td>
                            <td width="5%">N°</td>
                            <td>Jugador 2</td>
                            <td width="5%">G</td>
                            <td width="5%">A</td>
                            <td width="5%">R/A</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $jugadores_local = explode("\n",$partido->local->jugadores);
                        $jugadores_visitante = explode("\n",$partido->visitante->jugadores);
                        @endphp
                        @for($i=0;$i < 20; $i++) <tr>
                            <td width="5%"></td>
                            <td>
                                @if($i< count($jugadores_local)) {{$jugadores_local[$i]}} @else {{$i}} @endif </td> <td width="5%">
                            </td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td width="5%" class="medio"></td>
                            <td width="5%"></td>
                            <td>
                                @if($i < count($jugadores_visitante) ) {{$jugadores_visitante[$i]}} @else {{$i}} @endif </td> <td width="5%">
                            </td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="page-break"></div>
    @endforeach
</body>

</html>