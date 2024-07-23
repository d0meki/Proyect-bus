<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'nombre' => "Domeki",
            'apellido' => "Reira",
            'ci' => "4813900",
            'direccion' => "Villa 1ro de Mayo Calle 9 #6",
            'telefono' => "74668878",
            'avatar' => null, // avatar nulo
            'email' => "domekisito@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('irascema'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('usuario_roles')->insert([
            'user_id' => 1,
            'rol_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'nombre' => "Isai",
            'apellido' => "Calani",
            'ci' => "123456789",
            'direccion' => "Los Lotes",
            'telefono' => "77046105",
            'avatar' => null, // avatar nulo
            'email' => "isai@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Crear 10 usuarios con avatares nulos
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'ci' => $faker->ean13,
                'direccion' => $faker->address,
                'telefono' => $faker->phoneNumber,
                'avatar' => null, // avatar nulo
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Cambia 'password' si lo deseas
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('usuario_roles')->insert([
                'user_id' => $i + 2,
                'rol_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
