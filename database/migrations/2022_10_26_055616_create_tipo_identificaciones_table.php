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
        Schema::create('tipo_identificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->comment('Nombre del tipo de identificación (Cédula de Ciudadania...)');
            $table->string('nombre_corto', 10)->comment('Nombre corto del tipo de identificación (CC, NIT...)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_identificaciones');
    }
};
