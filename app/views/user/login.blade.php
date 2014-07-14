
@extends("layouts.noNavbar")
@section("content")
	{{ Form::open(array(
		'class' => 'form-signin',
		'name' => 'connectForm' ))
	}}
	 	{{ $errors->first("password") }}<br />
		{{ Form::label("miUsuario", "Usuario") }}
		{{ Form::text('miUsuario', Input::old("miUsuario"), array(
			'class'=>'form-control')) 
		}}
		{{ Form::label("password", "Contraseña") }}
		{{ Form::password('password', array(
			'class'=>'form-control')) 
		}}
		{{ Form::submit('Conectar', array(
			'class' => 'btn btn-lg btn-primary btn-block'))
		}}
	{{ Form::close() }}
@stop