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
        @endforeach
    </tbody>
</table>
@else

<p>Nenhum item no carrinho</p>
@endif

@endsection