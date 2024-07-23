<?php

namespace Database\Seeders;

use App\Models\DetalleReserva;
use App\Models\Rutas;
use Illuminate\Database\Seeder;

class DetalleReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rutas = Rutas::all();
        foreach ($rutas as $key => $ruta) {
            for ($i=1; $i <= 38; $i++) { 
                DetalleReserva::create([
                    'ruta_id' => $ruta->id,
                    'numero_asiento' => $i,
                ]);
            }
        }
    }
}
