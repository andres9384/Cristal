<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name"=>"Andres Felipe Cristancho Hastamorir",
            "email"=>"afcristancho5@misena.edu.co",
            "password"=>bcrypt("mostruo.50")
        ]);
        User::factory(9)->create();
    }
}
