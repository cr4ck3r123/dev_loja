<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Services\ClienteService;

class ClienteController extends Controller
{
 public function cadastrar(Request $request){
     $data = [];
     
     return view("cadastrar", $data);
 }
 
 //Função de cadastrar Cliente
 public function cadastrarCliente(Request $request ){
     
   
     $values = $request->all();    //Pega todos os valores do formulario   
     $usuario = new \App\Models\Usuario(); // Estancia um variavel usuario
          
     $usuario->fill($values); //$usuario->cpf == $request->input("cpf", ""); recebe apenas o que esta no fillable
     
     $senha = $request->input("password", "");
     $usuario->password = \Hash::make($senha); //Criptografar senha
     
     $endereco = new Endereco($values);
     $endereco->logradouro = $request->input("endereco", "");
   //  dd($endereco);
             
     $clienteService = new ClienteService();
     $result = $clienteService->salvarUsuarios($usuario, $endereco); //Salva o endereço com a function salvarUsuarios
     $message = $result["message"];
     $status = $result["status"];
// dd($result);
    //Ok, cadastrado com sucesso
     //err, Usuario não cadastrado
   $request->session()->flash($status, $message);
   return redirect()->route("cadastrar");
 }
}
