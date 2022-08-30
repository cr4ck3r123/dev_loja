<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log;

class ClienteService {

    public function salvarUsuarios(Usuario $usuario, Endereco $endereco) {
        try {
            //Buscando um usuario com o email que já tem no banco de dados
            $dbUsuario = Usuario::where("email", $usuario->email)->first();
            
            if($dbUsuario){
                return ['status' => 'err', 'message' => 'Email já cadastrado no sistema'];
            }
            \DB::beginTransaction(); //Iniciar uma transação
            $usuario->save(); //Salvar Usuario
            $endereco->usuario_id = $usuario->id; //Relacionamento das tabelas
            // throw new \Exception("ERRO DEPOIS DE SALVAR O USUARIO");
            $endereco->save(); //Salvar endereço
            \DB::commit(); //Confirmando a transação
            
            return ['status' => 'ok', 'message' => 'Usuario cadastrado com sucesso!'];
        } catch (Exception $exc) {
            //Tratar o erro
       //     \Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario', 'message' => $exc->getMessage() ]);
            
            \DB::rollback(); //Cancelar a transação
//            //TRATAR O ERRO
//            echo $exc->getTraceAsString();
            return ['status' => 'err', 'message' => 'Usuario não cadastrado!'];
        }
    }

}
