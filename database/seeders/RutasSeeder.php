<?php

namespace Database\Seeders;

use App\Models\Rutas;
use Illuminate\Database\Seeder;

class RutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rutas = [
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "08:00:00",
                "costo" => 85.00,
                "destino_id" => 1,
                "buses_id" => 1,
                "chofer_id" => 12,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "10:00:00",
                "costo" => 72.00,
                "destino_id" => 2,
                "buses_id" => 2,
                "chofer_id" => 13,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "12:00:00",
                "costo" => 40.00,
                "destino_id" => 3,
                "buses_id" => 3,
                "chofer_id" => 14,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "14:00:00",
                "costo" => 120.00,
                "destino_id" => 4,
                "buses_id" => 4,
                "chofer_id" => 15,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "16:00:00",
                "costo" => 90.00,
                "destino_id" => 5,
                "buses_id" => 5,
                "chofer_id" => 16,
            ],
        ];
        foreach ($rutas as $ruta) {
            Rutas::create($ruta);
        }
    }
}
