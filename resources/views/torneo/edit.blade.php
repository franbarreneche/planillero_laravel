@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="card">
        <header class="card-header-title">
            <div class="card-title">Datos</div>
        </header>
        <div class="card-content">
            <form method='POST' action="{{route('torneos.update',$torneo->id)}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Nombre</label>
                    <div class="control">
                        <input class="input" name="nombre" type="text" value="{{$torneo->nombre}}">
                    </div>
                    @error('nombre')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Año</label>
                    <div class="control">
                        <input class="number" type="number" name="anio" value={{$torneo->anio}} min=2000 max=2100>
                    </div>
                    @error('anio')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Temporada</label>
                    <div class="control">
                        <div class="select">
                            <select name="temporada">
                                @for ($i = 0; $i < count($torneo::TEMPORADAS); $i++) @if($torneo::TEMPORADAS[$i]==$torneo->temporada)
                                    <option value="{{$torneo::TEMPORADAS[$i]}}" selected>{{$torneo::TEMPORADAS[$i]}}</option>
                                    @else
                                    <option value="{{$torneo::TEMPORADAS[$i]}}">{{$torneo::TEMPORADAS[$i]}}</option>
                                    @endif
                                    @endfor
                            </select>
                        </div>
                    </div>
                    @error('temporada')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <label class="label">Género</label>
                        @for ($i = 0; $i < count($torneo::GENEROS); $i++) <label class="radio">
                            @if($torneo::GENEROS[$i] == $torneo->genero)
                            <input type="radio" name="genero" value="{{$torneo::GENEROS[$i]}}" checked>
                            @else
                            <input type="radio" name="genero" value="{{$torneo::GENEROS[$i]}}">
                            @endif
                            {{$torneo::GENEROS[$i]}}
                            </label>
                            @endfor
                    </div>
                    @error('genero')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Modo</label>
                    <div class="control">
                        <div class="select">
                            <select name="modo">
                                @for ($i = 0; $i < count($torneo::MODOS); $i++) @if($torneo::MODOS[$i]==$torneo->modo)
                                    <option value="{{$torneo::MODOS[$i]}}" selected>{{$torneo::MODOS[$i]}}</option>
                                    @else
                                    <option value="{{$torneo::MODOS[$i]}}">{{$torneo::MODOS[$i]}}</option>
                                    @endif
                                    @endfor
                            </select>
                        </div>
                    </div>
                    @error('modo')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">Actualizar</button>
                    </div>
                    <div class="control">
                        <a href="{{route('torneos.index')}}" class="button is-link is-light">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card events-card">
        <header class="card-header">
            <p class="card-header-title">
                Equipos
            </p>
            <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
            </a>
        </header>
        <div class="card-table">
            <div class="content">
                <table class="table is-fullwidth is-striped">
                    <tbody>
                        @foreach($torneo->equipos as $equipo)
                        <form action="{{route('equipos.destroy',$equipo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>{{$equipo->nombre}}</td>
                                <td class="level-right"><span><a class="button is-small is-dark" href="{{route('equipos.edit',$equipo->id)}}">Editar</a></span><span><button type="submit" class="button is-small is-danger">Eliminar</button></span></td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer">
            <div class="card-footer-item">
                <form action="{{route('equipos.storeBatch',$torneo->id)}}" method="POST">
                    @csrf
                    <div id="inputEquipo" class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Nombre</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <input name="nombre[]" class="input" type="text" placeholder="Nombre">
                            </div>
                        </div>
                        <a class="delete"></a>
                    </div>
                    <div class="field">
                        <div class="control is-grouped">
                            <button type="button" id="agregarInputEquipo" class="button is-info">+</button>
                            <button type="submit" class="button is-primary">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </footer>
    </div>


    <div class="card events-card">
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
                <table class="table is-fullwidth is-striped">
                    <thead>
                        <th>Fecha</th>
                        <th>Equipos</th>
                        <th>Hora</th>
                        <th>Sede</th>
                        <th>Matchday</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($torneo->partidos as $partido)
                        <form action="{{route('partidos.destroy',$partido->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <tr>
                                <td width="10%">{{$partido->fecha->format('d-m-Y')}}</td>
                                <td>{{$partido->local->nombre}} vs {{$partido->visitante->nombre}}</td>
                                <td>{{$partido->hora}}</td>
                                <td>{{$partido->sede->nombre}}</td>
                                <td>{{$partido->matchday}}</td>
                                <td class="level-right"><span><a class="button is-small is-dark" href="{{route('partidos.edit',$partido->id)}}">Editar</a></span><span><button type="submit" class="button is-small is-danger">Eliminar</button></span></td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer">
            <div class="card-footer-item">
                <form action="{{route('partidos.storeBatch',$torneo->id)}}" method="POST">
                    @csrf
                    <div id="inputPartido" class="field is-horizontal">                        
                        <div class="field-label is-normal">
                            <label class="label">Local</label>
                        </div>
                        <div class="field-body">
                            <div class="select">
                                <select name="local[]" required>
                                    @foreach($torneo->equipos as $equipo)
                                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">Visitante</label>
                        </div>
                        <div class="field-body">
                            <div class="select">
                                <select name="visitante[]" required>
                                    @foreach($torneo->equipos as $equipo)
                                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">Fecha</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <input name="fecha[]" class="input" type="date" required>
                            </div>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">Hora</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <input name="hora[]" class="input" type="time" required>
                            </div>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">MD</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <input name="matchday[]" class="input" type="text" required>
                            </div>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">Sede</label>
                        </div>
                        <div class="field-body">
                            <div class="select">
                                <select name="sede[]" required>
                                    @foreach($sedes as $sede)
                                    <option value="{{$sede->id}}">{{$sede->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a class="delete"></a>
                    </div>
                    <div class="field">
                        <div class="control is-grouped">
                            <button type="button" id="agregarInputPartido" class="button is-info">+</button>
                            <button type="submit" class="button is-primary">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </footer>
    </div>
</section>
@endsection

<script>
    window.addEventListener('DOMContentLoaded', function() {
        //para agregar muchos equipos
        var boton = document.getElementById('agregarInputEquipo');
        boton.addEventListener('click', agregarInputEquipo);

        function agregarInputEquipo(e) {
            var modeloEquipo = document.getElementById('inputEquipo');
            var clon = modeloEquipo.cloneNode(true);
            modeloEquipo.parentNode.insertBefore(clon, modeloEquipo);
            agregarListenerInput(clon);
        }

        //para agregar muchos partidos
        boton = document.getElementById('agregarInputPartido');
        boton.addEventListener('click', agregarInputPartido);

        function agregarInputPartido(e) {
            var modeloPartido = document.getElementById('inputPartido');
            var clon = modeloPartido.cloneNode(true);
            modeloPartido.parentNode.insertBefore(clon, boton.parentNode.parentNode);
            agregarListenerInput(clon);
        }

        document.querySelectorAll('.delete').forEach(elem => elem.addEventListener('click',eliminarInput));
        //agregar listener a todos los .delete
        function agregarListenerInput(boton) {
            var del = boton.querySelector('.delete');
            del.addEventListener('click',eliminarInput);
        }

        //implementacion listener delte
        function eliminarInput(elem) {
            var papa = elem.currentTarget.parentNode;
            papa.remove();
        }

    });
</script>