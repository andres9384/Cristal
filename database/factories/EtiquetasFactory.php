<?php

namespace Database\Factories;

use App\Models\Etiquetas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 
class EtiquetasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etiquetas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name= $this->faker->unique()->word(20);
        return [
            "nombre"=>$name,
            "ficha"=> Str::slug($name),
            "color"=>$this->faker->randomElement(["#800080","#778899","#FAEBD7", "#1E90FF", "#D2691E", "#00FA9A","#C71585","#FF0000"])
        ];
    }
}
