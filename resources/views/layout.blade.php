<html>
    <head>
        <title>MYSHOP - ECOMMERCE</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        @yield("scriptjs")
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
            <a href="#" class="navbar-brand">MyShop</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="{{ route('categoria') }}">Categorias</a>
                    <a class="nav-link" href="{{ route('cadastrar') }}">Cadastrar</a>
                    <a class="nav-link" href="{{ route('contato') }}">Contato</a>
                    <a class="nav-link" href="{{ route('sobre') }}">Sobre</a>

                    @if(!\Auth::user())
                    <a class="nav-link" href="{{ route('logar') }}">Logar</a>
                   @else
                   <a class="nav-link" href="{{ route('home') }}">Logout</a>
                 @endif
                 
                    <!-- <a class="nav-link" href="{{ route('exercicio1') }}">Exercicio1</a> -->
                </div>
            </div>
            <a href="{{route('ver_carrinho')}}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
        </nav>

        <div class="container">
            <div class="row">
                
             @if(\Auth::user()) <!--   Esssa é uma sessão que o laravel grava se usuario tiver logado -->
                <div class="col-12">
                    <p class="text-right">Seja Bem Vindo!,  <a href="">Sair</a> </p>
                </div>
              @endif
                
                @if($message = Session::get("err"))
                <div class="col-12">
                    <div class="alert alert-danger">{{ $message }}</div>
                </div>
                @endif
                
                @if($message = Session::get("ok"))
                <div class="col-12">
                    <div class="alert alert-success">{{ $message }}</div>
                </div>
                @endif
              
                @yield("conteudo")  <!---- Nesta div teremos uma area que os arquivos irão adicionar conteudo -->
            </div>
        </div>
    </div>
</body>
</html>
