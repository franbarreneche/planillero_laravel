<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Planillero Laravel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        TORNEOS INDIANA
      </h1>
      <p class="subtitle">
        Partidos en la sede: <strong>SEDE</strong>!
      </p>
      <div class="table-container">
      <table class="table is-bordered is-narrow is-fullwidth">
        <thead>
          <tr>
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
    </div>
    </div>
  </section> 

</body>

</html>