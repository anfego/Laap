@extends("layouts.navBar")

@section("content")
  <h1>Nuevo Examen</h1>
  <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
    <li role="presentation"><a href="#av" aria-controls="av" role="tab" data-toggle="tab">A.V. SC </a></li>
    <li role="presentation"><a href="#contactLenses" aria-controls="contactLenses" role="tab" data-toggle="tab">Lentes de Contacto</a></li>
    <li role="presentation"><a href="#keratometer" aria-controls="keratometer" role="tab" data-toggle="tab">Queratometria</a></li>
    <li role="presentation"><a href="#lensmetric" aria-controls="lensmetric" role="tab" data-toggle="tab">Lensométria</a></li>
    <li role="presentation"><a href="#rx" aria-controls="rx" role="tab" data-toggle="tab">Rx Final</a></li>
    <li role="presentation"><a href="#dxOpthal" aria-controls="dxOpthal" role="tab" data-toggle="tab">Oftalm. Directa</a></li>
    <li role="presentation"><a href="#diagnostic" aria-controls="diagnostic" role="tab" data-toggle="tab">Diagnostico</a></li>
    <li role="presentation"><a href="#plan" aria-controls="plan" role="tab" data-toggle="tab">Plan</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    
    <!-- General -->
    <div role="tabpanel" class="tab-pane active" id="general">
      {{ Form::open(array(
        'url' => URL::to("consultorio/nuevoExamen"),
        'class' => 'form-signin',
        'name' => 'connectForm'))
      }}
      {{ $errors->first("password") }}<br />
      {{ Form::field([
            "name"        => "ocupation",
            "label"       => "Ocupación",
            "placeholder" => "Ocupación",
            "type"        => "text"
      ]) }}

       <div class="checkbox">
        <h3 >Motivo de Consulta</h3>
        {{ Form::field([
            "name"        => "motivo1",
            "label"       => "Control Visual",
            "value"       => "false",
            "type"        => "checkbox"
        ]) }}
        {{ Form::field([
            "name"        => "motivo2",
            "label"       => "Cambio RX.",
            "value"       => "CambioRX",
            "type"        => "checkbox"
        ]) }}
        {{ Form::field([
            "name"        => "motivo3",
            "label"       => "Vision borrosa de lejos.",
            "value"       => "VisionBorrosaDeLejos",
            "type"        => "checkbox"
        ]) }}
        {{ Form::field([
            "name"        => "motivo4",
            "label"       => "Vision borrosa de cerca.",
            "value"       => "VisionBorrosaDeCerca",
            "type"        => "checkbox"
        ]) }}
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDxOpthal" aria-expanded="true" aria-controls="collapseDxOpthal">
          <h5>Otro</h5>
        </a>
        <div id="collapseDxOpthal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            {{ Form::field([
              "name"        => "motivo5",
              "label"       => "Otro",
              "placeholder" => "Escriba acá",
              "type"        => "textArea"
            ]) }}
          </div>
        </div>
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseHistory" aria-expanded="true" aria-controls="collapseHistory">
          <h5>Antecedentes</h5>
        </a>
        <div id="collapseHistory" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            {{ Form::field([
              "name"        => "history",
              "label"       => "Familiares y personales",
              "placeholder" => "Escriba acá",
              "type"        => "textArea"
            ]) }}
          </div>
        </div>
      </div>
    </div>
    <!-- Agudeza Visual -->  
    <div role="tabpanel" class="tab-pane" id="av">  
      {{ Form::field([
          "name"        => "av_right",
          "label"       => "Ojo Derecho",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "av_left",
          "label"       => "Ojo Izquierdo",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <!-- Contact Lenses -->  
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
          "value"       => "hard",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "clType",
          "label"       => "Lente Suave",
          "value"       => "soft",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "cl_right",
          "label"       => "Ojo Derecho",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "cl_left",
          "label"       => "Ojo Izquierdo",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <!-- keratometer -->  
    <div role="tabpanel" class="tab-pane" id="keratometer">
      {{ Form::field([
          "name"        => "kt_right",
          "label"       => "Ojo Derecho",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "kt_left",
          "label"       => "Ojo Izquierdo",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <!-- lensmetric -->  
    <div role="tabpanel" class="tab-pane" id="lensmetric">
      {{ Form::field([
          "name"        => "lx",
          "label"       => "No usa",
          "value"       => "noUse",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "lx_right",
          "label"       => "Ojo Derecho",
          "placeholder" => "+2.00-2.50x15",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "lx_left",
          "label"       => "Ojo Izquierdo",
          "placeholder" => "+2.00-2.50x15",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "lx_add",
          "label"       => "Addicion",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "lx_lenses",
          "label"       => "Tipo de lente",
          "placeholder" => "CR. 39",
          "type"        => "text"
      ]) }}
    </div>
    <!-- RX Final -->  
    <div role="tabpanel" class="tab-pane" id="rx">
      {{ Form::field([
          "name"        => "cyclop",
          "label"       => "Con Ciclopegia",
          "value"       => "yes",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "cyclop",
          "label"       => "Sin Ciclopegia",
          "value"       => "no",
          "type"        => "radio"
      ]) }}
      {{ Form::field([
          "name"        => "rx_right",
          "label"       => "Ojo Derecho",
          "placeholder" => "+2.00-2.50x15",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "rx_left",
          "label"       => "Ojo Izquierdo",
          "placeholder" => "+2.00-2.50x15",
          "type"        => "text"
      ]) }}
      {{ Form::field([
          "name"        => "rx_add",
          "label"       => "Addicion",
          "placeholder" => "0.00",
          "type"        => "text"
      ]) }}
    </div>
    <!-- Ocula Motility -->  
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
      {{ Form::field([
          "name"        => "motilityOther",
          "label"       => "Otra",
          "type"        => "textArea"
      ]) }}
    </div>
    <!-- Opthalmos -->  
    <div role="tabpanel" class="tab-pane" id="dxOpthal">
      {{ Form::field([
          "name"        => "dxOpthal1",
          "label"       => "Medios transparentes. Fondo de ojo sano normal. Retina Aplicada",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOpthal" aria-expanded="true" aria-controls="collapseOpthal">
        <h5>Otro</h5>
      </a>
      <div id="collapseOpthal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          {{ Form::field([
            "name"        => "dxOpthal2",
            "label"       => "Observaciones",
            "placeholder" => "Observaciones",
            "type"        => "textArea"
          ]) }}
        </div>
      </div>
    </div>
    <!-- Diagnostic -->  
    <div role="tabpanel" class="tab-pane" id="diagnostic">
      {{ Form::field([
          "name"        => "diagnostic1",
          "label"       => "Miopía",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "diagnostic2",
          "label"       => "Hipermetropía",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "diagnostic3",
          "label"       => "Astígmatismo",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "diagnostic4",
          "label"       => "Presbicia",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseDiagnostic" aria-expanded="true" aria-controls="collapseDiagnostic">
        <h5>Otro</h5>
      </a>
      <div id="collapseDiagnostic" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          {{ Form::field([
            "name"        => "diagnostic5",
            "label"       => "Observaciones",
            "placeholder" => "Observaciones",
            "type"        => "textArea"
          ]) }}
        </div>
      </div>
    </div>
    <!-- Plan -->  
    <div role="tabpanel" class="tab-pane" id="plan">
      {{ Form::field([
          "name"        => "plan1",
          "label"       => "Se prescribe RX",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "plan2",
          "label"       => "No se prescribe RX",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "plan3",
          "label"       => "Control: 1 año",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "plan4",
          "label"       => "Uso: Permanente",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      {{ Form::field([
          "name"        => "plan5",
          "label"       => "Uso: Prolongado",
          "value"       => "1",
          "type"        => "checkbox"
      ]) }}
      <a data-toggle="collapse" data-parent="#accordion" href="#collapsePlan" aria-expanded="true" aria-controls="collapsePlan">
        <h5>Otro</h5>
      </a>
      <div id="collapsePlan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          {{ Form::field([
            "name"        => "observations",
            "label"       => "Observaciones",
            "placeholder" => "Observaciones",
            "type"        => "textArea"
          ]) }}
        </div>
      </div>
    </div>
  </div>

</div>


  {{ Form::submit('Guardar', array(
    'class' => 'btn btn-lg btn-primary btn-block'))
  }}
  {{ Form::close() }}

@stop