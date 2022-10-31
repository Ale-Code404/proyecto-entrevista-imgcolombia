<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forma_pagos')->insert([
            ['nombre' => 'Efectivo'],
            ['nombre' => 'Crédito Ahorro'],
            ['nombre' => 'Débito Ahorro'],
            ['nombre' => 'Cheque'],
            ['nombre' => 'Transferencia Crédito Bancario'],
            ['nombre' => 'Transferencia Débito Bancaria'],
            ['nombre' => 'Tarjeta Crédito'],
            ['nombre' => 'Tarjeta Débito'],
            ['nombre' => 'Efectivo']
        ]);
    }
}
