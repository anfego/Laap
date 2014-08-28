@extends("layouts.navBar")


@section("content")
	<h1>Nuevo Cliente</h1>
	{{ Form::open(array(
		'url' => URL::to("lab/nuevo"),
		'class' => 'form-signin',
		'name' => 'connectForm')) 
	}}
	{{ $errors->first("password") }}<br />
	{{ Form::label("name", "Razón Social:") }}
	{{ Form::text('name', Input::old("name"), array(
		'class'=>'form-control'))
	}}
 {{ Form::field([
"name" => "numero",
"type" => "number"
])}}
	{{ Form::label("telephone", "Teléfono:") }}
	{{ Form::text('telephone', Input::old("telephone"), array(
		'class'=>'form-control'))
	}}
	{{ Form::label("addres", "Dirección:") }}
	{{ Form::text('address', Input::old("address"), array(
		'class'=>'form-control'))
	}}
	{{ Form::label("email", "E-mail:") }}
	{{ Form::text('email', Input::old("email"), array(
		'class'=>'form-control'))
	}}
	{{ Form::label("discountStd", "Descuento Productos Estandar:") }}
	{{ Form::text('discountStd', Input::old("discountStd"), array(
		'class'=>'form-control'))
	}}
	
	{{ Form::label("discountSpc", "Descuento Productos Especiales:") }}
	{{ Form::text('discountSpc', Input::old("discountSpc"), array(
		'class'=>'form-control'))
	}}


	{{ Form::submit('Crear', array(
		'class' => 'btn btn-lg btn-primary btn-block'))
	}}
	{{ Form::close() }}

@stop