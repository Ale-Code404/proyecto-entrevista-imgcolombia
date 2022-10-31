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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->comment('Nombre del artículo');
            $table->decimal('valor_venta', 15, 2)
                ->comment('Valor de venta del artículo')
                ->default(0);

            $table->decimal('valor_costo', 15, 2)
                ->comment('Valor costo o de compra del artículo')
                ->default(0);

            $table->foreignId('impuestos_id')
                ->comment('Impuesto aplicado al artículo')
                ->constrained('impuestos');
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
        Schema::dropIfExists('articulos');
    }
};
