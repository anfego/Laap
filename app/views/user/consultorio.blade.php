
@extends("layouts.navBar")

@section("content")
  <h1>Consultorio</h1>
  <div id='isotopes' class='clickable isotope clearfix'>
  <div class="center-block row btn-group" >
  <a href="{{URL::to("consultorio/nuevo")}} " class="btn btn-success btn-lg active pull-left" role="button">Nuevo Paciente</a>
  </div>
  @foreach ($pacients as $pacient) 
    <div id='pacient' class='element pacient' data-symbol='Hg' data-category='lanthanoid'>
      <h2 class='name'>{{ $pacient->last_name }}</h2>
      <p id='caption'>Direccion: {{ $pacient->address_home }} </br>
      Teléfono: {{ $pacient->telephone }} </p>
      <div id='idCliente'>{{ $pacient->id }} </div>
    </div>
  @endforeach
  </div>
@stop

@section("scripts")
  <script>

    $(document).ready(function()
    {
      $(".element").click(function()
      {
        var accion = $(this).attr('id');
        var thisElemtent = $(this);

        switch(accion)
        {
          case "pacient":
            // redirije a la pagina del historial de ordenes del cliente
            var idPacient = $(this).find('div').text();
            var url = "{{URL::to("consultorio")}}" ;
            url = url.concat('/');
            url = url.concat(idPacient);
            window.location.href = url;
          break;
          default:
            alert("ERROR: Accion no valida");
        }
      });
    });
  </script>
@stop