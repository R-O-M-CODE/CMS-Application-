<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    //
    public function index(){
        return view('admin.permission.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(Permission $permission){
        request()->validate([
            'name' => ['required']
        ]);
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(request('name'))->slug('-')
        ]);

        Session::flash('message', 'Permission Added Successfully');

        return back();
    }


    public function edit(Permission $permission){

        return view('admin.permission.edit', ['permission' => $permission]);

    }

    public function update(Permission $permission){

        $permission->name = Str::ucfirst(request('name'));

        $permission->slug = Str::of(request('name'))->slug('-');

        if($permission->isDirty('name')){
            Session::flash('message', 'Permission "'.$permission->name.'" Updated Successfully');
            $permission->save();
        }else{
            Session::flash('error', 'You haven\'t made any changes');
        }

        return back();

    }

    public function destroy(Permission $permission){
        $permission->delete();

        Session::flash('message', 'Permission "'.$permission->name.'" Deleted Successfully');

        return back();
    }
}
