<table class='table'>
    <thead>
        <tr><th><h2>Historial</h2></th></tr>
        <tr><th>Fecha</th><th>Descripcion</th><th>Valor</th><th>Balance</th></tr></thead>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <th>{{ $transaction-> created_at }}</th>
                <th>{{ $transaction-> action }}</th>
                <th>{{ $transaction-> balance_dif }}</th>
                <th>{{ $transaction-> balance_new }}</th>
            </tr>
        @endforeach
    </tbody>
</table>