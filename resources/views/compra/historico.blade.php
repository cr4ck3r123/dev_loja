@extends("layout")
@section("conteudo")

<div class="col-12">
    <h2>Minhas Compras</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data da compra</th>
            <th>Situação</th>
        </tr>
        @foreach($lista as $pedido)
        <tr>
            <td>{{ $pedido->datapedido->format("d/m/Y H:i") }}</td>
            <td>{{ $pedido->statusDesc() }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection