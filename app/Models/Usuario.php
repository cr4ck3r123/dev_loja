<?php

namespace App\Models;

class Usuario extends RModel
{
   protected $table = "usuarios";
    protected $fillable = ['nome', 'email', 'password', 'telefone', 'nivel_usuario'];
 }
