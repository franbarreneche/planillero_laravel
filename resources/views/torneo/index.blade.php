@extends('layout.main_layout')
@section('content')
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{$torneos->count()}}</p>
                <p class="subtitle">Torneos</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">59k</p>
                <p class="subtitle">Products</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">3.4k</p>
                <p class="subtitle">Open Orders</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">19</p>
                <p class="subtitle">Exceptions</p>
            </article>
        </div>
    </div>
</section>
<div class="columns">
    <div class="column is-6">        
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    Torneos
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
                            @foreach($torneos as $torneo)
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>{{$torneo->genero}}</td>
                                <td>{{$torneo->modo}}</td>
                                <td>{{$torneo->anio}}</td>
                                <td>{{$torneo->temporada}}</td>
                                <td class="level-right"><a class="button is-small is-primary" href="{{route('torneos.show',$torneo->id)}}">Ver</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <a href="{{route('torneos.create')}}" class="button is-info">Crear</a>
                </div>
            </footer>
        </div>
    </div>
    <div class="column is-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Inventory Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection