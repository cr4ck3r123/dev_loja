<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\Itens_Pedido;
use Illuminate\Support\Facades\Auth;

class VendaService {
    
    
    
//    public function finalizarVenda($carrinho){
//        dd($carrinho, Auth::user());
//    }
//    
    
    public function finalizarVenda($carrinho){
        try {
            \DB::beginTransaction();
            $user = Auth::user();
            
           // dd("chegou");
            $pedido = new Pedido();     //Estancio um variavel pedido
            $dtHoje = new \DateTime();  //Estancia uma varia date
            
            //Abaixo eu seto os parametros 
            $pedido->datapedido = $dtHoje->format("Y-m-d H:i:s"); //Define a Data do pedido
            $pedido->status = "PEN"; 
            $pedido->usuario_id = $user->id;            
            $pedido->save();
                   
            foreach($carrinho as $p){
                $itens = new Itens_Pedido();
                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->data_item = $dtHoje->format("Y-m-d H:i:s");
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();                
            }
                    
            \DB::commit();     
             return ['status' => 'Ok', 'message' => 'venda finalizada com sucesso'];
        } catch (Exception $exc) {
            Log::error("ERRO:VENDA SERVICE", ['message' => $exec->getMessage()]);
            return ['status' => 'err', 'message' => 'venda não pode ser finalizada'];
            
        }
        }
}
