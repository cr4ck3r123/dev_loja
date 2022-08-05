<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

        $cat2 = new \App\Models\Categoria(['categoria' => 'Informatica']);
        $cat2->save();

        $user = new \App\Models\Usuario(['nome' => 'Fernando X. de Oliveira', 'email' => 'fernando@gmail.com', 'password' => '123456', 'telefone' => '991174316', 'nivel_usuario' => 1]);
        $user->save();

        $prod1 = new \App\Models\Produto(['nome' => 'Playstation 4', 'valor' => 1200, 'foto' => 'images/produto1.jpg', 'descricao' => '500 G', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod1->save();

        $prod2 = new \App\Models\Produto(['nome' => 'Capitão America', 'valor' => 150, 'foto' => 'images/produto2.jpg', 'descricao' => 'Ficture action pvc', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome' => 'Tenis', 'valor' => 250, 'foto' => 'images/produto3.jpg', 'descricao' => 'Solado de borracha', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'Bola Penalti', 'valor' => 1200, 'foto' => 'images/produto4.jpg', 'descricao' => 'Bola de couro para futebol de campo', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome' => 'Bola Puma', 'valor' => 1200, 'foto' => 'images/produto4.jpg', 'descricao' => 'Bola de couro para futebol de campo', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome' => 'Bola Olimpiadas', 'valor' => 1200, 'foto' => 'images/produto4.jpg', 'descricao' => 'Bola de couro para futebol de campo', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod6->save();
        
        $prod7 = new \App\Models\Produto(['nome' => 'Bola Olimpiadas', 'valor' => 1200, 'foto' => 'images/produto4.jpg', 'descricao' => 'Bola de couro para futebol de campo', 'estoque' => 5, 'categoria_id' => $cat->id]);
        $prod7->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
};
