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
        Schema::create('terceros', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_comercial', 120)
                ->comment('Nombre comercial de la empresa o el tercero');

            $table->foreignId('tipo_identificaciones_id')
                ->comment('Tipo de identificación del tercero (CC, NIT...)')
                ->constrained('tipo_identificaciones');

            $table->string('identificacion', 12)
                ->comment('Número de identificacion del tercero');

            $table->char('dv', 1);
            $table->foreignId('tipo_terceros_id')
                ->comment('Tipo de tercero (Client, Proveedor...)')
                ->constrained('tipo_terceros');

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
        Schema::dropIfExists('terceros');
    }
};
