@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
            <div class="field">
                <label class="label">Torneo</label>
                <div class="control">
                    <input class="input" type="text" value="{{$partido->torneo->nombre}}" name="torneo" disabled>
                </div>          
            </div>

            <div class="field">
                <label class="label">Fecha</label>
                <div class="control">                      
                    <input class="input" type="date" name="fecha" data-display-mode="inline" data-is-range="true" data-close-on-select="false" value="{{$partido->fecha}}" disabled>                    
                </div>         
            </div>

            <div class="field">
                <label class="label">Hora</label>
                <div class="control">                      
                    <input class="input" type="time" name="fecha" data-display-mode="inline" data-is-range="true" data-close-on-select="false" value="{{$partido->hora}}" disabled>                    
                </div>         
            </div>

            <div class="field">
                <label class="label">Matchday</label>
                <div class="control">
                    <input class="input" name="matchday" type="text" maxlength="15" value="{{$partido->matchday}}" disabled>                    
                </div>           
            </div>

            <div class="field">
                <label class="label">Sede</label>
                <div class="control">
                    <div class="select">
                        <select name="local" disabled>                        
                            <option value="{{$partido->sede->id}}" selected>{{$partido->sede->nombre}}</option>                        
                        </select>
                    </div>
                </div>            
            </div>
            
            <div class="field">
                <label class="label">Euquipo Local</label>
                <div class="control">
                    <div class="select">
                        <select name="local" disabled>                        
                            <option value="{{$partido->local->id}}" selected>{{$partido->local->nombre}}</option>                        
                        </select>
                    </div>
                </div>            
            </div>

            <div class="field">
                <label class="label">Euquipo Visitante</label>
                <div class="control">
                    <div class="select">
                        <select name="visitante" disabled>
                            <option value="{{$partido->visitante->id}}" selected>{{$partido->visitante->nombre}}</option>
                        </select>
                    </div>
                </div>             
            </div>           
            

            <div class="field is-grouped">
                <div class="control">
                    <a href="{{route('partidos.edit',$partido->id)}}" type="submit" class="button is-link">Editar</a>
                </div>
                <div class="control">
                    <a href="{{route('partidos.index')}}" class="button is-link is-light">Volver</a>
                </div>
                <form action="{{route('partidos.destroy',$partido->id)}}" method="POST">
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