<?php

namespace Database\Factories;

use App\Models\Torneo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TorneoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Torneo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'anio' => $this->faker->numberBetween($min=2015, $max = 2021),
            'temporada' => Torneo::TEMPORADAS[rand(0,2)],
            'genero' => Torneo::GENEROS[rand(0,1)],
            'modo' => Torneo::MODOS[rand(0,2)],
        ];
    }
}
