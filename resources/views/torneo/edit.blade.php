@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
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
                        @for ($i = 0; $i < count($torneo::TEMPORADAS); $i++)
                        @if($torneo::TEMPORADAS[$i] == $torneo->temporada)
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
                    @for ($i = 0; $i < count($torneo::GENEROS); $i++)
                    <label class="radio">                    
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
                        @for ($i = 0; $i < count($torneo::MODOS); $i++)
                        @if($torneo::MODOS[$i] == $torneo->modo)
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
                    <button type="submit" class="button is-link">Crear</button>
                </div>
                <div class="control">
                    <a href="{{route('torneos.index')}}" class="button is-link is-light">Cancel</a>
                </div>
            </div>
    </form>
    </div>
</section>
@endsection