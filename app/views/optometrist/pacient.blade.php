
@extends("layouts.navBar")

@section("content")
	@if(isset($pacient))
		<h1>{{ $pacient->first_name}}</h1>
		<h2>{{ $pacient->last_name}}</h2>
		<div id='isotopes' class='clickable isotope clearfix'>
			<div class="center-block row btn-group" >
			<a href="{{ URL::action('PacientController@index', $pacient->id ) }}" class="btn btn-success btn-lg active col-lg-3" role="button">
				Nuevo Exámen
			</a>
			<div>
		@if(count($examinations))
			@foreach ($examinations  as $exam) 
				<div id='exam' class='element exam' data-symbol='Hg' data-category='lanthanoid'>
					<h2 class='name'>{{ $exam->created_by }}</h2>
					Fecha: {{ $exam->created_at }} </p>
					<div id='id'>{{$exam->id}} </div>
				</div>
			@endforeach
		@else
			<h2>No hay historial previo</h2>
		</div>
		@endif
	@endif


@stop
@section("scripts")
	<script>
		$(document).ready(function()
		{
			$(".element").click(function()
			{
				var action = $(this).attr('id');
				var thisElement = $(this);
				switch(action)
				{
					case "order":
						var idOrder = $(this).find('div').text();
						var url = "{{URL::to("lab/order")}}" ;
						url = url.concat('/');
						url = url.concat(idOrder);
						window.location.href = url;
						break;
					default:
						alert("ERROR: Accion no valida");
				}
			});
		});
	</script>
@stop