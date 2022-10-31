<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoIdentificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_identificaciones')->insert([
            ['nombre' => 'Tarjeta de Identidad', 'nombre_corto' => 'T.I'],
            ['nombre' => 'Cédula de Ciudadanía', 'nombre_corto' => 'C.C'],
            ['nombre' => 'Número de Identificación Tributaria', 'nombre_corto' => 'N.I.T'],
        ]);
    }
}
