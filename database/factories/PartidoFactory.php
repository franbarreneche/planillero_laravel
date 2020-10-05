<?php

namespace Database\Factories;

use App\Models\Partido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matchday' => rand(1,10),
            'fecha' => $this->faker->date($format = 'Y-m-d',$max = 'now'),
            'hora' => $this->faker->time($format = 'H:i',$max = 'now'),
            'torneo_id' => rand(1,5),
            'equipo1_id' => rand(1,20),
            'equipo2_id' => rand(1,20),
            'sede_id' => rand(1,8),
        ];
    }
}
