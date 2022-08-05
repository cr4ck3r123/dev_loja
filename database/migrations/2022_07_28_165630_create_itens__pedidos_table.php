<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens__pedidos', function (Blueprint $table) {
          
            $table->integer("quantidade");
            $table->decimal("valor",10,2);
            $table->date("data_item");
            $table->integer("produto_id")->unsigned();
            $table->integer("pedido_id")->unsigned();
            $table->timestamps();
            
            $table->foreign("produto_id")
                    ->references("id")
                    ->on("produtos")
                    ->onDelete("cascade");
                                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens__pedidos');
    }
};
