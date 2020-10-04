@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
        <form action="{{route('equipos.store')}}" method="POST">
            @csrf

            <div class="field">
                <label class="label">Torneo</label>
                <div class="control">
                    <div class="select">
                        <select name="torneo">
                        @foreach($torneos as $torneo)
                            <option value="{{$torneo->id}}">{{$torneo->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>                      
              @error('torneo')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" name="nombre" type="text" placeholder="Ej: PURO DADA">
                </div>
                @error('nombre')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>            

            <div class="field">
                <label class="label">Jugadores</label>
                <div class="control">
                    <textarea class="textarea" name="jugadores" placeholder="Lista jugadores..." rows=20></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-link">Crear</button>
                </div>
                <div class="control">
                    <a href="{{route('equipos.index')}}" class="button is-link is-light">Volver</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection