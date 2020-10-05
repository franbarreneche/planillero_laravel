@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
        <form action="{{route('partidos.store')}}" method="POST">
            @csrf

            <div class="field">
                <label class="label">Torneo</label>
                <div class="control">
                    <input class="input" type="text" value="{{$torneo->nombre}}" name="torneo" disabled>
                    <input type="hidden" value="{{$torneo->id}}" name="torneo">
                </div>                      
              @error('torneo')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Fecha</label>
                <div class="control">                      
                    <input class="input" type="date" name="fecha" data-display-mode="inline" data-is-range="true" data-close-on-select="false">                    
                </div>                      
              @error('fecha')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Hora</label>
                <div class="control">                      
                    <input class="input" type="time" name="hora" data-display-mode="inline" data-is-range="true" data-close-on-select="false">                    
                </div>                      
              @error('hora')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Matchday</label>
                <div class="control">
                    <input class="input" name="matchday" type="text" maxlength="15">                    
                </div>                      
              @error('dia')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Sede</label>
                <div class="control">
                    <div class="select">
                        <select name="sede">
                        @foreach($sedes as $sede)
                            <option value="{{$sede->id}}">{{$sede->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>                      
              @error('sede')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>
            
            <div class="field">
                <label class="label">Euquipo Local</label>
                <div class="control">
                    <div class="select">
                        <select name="local">
                        @foreach($torneo->equipos as $equipo)
                            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>                      
              @error('local')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Euquipo Visitante</label>
                <div class="control">
                    <div class="select">
                        <select name="visitante">
                        @foreach($torneo->equipos as $equipo)
                            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>                      
              @error('visitante')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>           
            

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-link">Crear</button>
                </div>
                <div class="control">
                    <a href="{{route('partidos.index')}}" class="button is-link is-light">Volver</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection