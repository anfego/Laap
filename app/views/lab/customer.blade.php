
@extends("layouts.navBar")

@section("content")
	@if(isset($customer))
	<a href="{{ URL::current() }}/nuevaOrden" class="btn btn-success btn-lg active pull-right" role="button">Nuevo Orden</a>
		<h1>{{ $customer[0]->name}}</h1>
		<div id='isotopes' class='clickable isotope clearfix'>
		@if(isset($orders_pending))
			@foreach ($orders_peding  as $order) 
				<div id='cliente' class='element cliente' data-symbol='Hg' data-category='lanthanoid'>
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
	</script>
@stop