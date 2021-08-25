<?php

namespace App\Http\Controllers\Andmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolController extends Controller
{

    public function index()
    {

        $roles = Role::all();
        return view("admin.rol.index",compact("roles"));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view("admin.rol.create",compact("permissions"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route("admin.rol.edit",$role)->with("info","El rol se a creado con exito");
    }

   
    public function show(Role $role)
    {
        return view("admin.rol.show",compact("role"));
    }

   
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view("admin.rol.edit",compact("role","permissions"));
    }

 
    public function update(Request $request, Role $role)
    {
        $request->validate([
            "name"=>"required",
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route("admin.rol.edit",$role)->with("info","El rol se actualizo con exito");

    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route("admin.rol.index")->with("info","El rol se elimino con exito");
    }
}
