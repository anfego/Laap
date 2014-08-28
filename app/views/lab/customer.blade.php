
@extends("layouts.navBar")

@section("content")
	@if(isset($customer))
		<h1>{{ $customer->name}}</h1>
		<div id='isotopes' class='clickable isotope clearfix'>
			<div class="center-block row btn-group" >
			<a href="{{ URL::current() }}/nuevaOrden" class="btn btn-primary btn-lg active col-lg-3" role="button">Pagos</a>
			<a href="{{ URL::action('LabController@addOrderTo', $customer->id ) }}" class="btn btn-success btn-lg active col-lg-3" role="button">Nueva Orden</a>
			<a href="{{ URL::current() }}/nuevaOrden" class="btn btn-warning btn-lg active col-lg-3" role="button">Canceladas</a>
		</div>
		@if(count($orders))
			@foreach ($orders  as $order) 
				<div id='order' class='element order' data-symbol='Hg' data-category='lanthanoid'>
					<h2 class='name'>{{ $order->name }}</h2>
					Fecha: {{ $order->created_at }} </p>
					<div id='id'>{{$order->id}} </div>
				</div>
			@endforeach
		@else
			<h2>No hay ordenes pendientes</h2>
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