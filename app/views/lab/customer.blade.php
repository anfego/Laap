@extends("layouts.navBar")

@section("content")
	<a href="{{URL::to("lab/nuevaOrden")}} " class="btn btn-success btn-lg active pull-right" role="button">Nuevo Orden</a>
	<h1>Customer</h1>
	@if(isset($orders_pending))
	<div id='isotopes' class='clickable isotope clearfix'>
		@foreach ($orders_peding  as $order) 
			<div id='cliente' class='element cliente' data-symbol='Hg' data-category='lanthanoid'>
				<h2 class='name'>{{ $order->name }}</h2>
				Fecha: {{ $order->created_at }} </p>
				<div id='id'>{{$order->id}} </div>
			</div>
		@endforeach
	</div>
	@endif

@stop
@section("scripts")
	<script>
	</script>
@stop