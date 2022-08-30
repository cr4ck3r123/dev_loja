@extends("layout")
@section("conteudo")

<h3>Carrinho</h3>
<br>
@if(isset($cart) && count($cart) > 0)
<hr>
<br>
<table class="table">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>            
            <th>Valor</th>
            <th>Descricao</th>
        </tr>    
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $indice => $p)
        <tr>
            <td><img src="{{asset($p->foto)}}" height="50"></td>
            <td>{{$p->nome}}</td>
            <td>{{$p->valor}}</td>
            <td>{{$p->descricao}}</td>
            <td>
                <a href="{{ route('carrinho_excluir', ['indice' => $indice])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @php $total += $p->valor; @endphp
        @endforeach
        
    </tbody>
    <tfooter><!-- comment -->
        <tr>
            <td colspan="5">
                Total do carrinho: R$ {{ $total }}
            </td>
        </tr>
    </tfooter>
</table>

<form method="post" action="{{ route('carrinho_finalizar') }}">
    @csrf
    <input type="submit" value="Finalizar Compra" class="btn btn-lg btn-success">
</form>


@else

<p>Nenhum item no carrinho</p>
@endif

@endsection