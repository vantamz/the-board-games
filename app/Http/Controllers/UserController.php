<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\staff;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    //
    public function index()
    {
        $users = User::where('status', '!=', 0)->get();
        return view('admin/user/user', compact('users'));
    }
    public function edit($id)
    {
        $usersedit = User::findOrFail($id);
        $users = User::all();
        return view('admin/user/editUser', compact('users', 'usersedit'));
    }
    public function update(Request $request)
    {
        $users = User::findOrFail($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        if ($users->role = 3) {
            $customer = customer::where('user_id', $users->id)->first();
            $customer->name = $request->name;
            $customer->save();
        } elseif ($users->role = 3) {
            $staff = staff::where('user_id', $users->id)->first();
            $staff->name = $request->name;
            $staff->save();
        }
        $users->save();
        toast('User info update', 'success');
        return redirect()->route('user');
    }

    public function lockUser(Request $request)
    {
        $user = User::find($request->userId);
        if ($user->role == 2) {
            $account = staff::where('user_id', '=', $user->id)->first();
            $account->status = 0;
            $account->save();
        } elseif ($user->role == 3) {
            $account = customer::where('user_id', '=', $user->id)->first();
            $account->status = 0;
            $account->save();
        }
        $user->status = 0;
        $user->save();
        toast('User status update', 'success');
        return redirect()->back();
    }

    public function banList()
    {
        $users = User::join('customer', 'users.id', '=', 'customer.user_id')->where('customer.mark', 3)->get();
        return view('admin/user/banList', compact('users'));
    }

    public function unBan(Request $request)
    {

        $customer = customer::find($request->userId);
        $customer->mark = 0;
        // dd($customer);
        $customer->save();
        // $users=User::join('customer','users.id','=','customer.user_id')->where('customer.mark',3)->get();
        return redirect()->back();
    }
}
