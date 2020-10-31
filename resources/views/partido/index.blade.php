@extends('layout.main_layout')
@section('content')
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{$partidos->count()}}</p>
                <p class="subtitle">Partidos</p>
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
<section class="container">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    Partidos
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-striped">
                        <th>
                        <td>Local</td>
                        <td>Visitante</td>
                        <td>Fecha</td>
                        <td>Torneo</td>
                        <td></td>
                        </th>
                        <tbody>
                            @foreach($partidos as $partido)
                            <tr>
                                <!-- <td width="5%"><i class="fa fa-bell-o"></i></td> -->
                                <td width="5%"><input type="checkbox" name="partidos[]" value="{{$partido->id}}"> </td>
                                <td>{{$partido->local->nombre}}</td>
                                <td>{{$partido->visitante->nombre}}</td>
                                <td>{{$partido->fecha}}</td>
                                <td><em>{{$partido->torneo->id}}</em></td>
                                <td class="level-right"><a class="button is-small is-primary" href="{{route('partidos.show',$partido->id)}}">Ver</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                <form action="{{route('partidos.create')}}" method="GET">
            <div class="card-content">
                <div class="content">
                    <div class="field">
                        <label class="label">Torneo</label>
                        <div class="control">
                            <div class="select is-medium">
                                <select name="torneo">
                                    @foreach($torneos as $torneo)
                                    <option value="{{$torneo->id}}">{{$torneo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <button class="button is-info">Crear</button>
                </div>
            </footer>
            </form>
                </div>
            </footer>
        </div>
</section>
@endsection