@extends("layout")
@section("conteudo")

@include("produtos", ['lista' => $lista])
@endsection