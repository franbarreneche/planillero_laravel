@extends('layout.main_layout')
@section('content')
<section class="section">
    <div class="box">

        <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
                <input class="input" type="text" value="{{$torneo->nombre}}" disabled>
            </div>
        </div>

        <div class="field">
            <label class="label">Año</label>
            <div class="control">
                <input class="input" type="text" value="{{$torneo->anio}}" disabled>
            </div>
        </div>

        <div class="field">
            <label class="label">Temporada</label>
            <div class="control">
                <input class="input" type="text" value="{{$torneo->temporada}}" disabled>
            </div>
        </div>

        <div class="field">
            <label class="label">Modo</label>
            <div class="control">
                <input class="input" type="text" value="{{$torneo->modo}}" disabled>
            </div>
        </div>

        <div class="field">
            <label class="label">Genero</label>
            <div class="control">
                <input class="input" type="text" value="{{$torneo->genero}}" disabled>
            </div>
        </div>


        <div class="field is-grouped">
            <div class="control">
                <a href="{{route('torneos.edit',$torneo->id)}}" class="button is-link is-primary">Editar</a>
            </div>
            <div class="control">
                <a href="{{route('torneos.index')}}" class="button is-link is-light">Volver</a>
            </div>

            <form action="{{route('torneos.destroy',$torneo->id)}}" method="POST">
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