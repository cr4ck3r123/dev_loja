@extends("layout")
@section("conteudo")

<div class="col-12">
    <div class="col-12">
        <h2 class="mb-3">Cadastrar Cliente</h2>
    </div><!-- comment -->


    <form action="{{ route('cadastrar_cliente')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6"> 
                <div class="form-group">
                    Nome: <input type="text" name="nome" class="form-control"/>
                </div>
            </div>
            <div class="col-6"> 
                <div class="form-group">
                    E-mail: <input type="email" name="email" class="form-control"/>
                </div>
            </div>
            <div class="col-6"> 
                <div class="form-group">
                    Cpf: <input type="text" name="cpf" class="form-control"/>
                </div>
            </div>
            <div class="col-6"> 
                <div class="form-group">
                    Senha: <input type="password" name="password" class="form-control"/>
                </div>
            </div>
            <div class="col-8">    
                <div class="form-group">
                    Endereço: <input type="text" name="endereco" class="form-control"/>
                </div>
            </div>
            <div class="col-1">    
                <div class="form-group">
                    Numero: <input type="text" name="numero" class="form-control"/>
                </div>
            </div>
             <div class="col-3">    
                <div class="form-group">
                    Complemento: <input type="text" name="complemento" class="form-control"/>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    Cidade: <input type="text" name="cidade" class="form-control"/>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    Cep: <input type="text" name="cep" class="form-control"/>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    Estado: <input type="text" name="estado" class="form-control"/>
                </div>
            </div>
        </div>
        <input type="submit" value="cadastrar" class="btn btn-success btn-sm" />
    </form>
</div>
@endsection
