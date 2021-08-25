<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name"=>"Admin"]);
        $role2 = Role::create(["name"=>"Blogger"]);

        Permission::create(["name" => "admin.home","description" => "Ver el Dashboard"])->syncRoles([$role1,$role2]);

        Permission::create(["name" => "admin.users.index","description" => "Ver listado de Usuario"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.edit","description" => "Asignar un Rol"])->syncRoles([$role1]);

        Permission::create(["name" => "admin.categories.index","description" => "Ver listado de Categorias"])->syncRoles([$role1,$role2]);
        Permission::create(["name" => "admin.categories.create","description" => "Crear Categorias"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.categories.edit","description" => "Editar Categorias"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.categories.destroy","description" => "Eliminar Categorias"])->syncRoles([$role1]);

        Permission::create(["name" => "admin.tags.index","description" => "Ver listado de Etiquetas"])->syncRoles([$role1,$role2]);
        Permission::create(["name" => "admin.tags.create","description" => "Crear Etiquetas"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.tags.edit","description" => "Editar Etiquetas"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.tags.destroy","description" => "Eliminar Etiquetas"])->syncRoles([$role1]);

        Permission::create(["name" => "admin.posts.index","description" => "Ver listado de Publicaciones"])->syncRoles([$role1,$role2]);
        Permission::create(["name" => "admin.posts.create","description" => "Crear Publicación"])->syncRoles([$role1,$role2]);
        Permission::create(["name" => "admin.posts.edit","description" => "Editar Publicación"])->syncRoles([$role1,$role2]);
        Permission::create(["name" => "admin.posts.destroy","description" => "Eliminar Publicación"])->syncRoles([$role1,$role2]);

        
    }
}
