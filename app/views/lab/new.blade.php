@extends("layouts.navBar")


@section("content")
	<h1>Nuevo Cliente</h1>
	{{ Form::open(array(
		'url' => URL::to("lab/nuevo"),
		'class' => 'form-signin',
		'name' => 'connectForm'))
	}}
	{{ $errors->first("password") }}<br />
	{{ Form::field([
        "name"        => "name",
        "label"       => "Razón Social",
        "placeholder" => "Razón Social",
        "type"        => "text"
    ]) }}
	{{ Form::field([
        "name"        => "telephone",
        "label"       => "Teléfono",
        "placeholder" => "(57)-324-0267",
        "type"        => "text"
    ]) }}
    {{ Form::field([
        "name"        => "address",
        "label"       => "Dirección",
        "placeholder" => "Calle 22 N 6-38",
        "type"        => "text"
    ]) }}
    {{ Form::field([
        "name"        => "email",
        "label"       => "Correo Electrónico",
        "placeholder" => "lab@galeriaoptica.com",
        "type"        => "email"
    ]) }}
    {{ Form::field([
        "name"        => "discountStd",
        "label"       => "Descuento Estandar",
        "placeholder" => "5.00",
        "step"        => "0.5",
        "type"        => "number"
    ]) }}
    {{ Form::field([
        "name"        => "discountSpc",
        "label"       => "Descuento Especial",
        "placeholder" => "5.00",
        "step"        => "0.5",
        "type"        => "number"
    ]) }}

	{{ Form::submit('Crear', array(
		'class' => 'btn btn-lg btn-primary btn-block'))
	}}
	{{ Form::close() }}

@stop