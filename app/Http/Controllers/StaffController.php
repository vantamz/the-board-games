<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    public function index()
    {
        //
        $staffs = staff::all();
        return view('admin.staff.staff', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.staff.staff-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $staffs = new staff();
            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->role = 2;
            $users->status = 1;
            $users->save();
            $staffs->name = $request->name;
            $staffs->phone = $request->phone;
            $staffs->birth = $request->birth;
            $staffs->sex = $request->gender;
            $staffs->address = $request->address;
            $staffs->avatar = $this->ImgUpload($request);
            $staffs->user_id = $users->id;
            toast('Staff created', 'success');
            $staffs->save();
            return redirect()->route('staff-index');
        } catch (\Exception $e) {
            toast('There are error, please check again', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $staff = staff::findOrFail($id);
        $user = User::join('employee', 'employee.user_id', '=', 'users.id')->where('employee.id', '=', $id)->get(/* ['users.*'] */);

        return view('admin.staff.staff-update', compact('staff', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        /* dd($this->ImgUpload($request))
        ; */
        $staffs = staff::findOrFail($request->id);
        $users = User::findOrFail($request->user_id);
        $users->name = $request->name;
        $users->save();
        $staffs->name = $request->name;
        $staffs->phone = $request->phone;
        $staffs->birth = $request->birth;
        $staffs->sex = $request->gender;
        $staffs->address = $request->address;
        $staffs->avatar = $this->ImgUpload($request);
        toast('Staff info updated', 'success');
        $staffs->save();
        return redirect()->route('staff-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $staffs = staff::findOrFail($request->staff_id);
        $users = User::findOrFail($staffs->user_id);
        $staffs->status = 0;
        $staffs->save();

        $users->status = 0;
        $users->save();

        return redirect()->route('staff-index');
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
                $request->image->move(public_path('Img/user-img/'), $imageName);
                return $imageName;
            }
            return '';
        }
    }
}
