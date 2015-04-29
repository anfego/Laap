@extends("layouts.navBar")


@section("content")

	<% Form::open(array(
		'url' => 'login/',
		'class' => 'form-signin',
		'name' => 'connectForm')) 
	%>
	<% $errors->first("password") %><br />
	<% Form::label("username", "Usuario") %>
	<% Form::text('username', Input::old("username"), array(
		'class'=>'form-control'))
	%>

	<% Form::label("password", "Contraseña") %>
	<% Form::password('password', array(
		'class'=>'form-control'))
	%>
	<% Form::submit('Conectar', array(
		'class' => 'btn btn-lg btn-primary btn-block'))
	%>
	<% Form::close() %>

@stop