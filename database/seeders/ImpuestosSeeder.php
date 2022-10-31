<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('impuestos')->insert([
            ['nombre' => 'IVA | Exento', 'nombre_corto' => 'IVA 0%', 'porcentaje' => 0 ],
            ['nombre' => 'IVA | Bienes / Servicios al 5', 'nombre_corto' => 'IVA 5%', 'porcentaje' => 0.05 ],
            ['nombre' => 'IVA | Tarifa general', 'nombre_corto' => 'IVA 19%', 'porcentaje' =>  0.19 ]
        ]);
    }
}
