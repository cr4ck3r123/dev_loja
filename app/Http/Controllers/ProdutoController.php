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
              
              
       return view("categoria", $data); 
   }
}
