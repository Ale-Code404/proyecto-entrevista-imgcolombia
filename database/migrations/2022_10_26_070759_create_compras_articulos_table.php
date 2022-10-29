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
        Schema::create('compras_articulos', function (Blueprint $table) {
            $table->foreignId('compras_id')->constrained();
            $table->foreignId('articulos_id')->constrained();
            $table->primary(['compras_id', 'articulos_id'], 'compras_articulos_id');
            $table->decimal('cantidad', 15, 2);
            $table->decimal('valor_base', 15, 2);
            $table->decimal('valor_impuesto', 15, 2);
            $table->decimal('valor_unitario', 15, 2);
            $table->decimal('valor_total', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras_articulos');
    }
};
