<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     // Middleware'larni aniqlash
    //     $this->middleware('permission:view users')->only('index');
    //     $this->middleware('permission:edit users')->only('edit');

    // }

    public function index()
    {
        //

        $users = User::latest()->paginate(10);
        return view('users.list',[
            'users'=>$users
        ]);
    }

   
    public function create()
    {
        $roles = Role::orderBy('name','ASC')->get();

        return view('users.create', [
            'roles'=>$roles
        ]);
    }

 
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name'=>'require|min:3',
            'email'=>'require|email|unique:users,email',
            'password'=>'require|min:8|same:confirm_password',
            'confirm_password'=>'require'



        ]);

        if ($validator->failed()){
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->syncRoles($request->role);

        return redirect() -> route('users.index') -> with('success', 'User create successfully!');
    }

  
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name','ASC')->get();

        $hasRole = $user -> roles -> pluck('id');
        return view('users.edit',[

            "user"=>$user,
            "roles"=>$roles,
            "hasRoles"=>$hasRole

        ]);

    }


    public function update(Request $request, string $id)
    {
        
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name'=>'require|min:3',
            'email'=>'require|email|unique:users,email'.$id.'min:3'
        ]);

        if ($validator->failed()){
            return redirect()->route('users.edit',$id)->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->syncRoles($request->role);

        return redirect() -> route('users.index') -> with('success', 'User update successfully!');


    }


    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user -> delete();
            return redirect()->route('users.index')->with('success', 'User delete successfully');
        }
        return redirect() -> route('users.index') -> with('error', 'User does not found');
    }
}
