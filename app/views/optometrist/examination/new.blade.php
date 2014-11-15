@extends("layouts.navBar")

@section("content")
  <h1>Nuevo Examen</h1>
  <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
    <li role="presentation"><a href="#vp" aria-controls="vp" role="tab" data-toggle="tab">VP</a></li>
    <li role="presentation"><a href="#contactLenses" aria-controls="contactLenses" role="tab" data-toggle="tab">Lentes de Contacto</a></li>
    <li role="presentation"><a href="#keratometer" aria-controls="keratometer" role="tab" data-toggle="tab">Queratometria</a></li>
    <li role="presentation"><a href="#lensmetric" aria-controls="lensmetric" role="tab" data-toggle="tab">Lensometria</a></li>
    <li role="presentation"><a href="#cicloRx" aria-controls="cicloRx" role="tab" data-toggle="tab">Rx Ciclopejica</a></li>
    <li role="presentation"><a href="#subjective" aria-controls="subjective" role="tab" data-toggle="tab">Subjetivo</a></li>
    <li role="presentation"><a href="#rx" aria-controls="rx" role="tab" data-toggle="tab">Rx Final</a></li>
    <li role="presentation"><a href="#subjective" aria-controls="subjective" role="tab" data-toggle="tab">Subjetivo</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="general">
      {{ Form::open(array(
        'url' => URL::to("consultorio/nuevoExamen"),
        'class' => 'form-signin',
        'name' => 'connectForm'))
      }}
      {{ $errors->first("password") }}<br />
      {{ Form::field([
            "name"        => "ocupation",
            "label"       => "Ocupacion",
            "placeholder" => "Ocupacion",
            "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "motivation",
          "label"       => "Motivacion",
          "placeholder" => "Motivacion",
          "type"        => "textArea"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="vp">  
      {{ Form::field([
          "name"        => "vl_right",
          "label"       => "vl_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "vl_left",
          "label"       => "vl_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "vp_right",
          "label"       => "vp_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "vp_left",
          "label"       => "vp_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "ph_right",
          "label"       => "ph_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "ph_left",
          "label"       => "ph_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="contactLenses">
      {{ Form::field([
          "name"        => "clType",
          "label"       => "No usa",
          "value"       => "N/A",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "clType",
          "label"       => "Lente Duro",
          "value"       => "Duro",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "clType",
          "label"       => "Lente Suave",
          "value"       => "Suave",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "cl_right",
          "label"       => "cl_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "cl_left",
          "label"       => "cl_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="keratometer">
      {{ Form::field([
          "name"        => "kt_right",
          "label"       => "kt_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "ktX_right",
          "label"       => "ktX_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "kt_left",
          "label"       => "kt_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "ktX_left",
          "label"       => "ktX_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="lensmetric">
      {{ Form::field([
          "name"        => "lx_right",
          "label"       => "lx_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "lxX_right",
          "label"       => "lxX_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "lx_left",
          "label"       => "lx_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "lxX_left",
          "label"       => "lxX_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="cicloRx">
      // Cycloplegic Refraction
      {{ Form::field([
          "name"        => "cr_right",
          "label"       => "cr_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "crX_right",
          "label"       => "crX_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "cr_left",
          "label"       => "cr_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "crX_left",
          "label"       => "crX_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="subjective">
      {{ Form::field([
          "name"        => "sub_right",
          "label"       => "sub_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "subX_right",
          "label"       => "subX_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "sub_left",
          "label"       => "sub_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "subX_left",
          "label"       => "subX_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="rx">
      {{ Form::field([
          "name"        => "rx_right",
          "label"       => "rx_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "rxX_right",
          "label"       => "rxX_right",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "rx_left",
          "label"       => "rx_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "rxX_left",
          "label"       => "rxX_left",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="ocularMotility">
      {{ Form::field([
          "name"        => "hirschberg",
          "label"       => "hirschberg",
          "placeholder" => "0",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "ppc",
          "label"       => "ppc",
          "placeholder" => "0",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "coverTest",
          "label"       => "coverTest",
          "placeholder" => "0",
          "type"        => "text"
      ]) }}
    </div>
    <div role="tabpanel" class="tab-pane" id="dxOpthal">
      {{ Form::field([
          "name"        => "dxOpthal",
          "label"       => "dxOpthal",
          "placeholder" => "",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "observations",
          "label"       => "Observaciones",
          "placeholder" => "Observaciones",
          "type"        => "textArea"
      ]) }}
    </div>
  </div>
</div>


  {{ Form::submit('Guardar', array(
    'class' => 'btn btn-lg btn-primary btn-block'))
  }}
  {{ Form::close() }}

@stop