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
            //Invoice
            $table->string('factura_prefijo', 4)
                ->comment('Prefijo de la factura entrante')
                ->default('FC');

            $table->string('factura_consecutivo', 12)
                ->comment('Número consecutivo de la factura entrante, ej: FC000{2345}');

            //Bussiness
            $table->foreignId('proveedor_id')
                ->comment('Proveedor que expide la factura')
                ->constrained('terceros', 'id');

            $table->foreignId('cliente_id')
                ->comment('Cliente/Empresa que realiza la compra')
                ->constrained('terceros', 'id');

            $table->char('forma_pago', 1)
                ->comment('Forma de pago de la compra, (Contado o Crédito)');
            //Dates
            $table->dateTime('fecha_hora_emision')
                ->comment('Fecha y hora de la factura entrante')
                ->useCurrent();

            $table->dateTime('fecha_hora_vencimiento')
                ->comment('Fecha y hora de vencimiento de la factura entrante')
                ->useCurrent();


            //Totals
            $table->decimal('valor_total_base', 15, 2)
                ->comment('Valor total de la compra sin impuestos')
                ->default(0);

            $table->decimal('valor_total_impuesto', 15, 2)
                ->comment('Valor total de la compra en impuestos')
                ->default(0);

            $table->decimal('valor_total', 15, 2)
                ->comment('Valor total de la compra')
                ->default(0);

            //Purchase detail's text
            $table->string('observacion', 160)->default(null);
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
