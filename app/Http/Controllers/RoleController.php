<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    //
    public function index(){
        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }
    public function store(){

        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        Session::flash('message', 'Role Created Successfully');
        return back();
    }

    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if ($role->isDirty('name')){
            Session::flash('message', 'Role Updated Successfully');
            $role->save();
        }else {
            Session::flash('error', 'Role value was not changed');
        }
        return back();
    }

    public function edit(Role $role){
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }
    public function destroy(Role $role){
        $role->delete();

        Session::flash('message', $role->name.' Role Deleted Successfully');

        return back();
    }
}
