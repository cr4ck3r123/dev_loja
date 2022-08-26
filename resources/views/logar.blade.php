@extends("layout")<!-- comment -->
@section("conteudo")

<div class="col-12">
    <h2 class="mb-3">Logar no Sistema</h2>
    <form action="{{ route('logar') }}" method="post">
        @csrf
        <div class="form-group"><!-- comment -->
            Login:
            <input type="text" name="login" class="form-control">
        </div>

        <div class="form-group"><!-- comment -->
            Senha:
            <input type="Password" name="password" class="form-control">
        </div>
        <input type="submit" value="logar" class="btn btn-lg btn-primary">
    </form>
    
</div>
@endsection