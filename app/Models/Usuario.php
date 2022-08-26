<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends RModel implements Authenticatable
{
    protected $table = "usuarios";
    protected $fillable = ['email', 'cpf', 'password', 'nome'];
    
 
    public function getAuthIdentifier(): mixed {
        return "id";
    }

    public function getAuthIdentifierName(): string {
       return "password";
    }

    public function getAuthPassword(): string {
         return "password";
    }

    public function getRememberToken(): string {
    
    }

    public function getRememberTokenName(): string {
      
    }

    public function setRememberToken($value): void {
        
    }

}
