@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">

        <form method='POST' action="{{route('equipos.update',$equipo->id)}}">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label">Torneo</label>
                <div class="control">
                    <input class="input" name="torneo" type="text" value="{{$equipo->torneo->nombre.' - '.$equipo->torneo->anio.' - '.$equipo->torneo->temporada.' - '.$equipo->torneo->modo.' - '.$equipo->torneo->genero}}" disabled>
                </div>
                @error('torneo')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" name="nombre" type="text" value="{{$equipo->nombre}}">
                </div>
                @error('nombre')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Jugadores</label>
                <div class="control">
                    <textarea class="textarea" name="jugadores" rows=20>{{$equipo->jugadores}}</textarea>
                </div>
            </div>

            <div class="field is-grouped">                
                    <div class="control">
                        <button type="submit" class="button is-link is-info">Actualizar</button>
                    </div>               
                
                <div class="control">
                    <a href="{{route('equipos.index')}}" class="button is-link is-light">Volver</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection