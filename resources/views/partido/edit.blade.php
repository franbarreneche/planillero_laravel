@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
        <form action="{{route('partidos.update',$partido->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label">Torneo</label>
                <div class="control">
                    <input class="input" type="text" value="{{$partido->torneo->nombre}}" name="torneo" disabled>
                    <input type="hidden" value="{{$partido->torneo->id}}" name="torneo">
                </div>                      
              @error('torneo')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Fecha</label>
                <div class="control">                      
                    <input class="input" type="date" name="fecha" data-display-mode="inline" data-is-range="true" data-close-on-select="false" value="{{$partido->fecha}}">                    
                </div>                      
              @error('fecha')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Hora</label>
                <div class="control">                      
                    <input class="input" type="time" name="hora" data-display-mode="inline" data-is-range="true" data-close-on-select="false" value="{{$partido->hora}}">                    
                </div>                      
              @error('hora')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>

            <div class="field">
                <label class="label">Matchday</label>
                <div class="control">
                    <input class="input" name="matchday" type="text" maxlength="15" value="{{$partido->matchday}}">                    
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
                        @if($sede->id == $partido->sede->id)
                            <option value="{{$sede->id}}" selected>{{$sede->nombre}}</option>
                        @else
                            <option value="{{$sede->id}}">{{$sede->nombre}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                </div>                      
              @error('local')
                <p class="help is-danger">{{$message}}</p>
                @enderror          
            </div>
            
            <div class="field">
                <label class="label">Euquipo Local</label>
                <div class="control">
                    <div class="select">
                        <select name="local">
                        @foreach($partido->torneo->equipos as $equipo)
                        @if($equipo->id == $partido->local->id)
                            <option value="{{$equipo->id}}" selected>{{$equipo->nombre}}</option>
                        @else
                            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endif
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
                        @foreach($partido->torneo->equipos as $equipo)
                        @if($equipo->id == $partido->visitante->id)
                            <option value="{{$equipo->id}}" selected>{{$equipo->nombre}}</option>
                        @else
                            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endif
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
                    <button type="submit" class="button is-link">Actualizar</button>
                </div>
                <div class="control">
                    <a href="{{route('partidos.index')}}" class="button is-link is-light">Volver</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection