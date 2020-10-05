<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jugadores = "";
        for($i=0;$i<10;$i++) {
            $jugadores = $jugadores.$this->faker->name."\n";
        }        
        return [
            'nombre' => $this->faker->company,
            'jugadores' => $jugadores,
            'torneo_id'=> rand(1,5),
        ];
    }
}
