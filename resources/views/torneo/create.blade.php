@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">
        <form action="{{route('torneos.store')}}" method="POST">
        @csrf
        
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" name="nombre" type="text" placeholder="Ej: Palermo A">
                </div>
                @error('nombre')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>      

            <div class="field">
                <label class="label">Año</label>
                <div class="control">
                    <input class="number" type="number" name="anio" value=2020 min=2000 max=2100>
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
                        @for ($i = 0; $i < count($temporadas); $i++)
                            <option value="{{$temporadas[$i]}}">{{$temporadas[$i]}}</option>
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
                    <label class="radio">
                    @for ($i = 0; $i < count($generos); $i++)   
                        <input type="radio" name="genero" value="{{$generos[$i]}}">
                        {{$generos[$i]}}                    
                    @endfor
                    </label>
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
                        @for ($i = 0; $i < count($modos); $i++)
                            <option value="{{$modos[$i]}}">{{$modos[$i]}}</option>
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