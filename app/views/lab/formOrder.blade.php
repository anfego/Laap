@extends("layouts.navBar")
@section("content")
    <a href="{{ URL::action('LabController@show', array('id' => $customer-> id)) }}">
        <h2>{{ $customer-> name }}</h2>
    </a>
    @if($order-> status == 'closed')
        <div>
            {{ Form::open([
                    "autocomplete"  => "off",
                    "class"         => "form-inline pull-right",
                    "URL"           => URL::full()
                ]) }}
                {{ Form::field([
                    "name"          => "paid",
                    "label"         => "Recibir Pago",
                    "step"          => "50",
                    "type"          => "number"
                ]) }}
                {{ Form::submit('Pago', array(
                    'class' => 'btn btn-lg btn-success'))
                }}
            {{ Form::close() }}
        </div>
    @endif
    @if($order-> status == 'open')
        <div class="panel-group" id="accordion">
            <div class="panel panel-default panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Agregar Productos
                        </a>
                    </h3>
                </div>
                <div role="form" class="form-group">
                <div id="collapseOne" class="panel-collapse collapse">
                    {{ Form::open([
                        "autocomplete"  => "off",
                        "URL"           => URL::full()
                    ]) }}
                    @foreach($products as $product)
                        {{ Form::field([
                            "name"        => $product-> id,
                            "label"       => $product-> name,
                            "id"          => $product-> id,
                            "placeholder" => "Cantidad",
                            "type"        => "number"
                        ]) }}
                    @endforeach
                    {{ Form::submit('Agregar', array(
                        'class' => 'btn btn-lg btn-success btb-block form-control'))
                    }}
                    {{ Form::close() }}
                </div>
                </div>
            </div>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr><th>Order #</th><th>{{ $order-> id }}</th></tr>
            <tr><th>Servicio</th><th>Descripcion</th><th>Cantidad</th><th>Precio Unidad</th><th>Subtotal</th></tr></thead>
        <tbody>
        @if( count( $bom ))
            @foreach($bom as $bomItem)
                <tr>
                    <th> {{ $products[$bomItem-> product_id - 1]-> name }} </th>
                    <th>
                        @if($bomItem-> discount != '0.00')
                            descuento {{ number_format($bomItem-> discount,2) }}%
                        @endif
                    </th>
                    <th> {{ $bomItem-> quantity }} </th>
                    <th> {{ $bomItem-> price }} </th>
                    <th> {{ number_format($bomItem-> price * $bomItem-> quantity - ($bomItem-> price * $bomItem-> quantity)*$bomItem->discount/100.00,2)  }} </th>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
            <tr><td></td><td></td><td></td><td>Subtotal</td><td>{{ number_format($subTotal, 2) }}</td></tr>
            <tr><td></td><td></td><td></td><td>IVA (%)</td><td>{{ number_format($order-> tax, 2) }}</td></tr>
            <tr><td></td><td></td><td></td><td>Total</td><td>{{ number_format($order-> total, 2) }}</td></tr>
        </tfoot>
    </table>
    @if( count($transactions))
        @include('lab.historyOrder', array('transactions' => $transactions))
    @endif
    <p>
        @if( $order->status == 'open')
        <a href= {{{ URL::action('LabController@deleteOrder', array('id' => $order-> id)) }}} class="btn btn-default btn-lg pull-left active" role="button">Anular</a>    
            @if(count($bom))
                <a href= {{{ URL::action('LabController@closeOrder', array('id' => $order-> id)) }}} class="btn btn-success btn-lg pull-right active" role="button">Cerrar</a>    
            @endif
        @elseif( $order-> status == 'closed')
                <a href= {{{ URL::action('LabController@previewOrder', array('id' => $order-> id)) }}} class="btn btn-default btn-lg pull-left active" role="button">Imprimir</a>    
                <a href= {{{ URL::action('LabController@deliverOrder', array('id' => $order-> id)) }}} class="btn btn-success btn-lg pull-right active" role="button">Entregada</a>    
        @endif
    </p>
@stop