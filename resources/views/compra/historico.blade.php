@extends("layout")
@section("scriptjs")

<script>
 $(function(){ 
     $(".infocompra").on('click' , function(){
     //Ao clicar no link com class .infocompra esta função sera executada
     let id = $(this).attr("data-value");
     $.post('{{ route("compra_detalhes") }}', {idpedido : id}, (result) => {
           //Função de callback -- retorno do ajax
           $("#conteudopedido").html(result);
        });
    })
 })
</script>
@endsection
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
            <th>
                <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{ $pedido->id }}" data-toggle="modal" data-target="#modalcompra">
                    <i class="fas fa-shopping-basket"></i>
                </a>
            </th>
        </tr>
        @endforeach
    </table>
</div>

<div class="modal fade" id="modalcompra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da compra</h5>
            </div>
            <div class="modal-body">
                <div id="conteudopedido">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection