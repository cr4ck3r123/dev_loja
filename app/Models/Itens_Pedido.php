<?php

namespace App\Models;


class Itens_Pedido extends RModel
{
  protected $table = "itens__pedidos";
  protected $fillable = ['quantidade', 'valor', 'data_item', 'produto_id','pedido_id'];
}
