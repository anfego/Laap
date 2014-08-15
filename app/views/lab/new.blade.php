@extends("layouts.navBar")


@section("content")

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
	{{ Form::label("discount", "Descuento:") }}
	{{ Form::text('discount', Input::old("discount"), array(
		'class'=>'form-control'))
	}}


	{{ Form::submit('Crear', array(
		'class' => 'btn btn-lg btn-primary btn-block'))
	}}
	{{ Form::close() }}

@stop