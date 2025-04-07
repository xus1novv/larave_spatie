<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:view roles')->only('index');
    //     $this->middleware('permission:edit roles')->only('edit');
    //     $this->middleware('permission:create roles')->only('create');
    //     $this->middleware('permission:delete roles')->only('destroy');
    // }


    public function index(){

        $roles = Role::orderBy('name', 'ASC')->paginate(10);

        return view('roles.list', [
            'roles'=>$roles
        ]);
    }

    public function create(){

        $permissions = Permission::orderBy('name','ASC')->get();
        return view('roles.create', [
            'permissions'=>$permissions
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:3|unique:roles'
        ]);

        if ($validator -> passes()){
            $role = Role::create(['name'=>$request->name]);

            if (!empty($request->permission)){
                foreach ($request->permission as $name){
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('roles.index')->with('success', 'Role added successfully'); 
        } else {
            return redirect() -> route('roles.create')->withInput()->withErrors($validator);

        }

    }

    public function edit($id){
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name','ASC')->get();


        return view('roles.edit', [
            'permissions'=>$permissions,
            'hasPermissions'=>$hasPermissions,
            'role'=>$role
        ]);
        
    }

    public function update($id,Request $request){

        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:roles,name,'.$id.'min:3'
        ]);

        if ($validator -> passes()){    

            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)){
                $role -> syncPermissions($request->permission);
            } else {
                $role -> syncPermissions([]);
            }

            return redirect()->route('roles.index')->with('success', 'Role update successfully'); 
        } else {
            return redirect() -> route('roles.edit', $id)->withInput()->withErrors($validator);

        }
        
    }

    public function destroy($id){

        $role = Role::find($id);

        if ($role) {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Role delete successfully');
        }
    
        return redirect()->route('roles.index')->with('error', 'Role does not found');
        
    }
}
