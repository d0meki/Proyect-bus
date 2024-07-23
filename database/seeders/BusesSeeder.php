<?php

namespace Database\Seeders;

use App\Models\Autobus;
use Illuminate\Database\Seeder;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buses = [
            [
                'placa' => 'ABC123',
                'marca' => 'Toyota',
                'modelo' => '2021',
                'estado' => 'Activo',
            ],
            [
                'placa' => 'DEF456',
                'marca' => 'Hyundai',
                'modelo' => '2022',
                'estado' => 'Activo',
            ],
            [
                'placa' => 'GHI789',
                'marca' => 'Kia',
                'modelo' => '2023',
                'estado' => 'Activo',
            ],
            [
                'placa' => 'JKL012',
                'marca' => 'Mazda',
                'modelo' => '2024',
                'estado' => 'Activo',
            ],
            [
                'placa' => 'MNO345',
                'marca' => 'Chevrolet',
                'modelo' => '2025',
                'estado' => 'Activo',
            ],
        ];

        foreach ($buses as $bus) {
            Autobus::create($bus);
        }
    }
}
