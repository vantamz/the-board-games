<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\hasRole;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    //
    public function index(){
        $roles = Role::all();
        return view('admin/user/role',compact('roles'));
    }

    public function roleStore(Request $request){
        $role = Role::create(['name' => $request->name]);
        return redirect()->route('role');
    }

    public function assignRole(){
        $roles=Role::all();
        $users=User::all();
        $hasRole=hasRole::all();
        return view('admin.user.permission',compact('roles','users','hasRole'));
    }

    public function assignRole_store(Request $request){
        $user=User::findOrFail($request->user);
        $user->assignRole($request->role);
        return back();
    }
}
