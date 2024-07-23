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
                "costo" => 1000.00,
                "destino_id" => 1,
                "buses_id" => 1,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "10:00:00",
                "costo" => 1000.00,
                "destino_id" => 2,
                "buses_id" => 2,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "12:00:00",
                "costo" => 1000.00,
                "destino_id" => 3,
                "buses_id" => 3,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "14:00:00",
                "costo" => 1000.00,
                "destino_id" => 4,
                "buses_id" => 4,
            ],
            [ 
                "fecha_salida" => "2021-07-21",
                "hora_salida" => "16:00:00",
                "costo" => 1000.00,
                "destino_id" => 5,
                "buses_id" => 5,
            ],
        ];
        foreach ($rutas as $ruta) {
            Rutas::create($ruta);
        }
    }
}
