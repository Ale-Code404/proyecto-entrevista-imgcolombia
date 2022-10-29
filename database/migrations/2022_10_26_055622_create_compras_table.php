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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('factura_prefijo', 4)->default('FC');
            $table->string('factura_consecutivo', 12);
            $table->foreignId('proveedor_id')->constrained('terceros', 'id');
            $table->foreignId('cliente_id')->constrained('terceros', 'id');
            $table->dateTime('fecha_hora_emision');
            $table->decimal('valor_total_base', 15, 2);
            $table->decimal('valor_total_impuesto', 15, 2);
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
        Schema::dropIfExists('compras');
    }
};
