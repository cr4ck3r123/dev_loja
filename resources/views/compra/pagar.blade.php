@extends("layout")
@section("scriptjs")
<script type="text/javascript" src=
"https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    function carregar(){
        PagSeguroDirectPayment.setSessionId('{{ $sessionID}}');
    }
    
    $(function(){
        carregar();
        
          $(".ncredito").on('blur', function(){
              PagSeguroDirectPayment.onSenderHashReady(function(response){
                    if(response.status == 'error'){
                    console.log(response.message)
                    return false;
                }
                var hash = response.senderHash
                $(".hashseller").val(hash)   
                
              })
              
              let ncartao = $(this).val()
              $(".bandeira").val("")
              if(ncartao.length > 6){
                  
                  //Pegar os 6 primeiros digitos
                  let prefixcartao = ncartao.substr(0,6)
                  PagSeguroDirectPayment.getBrand({
                      cardBin : prefixcartao,
                      success : function(response){
                          $(".bandeira").val(response.brand.name)
                      },
                      error : function(response){
                          alert("Numero do cartao inválido")
                      }
                  })
              } 
         })
       
             $(".nparcela").on('blur', function(){
                 
             var bandeira = $(".bandeira").val('VISA');
             var totalParcelas = $(this).val();
             
             if(bandeira == ""){
                 alert("Preencha o numero cartão válido")
                 return;
             }
             
             PagSeguroDirectPayment.getInstallments({
                 amount : $(".totalfinal").val(),
                 maxIntallmentsNoInterest : 2,
                 brand : bandeira, 
                 success : function(response){
                     console.log(response);
                     let status = response.error
                     if(status){
                         alert("Não foi encontrado parcelamento")
                         return ;
                     }
                     let indice = totalParcelas - 1;
                     let totalapagar = response.installments[bandeira][indice].totalAmount
                     let valorTotalParcela = response.installments[bandeira][indice].installmentAmount
                     console.log(totalapagar)
                     $(".totalparcela").val(valorTotalParcela)
                     
                     $(".totalapagar").val(totalapagar)
                 }
             })              
         })
       
     
    })                


</script>
@endsection

@section("conteudo")

<form>
    @php $total = 0; @endphp
    @if(isset($cart) && count($cart) > 0)
<hr>
<br>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>            
            <th>Valor</th>
        </tr>    
    </thead>
    <tbody>
       
        @foreach($cart as $indice => $p)
        <tr>
           
            <td>{{$p->nome}}</td>
            <td>{{$p->valor}}</td>
     
        </tr>
        @php $total += $p->valor; @endphp
        @endforeach        
    </tbody> 
</table>
    @endif
    <input type="text" name="hashseller" class="hashseller"}">
    <input type="text" name="bandeira" class="bandeira"}">
    <div class="row">
        <div class="col-4"><!-- comment -->
            Cartão de Crédito:
            <input type="text" name="ncredito" class="ncredito form-control" /><!-- comment -->
        </div>
        <div class="col-4"><!-- comment -->
            CVV:
            <input type="text" name="ncvv" class="ncvv form-control" /><!-- comment -->
        </div><!-- comment -->
        <div class="col-4"><!-- comment -->
            Mes de Experição:
            <input type="text" name="mesexp" class="mesexp form-control" /><!-- comment -->
        </div>
        <div class="col-4"><!-- comment -->
            Ano de Expiração:
            <input type="text" name="anoexp" class="anoexp form-control" /><!-- comment -->
        </div>
        <div class="col-4"><!-- comment -->
            Nome no Cartão:
            <input type="text" name="nomecartao" class="nomecartao form-control" /><!-- comment -->
        </div>
        <div class="col-4"><!-- comment -->
            Parcelas:
            <input type="text" name="nparcela" class="nparcela form-control" /><!-- comment -->
        </div>
        <div class="col-4"><!-- comment -->
            Valor Total:
            <input type="text" name="totalfinal" class="totalfinal form-control"  value="{{ $total }}" readonly /><!-- comment -->
        </div>
        <div class="col-4"><!-- comment -->
            Valor da Parcela
            <input type="text" name="totalparcela" class="totalparcela form-control" /><!-- comment -->
        </div>
          <div class="col-4"><!-- comment -->
            Valor à Pagar:
            <input type="text" name="totalapagar" class="totalapagar form-control" /><!-- comment -->
        </div>
           
    </div> <br> 
     @csrf
        <input type="button" value="Pagar" class="btn btn-lg btn-success pagar">    
</form>

@endsection