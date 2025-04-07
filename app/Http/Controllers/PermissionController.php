<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;



class PermissionController extends Controller
{


    // public function __construct()
    // {
    //     // Middleware'larni aniqlash
    //     $this->middleware('permission:view permissions')->only('index');
    //     $this->middleware('permission:edit permissions')->only('edit');
    //     $this->middleware('permission:create permissions')->only('create');
    //     $this->middleware('permission:delete permissions')->only('destroy');
    // }


    // Bu metod permission pageni ko'rsatadi
    public function index(){

        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(20);

        return view('permissions.list',[
            'permissions'=>$permissions

        ]);
    }

    //Bu metod permission create page ni ko'rsatadi
    public function create(){
        
        return view('permissions.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[

            'name'=>'required|unique:permissions|min:3'
        ]);

        if ($validator -> passes()) {

            Permission::create(['name' => $request -> name]);
            return redirect()->route('permissions.index')->with('success', 'Permission added successfully'); 

        } else {
            return redirect() -> route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id) {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', [
            'permission'=>$permission
        ]);

    }

    public function update($id, Request $request)
    {            
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,' . $id . '|min:3',
        ]);
    
        if ($validator->passes()) {

            $permission->name = $request->name;
            $permission->save(); 
    
            return redirect()
                ->route('permissions.index')
                ->with('success', 'Permission updated successfully');
        } else {
            return redirect()
                ->route('permissions.create')
                ->withInput()
                ->withErrors($validator);
        }
    }
    

    public function destroy($id) {

        $permission = Permission::find($id);

        if ($permission) {
            $permission->delete();
            return redirect()->route('permissions.index')->with('success', 'Permission muvaffaqiyatli o‘chirildi.');
        }
    
        return redirect()->route('permissions.index')->with('error', 'Permission topilmadi.');


    }
}
