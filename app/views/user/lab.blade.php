@extends("layouts.navBar")

@section("content")
	<h1>Laboratorio</h1>
	<div id='isotopes' class='clickable isotope clearfix'>
	<div class="center-block row btn-group" >
	<a href="{{URL::to("lab/nuevo")}} " class="btn btn-success btn-lg active pull-left" role="button">Nuevo Cliente</a>
	</div>
	@foreach ($customers as $customer) 
		<div id='cliente' class='element cliente' data-symbol='Hg' data-category='lanthanoid'>
			<h2 class='name'>{{ $customer->name }}</h2>
			<p id='caption'>Direccion: {{ $customer->address }} </br>
			Teléfono: {{ $customer->telephone }} </p>
			<div id='idCliente'>{{ $customer->id }} </div>
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
					case "cliente":
						// redirije a la pagina del historial de ordenes del cliente
						var clienteName = $(this).find('div').text();
						var url = "{{URL::to("lab")}}" ;
						url = url.concat('/');
						url = url.concat(clienteName);
						window.location.href = url;
					break;
				case 'crear':
					window.location.href = "nuevoCliente.php";
					break;
				default:
					alert("ERROR: Accion no valida");

				}
			});
		});
	</script>
@stop