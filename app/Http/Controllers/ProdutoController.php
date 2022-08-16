<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;

class ProdutoController extends Controller
{
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
   
}
