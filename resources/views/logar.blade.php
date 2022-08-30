@extends("layout")<!-- comment -->
@section("conteudo")

<div class="col-6 container" align="">

    <br><br><br><br>

    <h2 class="mb-3">Logar no Sistema</h2>
    <hr>
    <form action="{{ route('logar') }}" method="POST">
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
    @if($message = Session::get("err"))
    <div class="" align="center">
        <div class="alert alert-danger">{{ $message }}</div>
    </div>
    @endif
</div>
@endsection