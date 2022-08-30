<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Support\Facades\Auth; 

class Usuario extends RModel implements Authenticatable
{
   
    protected $table = "usuarios";
    protected $fillable = ['email', 'password', 'nome', 'cpf'];
    
 
    public function getAuthIdentifier(): mixed {
      return $this->nome;
    }

    public function getAuthIdentifierName(): string {
       return $this->getKey();
    }

    public function getAuthPassword(): string {
         return 'password';
    }

    public function getRememberToken(): string {
    
    }

    public function getRememberTokenName(): string {
      
    }

    public function setRememberToken($value): void {
        
    }

}
