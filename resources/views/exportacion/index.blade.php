@extends('layout.main_layout')
@section('content')
<section class="mt-4 container">
    <div class="box">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Torneo</label>
            </div>
            <div class="field-body">
                <div class="select">
                    <select name="torneo">
                        <option value="1">Torneo 1</option> 
                    </select>
                </div>
            </div>
            <div class="field-label is-normal">
                <label class="label">Temporada</label>
            </div>
            <div class="field-body">
                <div class="select">
                    <select name="torneo">
                        <option value="1">Temporada 1</option> 
                    </select>
                </div>
            </div>
            <div class="field-label is-normal">
                <label class="label">Fecha</label>
            </div>
            <div class="field-body">
                <input type="date" class="input">
            </div>
            <div class="field-label is-normal">
                <label class="label">Sede</label>
            </div>
            <div class="field-body">
                <div class="select">
                    <select name="sede">
                        <option value="1">Sede 1</option> 
                    </select>
                </div>
            </div>
        </div>        
    </div>

    <!-- -->
    <div class="card events-card">
        <form action="{{route('partidos.exportar.pdf')}}" method="GET">
            <header class="card-header">
                <p class="card-header-title">
                    Partidos
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-striped">
                        <thead>
                            <th><input id="selectAll" type="checkbox"></th>
                        <th>Fecha</th>                                           
                        <th>Local</th>
                        <th>Vistante</th>
                        <th>Hora</th>
                        <th>Torneo</th>
                        <th></th>
                        </thead>
                        <tbody id="tablaPartidos">
                            @foreach($partidos as $partido)
                            <tr>
                                <!-- <td width="5%"><i class="fa fa-bell-o"></i></td> -->
                                <td width="3%"><input type="checkbox" name="partidos[]" value="{{$partido->id}}"> </td>
                                <td>{{$partido->fecha}}</td>
                                <td>{{$partido->local->nombre}}</td>
                                <td>{{$partido->visitante->nombre}}</td>
                                <td>{{$partido->hora}}</td>
                                <td><em>{{$partido->torneo->nombre}}</em></td>
                                <td class="level-right"><a class="button is-small is-primary" href="{{route('partidos.show',$partido->id)}}">Ver</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <div class="is-grouped">
                        <button class="button is-dark" type="submit">Exportar PDF</button>
                        <a class="button is-warning" type="submit">Exportar CSV</a>
                    </div>
                </div>
            </footer>
        </form>
    </div>
</section>
@endsection

<script>
    window.addEventListener('DOMContentLoaded',function() {
        var elem = document.getElementById('selectAll');
        elem.addEventListener('click',function(){
            var tabla = document.getElementById('tablaPartidos');
            var boxes = tabla.querySelectorAll('input');
            boxes.forEach(elem => {
                if(elem.checked ) elem.checked=false;
                else elem.checked = true;
            });
        });
    });
</script>