<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Etiquetas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(RoleSeeder::class);

         $this->call(UserSeeder::class);
         Categorias::factory(4)->create();
         Etiquetas::factory(8)->create();
      
         $this->call(PublicacionSeeder::class);

    }
}
