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
        Schema::create('compras_forma_pagos', function (Blueprint $table) {
            $table->foreignId('compras_id')->constrained('compras');
            $table->foreignId('forma_pagos_id')->constrained('forma_pagos');
            $table->primary(['compras_id', 'forma_pagos_id'], 'compras_forma_pagos_id');

            $table->decimal('valor', 15, 2)
                ->comment('Valor de la forma de pago')
                ->default(0);

            $table->string('observacion', 160)
                ->comment('Observación del valor sobre la forma de pago')
                ->default(null);

            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras_forma_pagos');
    }
};
