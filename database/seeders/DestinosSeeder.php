<?php

namespace Database\Seeders;

use App\Models\Destinos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinos = [
            [
                'nombre' => 'Cancún',
                'estado' => 'Activo',
                'latitud' => 21.1619,
                'longitud' => -86.8515,
            ],
            [
                'nombre' => 'Acapulco',
                'estado' => 'Activo',
                'latitud' => 16.8531,
                'longitud' => -99.8237,
            ],
            [
                'nombre' => 'Puerto Vallarta',
                'estado' => 'Activo',
                'latitud' => 20.6534,
                'longitud' => -105.2253,
            ],
            [
                'nombre' => 'Los Cabos',
                'estado' => 'Activo',
                'latitud' => 22.8905,
                'longitud' => -109.9167,
            ],
            [
                'nombre' => 'Playa del Carmen',
                'estado' => 'Activo',
                'latitud' => 20.6296,
                'longitud' => -87.0739,
            ],
        ];

        foreach ($destinos as $destino) {
            Destinos::create($destino);
        }
    }
}
