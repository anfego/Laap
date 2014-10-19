@extends("layouts.navBar")


@section("content")
  <h1>Nuevo Paciente</h1>
  {{ Form::open(array(
    'url' => URL::to("consultorio/nuevo"),
    'class' => 'form-signin',
    'name' => 'connectForm'))
  }}
  {{ $errors->first("password") }}<br />
  {{ Form::field([
        "name"        => "first_name",
        "label"       => "Nombre",
        "placeholder" => "Nombre",
        "type"        => "text"
  ]) }}
  {{ Form::field([
      "name"        => "last_name",
      "label"       => "Apellido",
      "placeholder" => "Apellido",
      "type"        => "text"
  ]) }}
  {{ Form::field([
      "name"        => "personal_id",
      "label"       => "Documento de Identificacion",
      "placeholder" => "id",
      "type"        => "text"
  ]) }}
  {{ Form::field([
      "name"        => "address_home",
      "label"       => "Dirección Casa",
      "placeholder" => "Calle 22 N 6-38",
      "type"        => "text"
  ]) }}
  {{ Form::field([
      "name"        => "address_work",
      "label"       => "Dirección Trabajo",
      "placeholder" => "Calle 22 N 6-38",
      "type"        => "text"
  ]) }}

  {{ Form::field([
      "name"        => "telephone",
      "label"       => "Teléfono",
      "placeholder" => "(57)-324-0267",
      "type"        => "text"
  ]) }}
  {{ Form::field([
      "name"        => "email",
      "label"       => "Correo Electrónico",
      "placeholder" => "lab@galeriaoptica.com",
      "type"        => "email"
  ]) }}
  {{ Form::field([
      "name"        => "dob",
      "label"       => "Fecha de Nacimiento",
      "type"        => "date"
  ]) }}


  {{ Form::submit('Crear', array(
    'class' => 'btn btn-lg btn-primary btn-block'))
  }}
  {{ Form::close() }}

@stop