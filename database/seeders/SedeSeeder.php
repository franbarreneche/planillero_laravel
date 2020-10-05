<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create([
            "id" => 1,
            "nombre" => "Palermo",
            "direccion" => "Costa Rica 5299",
        ]);

        Sede::create([
            "id" => 2,
            "nombre" => "Noble",
            "direccion" => "Julio Argentino Noble 4100",
        ]);

        Sede::create([
            "id" => 3,
            "nombre" => "Distrito",
            "direccion" => "José Hernandez 1310",
        ]);

        Sede::create([
            "id" => 4,
            "nombre" => "KDT",
            "direccion" => "Jerónimo Salguero 3450",
        ]);

        Sede::create([
            "id" => 5,
            "nombre" => "Caballito",
            "direccion" => "Luis Viale 3056",
        ]);

        Sede::create([
            "id" => 6,
            "nombre" => "Banco",
            "direccion" => "Zufriategui 1251",
        ]);

        Sede::create([
            "id" => 7,
            "nombre" => "Banco",
            "direccion" => "Zufriategui 1251",
        ]);

        Sede::create([
            "id" => 8,
            "nombre" => "Villa Crespo",
            "direccion" => "Galicia 1973",
        ]);
    }
}
