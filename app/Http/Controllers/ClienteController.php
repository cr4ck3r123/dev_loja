<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;

class ClienteController extends Controller
{
 public function cadastrar(Request $request){
     $data = [];
     
     return view("cadastrar", $data);
 }
 
 //Função de cadastrar Cliente
 public function cadastrarCliente(Request $request ){
     
     //Pega todos os valores do formulario
     $values = $request->all();     
     $usuario = new \App\Models\Usuario();
     //$usuario->cpf == $request->input("cpf", "");
     $usuario->fill($values);
     $endereco = new Endereco($values);
     $endereco->logradouro = $request->input("endereco", "");
   //  dd($endereco);
             
   try {
       $usuario->save(); //Salvar Usuario
       $endereco->usuario_id = $usuario->id; //Relacionamento das tabelas
       $endereco->save(); //Salvar endereço
       
   } catch (Exception $exc) {
       echo $exc->getTraceAsString();
   }



   return redirect()->route("cadastrar");
 }
}
