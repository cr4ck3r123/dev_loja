<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Services\VendaService;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\Itens_Pedido;
use PagSeguro\Configuration\Configure;
use PagSeguro\Services\Session;

class ProdutoController extends Controller
{
    
    private $_configs;
    
    public function __construct() {
        $this->_configs = new Configure();
        $this->_configs->setCharset("UTF-8");
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env("PAGSEGURO_AMBIENTE"));
        $this->_configs->setLog(true, storage_path('logs/pagseguro_'.date('Ymd'). '.log'));
    }
    
    //Este metodo retorno um id de conexao
    public function getCredential(){
        return $this->_configs->getAccountCredentials();
    }
    
    
   public function index(Request $request){      
       $data = [];       
 
       //Buscar todos os produtos
       //Select * from Produtos
       $listaProdutos = \App\Models\Produto::all();
       $data["lista"] = $listaProdutos;
       
       
       return view("home", $data);             
   }
   
 
   
   public function categoria( Request $request, $idcategoria = 0){
              $data = [];    
              //Select * From categorias;
              $listaCategorias = Categoria::all();
              //Select * from produtos limit 4;
              $queryProdutos = Produto::limit(4);
              
              if($idcategoria != null){
                   $queryProdutos->where("categoria_id",$idcategoria);                   
              }
              
              $listaProdutos = $queryProdutos->get();
                                   
              $data["lista"] = $listaProdutos;
              $data["listaCategoria"] = $listaCategorias;
              $data["idcategoria"] = $idcategoria;
              
              
       return view("categoria", $data); 
   }
   
   public function adicionarCarrinho($idProduto = 0, Request $request){
       //Buscar o produto ID
       $prod = Produto::find($idProduto);
       
       if($prod){
           //Encontrou um produto
           //Buscar da sessão o carrinho atual
           $carrinho = session('cart', []);
           
           array_push($carrinho, $prod);
           
           session(['cart' => $carrinho]);
           
       }
       return redirect()->route("home");
   }
   
   public function verCarrinho(Request $request){
       $carrinho = session('cart', []);
       $data = ['cart' => $carrinho ];
      // dd($carrinho);
       return view("carrinho", $data);
   }
   
   public function excluirCarrinho($indice, Request $request){
       
       $carrinho = session('cart', []);
       if(isset($carrinho[$indice])){
           unset($carrinho[$indice]);
       }
       session(["cart" => $carrinho]);
       return redirect()->route("ver_carrinho");
       
   }
      
   public function finalizar(Request $request){
       
       $carrinho = session('cart', []);
       $vendaService = new VendaService();
       $result = $vendaService->finalizarVenda($carrinho);
       
       if($result["status"] == "ok"){
           $request->session()->forget("cart"); //Para poder limpar a sessão;
           
       }
       
       $request->session()->flash($result["status"], $result["message"]);
       
       return redirect()->route("ver_carrinho");
   }
   
   public function historico(Request $request){
       $data = [];
       
       //Pegar o id do usuario
       $idUsuario = Auth::user()->id;
       $listaPedido = Pedido::where("usuario_id", $idUsuario)->orderBy("datapedido", "desc")->get();
       
       $data["lista"] = $listaPedido;
       
       return view("compra/historico", $data);
       
   }
   
   public function detalhes(Request $request){
       $idpedido = $request->input("idpedido");
       
       //Função query
       $listaItens = Itens_Pedido::join("produtos", "produtos.id", "=", "itens__pedidos.produto_id")->where("pedido_id", $idpedido)
               ->get([ 'itens__pedidos.*', 'itens__pedidos.valor as valoritem' , 'produtos.*']);
       
       $data = [];
       $data["listaItens"] = $listaItens;
       return view("compra/detalhes", $data);
   }
   
   
   public function pagar(Request $request){
       $data = [];
       
       $carrinho = session('cart', []);
       $data['cart'] = $carrinho;
       $sessionCode = \PagSeguro\Services\Session::create($this->getCredential());
              
       $sessionCode = Session::create($this->getCredential());
       
       $IDSession = $sessionCode->getResult();
       $data["sessionID"] = $IDSession;
       
       return view("compra/pagar", $data);
   }
   
}
