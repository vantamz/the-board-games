<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\User;
use Illuminate\Http\Request;

class customerController extends Controller
{
    //
    public function index()
    {
        $customers = customer::where('status', '!=', 0)->get();
        return view('admin.customer.customer', compact('customers'));
    }

    public function customerEdit($id)
    {
        $customer = customer::find($id);
        $user = User::where('id', '=', $customer->user_id)->first();
        return view('admin.customer.customer-edit', compact('customer', 'user'));
    }

    public function update(Request $request)
    {
        $customer = customer::find($request->customer_id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->birth = $request->birth;
        $customer->sex = $request->gender;
        if ($request->image != null) {
            $customer->avatar = $this->ImgUpload($request);
        } else {
            $customer->avatar = $customer->avatar;
        }
        $customer->address = $request->address;
        $customer->save();
        $user = User::where('id', '=', $customer->user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        toast('Customer info update', 'success');
        $user->save();

        return redirect()->route('customer-index');
    }
    public function lockCustomer(Request $request)
    {
        $customer = customer::find($request->customerId);
        $customer->status = 0;
        $user = User::find($customer->user_id);
        $user->status = 0;
        $user->save();
        $customer->save();
        toast('Customer status update', 'success');
        return redirect()->back();
    }
    public function ImgUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $request->validate(
                    [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]
                );
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Img/customer-avatar'), $imageName);
                return $imageName;
            }
            return '';
        }
    }
}
