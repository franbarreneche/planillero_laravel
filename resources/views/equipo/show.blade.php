@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
        
        

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
                    <input class="input" name="nombre" type="text" value="{{$equipo->nombre}}" disabled>
                </div>
                @error('nombre')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>            

            <div class="field">
                <label class="label">Jugadores</label>
                <div class="control">
                    <textarea class="textarea" name="jugadores" rows=20 disabled>{{$equipo->jugadores}}</textarea>
                </div>
            </div>

            <div class="field is-grouped">
            <div class="control">
                <a href="{{route('equipos.edit',$equipo->id)}}" class="button is-link is-primary">Editar</a>
            </div>
            <div class="control">
                <a href="{{route('equipos.index')}}" class="button is-link is-light">Volver</a>
            </div>

            <form action="{{route('equipos.destroy',$equipo->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="control">
                    <button type="submit" class="button is-link is-danger">Eliminar</button>
                </div>
            </form>
        </div>
        
    </div>
</section>
@endsection