<?php

namespace Database\Factories;

use App\Models\Categorias;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PublicacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publicacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name= $this->faker->unique()->sentence();
        return [
            "nombre"=> $name,
            "ficha"=>Str::slug($name),
            "extracto"=>$this->faker->text(250),
            "cuerpo"=> $this->faker->text(2000),
            "estados"=>$this->faker->randomElement([1, 2]),
            "id_categoria"=>Categorias::all()->random()->id,
            "id_usuario"=>User::all()->random()->id
        ];
    }
}
