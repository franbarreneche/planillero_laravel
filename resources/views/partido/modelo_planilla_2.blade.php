<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Planillero Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>

<body>
    @foreach ($partidos as $partido)
    <section class="section">
        <div class="container"> 
        <div class="table-container mb-4">
                <table class="table is-bordered is-narrow is-fullwidth">
                    <tbody>
                        <td width="40%"><h1>{{$partido->local->nombre}}</h1></td>
                        <td></td>
                        <td></td>
                        <td width="40%"><h1>{{$partido->visitante->nombre}}</h1></td>
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
                            <td width="5%"></td>
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
                        @for($i=0;$i < 20; $i++)
                        <tr>
                            <td width="5%"></td>
                            <td>
                            @if($i< count($jugadores_local))
                            {{$jugadores_local[$i]}}
                            @else
                            {{$i}}
                            @endif
                            </td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td>
                            @if($i < count($jugadores_visitante) )
                            {{$jugadores_visitante[$i]}}
                            @else
                            {{$i}}
                            @endif
                            </td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td width="5%"></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endforeach
</body>

</html>