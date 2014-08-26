
@extends("layouts.navBar")

@section("content")
	@if(isset($customer))
		<h1>{{ $customer[0]->name}}</h1>
		<div id='isotopes' class='clickable isotope clearfix'>
			<div class="center-block row btn-group" >
			<a href="{{ URL::current() }}/nuevaOrden" class="btn btn-primary btn-lg active col-lg-3" role="button">Pagos</a>
			<a href="{{ URL::action('LabController@addOrderTo', $customer[0]->id ) }}" class="btn btn-success btn-lg active col-lg-3" role="button">Nueva Orden</a>
			<a href="{{ URL::current() }}/nuevaOrden" class="btn btn-warning btn-lg active col-lg-3" role="button">Canceladas</a>
		</div>
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