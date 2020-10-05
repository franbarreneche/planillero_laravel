<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Torneo;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Torneo::factory()
            ->times(5)
            ->create();
    }
}
