@extends("layouts.navBar")
 

@section("content")

	{{ Form::open(array(
		'url' => URL::to("lab/nuevaOrden"),
		'class' => 'form-signin',
		'name' => 'connectForm')) 
	}}
	{{ $errors->first("password") }}<br />
	
	{{ Form::label("name", "Número de Orden:") }}
	{{ Form::text('name', Input::old("name"), array(
		'class'=>'form-control'))
	}}
	@foreach ($products as $product)
		{{ Form::label("name", $product->name) }}
		
		{{ Form::text('quantity', Input::old("quantity"), array(
			'class'=>'form-control'))
		}}
	
	@endforeach


	{{ Form::submit('Crear', array(
		'class' => 'btn btn-lg btn-primary btn-block'))
	}}
	{{ Form::close() }}

@stop