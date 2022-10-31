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
            $table->foreignId('compras_id')->constrained('compras');
            $table->foreignId('articulos_id')->constrained('articulos');
            $table->primary(['compras_id', 'articulos_id'], 'compras_articulos_id');

            $table->tinyInteger('articulo_consecutivo', false, true)
                ->comment('Numero consecutivo del articulo en la compra (1, 2, 3...)');

            $table->decimal('cantidad', 15, 2)
                ->comment('Cantidad de articulos adquiridos')
                ->default(0);

            $table->decimal('valor_unitario_base', 15, 2)
                ->comment('Valor unitario sin impuestos')
                ->default(0);

            $table->decimal('valor_unitario_impuesto', 15, 2)
                ->comment('Valor unitario de impuestos')
                ->default(0);

            $table->decimal('valor_unitario_total', 15, 2)
                ->comment('Valor unitario total')
                ->default(0);

                $table->decimal('valor_total_base', 15, 2)
                ->comment('Valor total sin impuestos')
                ->default(0);

            $table->decimal('valor_total_impuesto', 15, 2)
                ->comment('Valor total de impuestos')
                ->default(0);

            $table->decimal('valor_total', 15, 2)
                ->comment('Valor total')
                ->default(0);

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
