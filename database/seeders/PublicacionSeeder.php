<?php

namespace Database\Seeders;

use App\Models\Imagenes;
use Illuminate\Database\Seeder;
use App\Models\Publicacion;
class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicacion= Publicacion::factory(300)->create();
        foreach ($publicacion as $publicaciones) {
            Imagenes::factory(1)->create([
                "imagen_id"=>$publicaciones->id,
                "imagen_type"=> Publicacion::class,
            ]);
            $publicaciones->etiquetas()->attach([rand(1, 4),rand(5, 8)]);
        }
    }
}
