<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planillero Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bulma Version 0.9.0-->
    <link href="{{asset('css/bulma.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
</head>
<label>Fecha</label>
<label>Sede</label>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Partido</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Cancha</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($partidos as $partido)
        <tr>
            <td>{{ $partido->local->nombre }} vs {{ $partido->visitante->nombre }}</td>
            <td>{{ $partido->fecha}}</td>
            <td> 00:00 </td>
            <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>