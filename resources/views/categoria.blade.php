@extends("layout")
@section("conteudo")
        <h2>Categoria</h2>
        
        @if(isset($listaCategoria) && $listaCategoria->count() > 0)
        <ul>            
            <li><a href="{{route('categoria')}}">Todas</a></li>
            @foreach($listaCategoria as $cat)
            <li><a href="{{route("categoria_por_id", ["idcategoria" => $cat->id])}}">{{ $cat->categoria }}</a></li>
            @endforeach
        </ul>
        @endif
        
    @include("produtos", ['lista' => $lista])
        
@endsection