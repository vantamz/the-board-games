<?php

namespace App\Http\Controllers;

use App\Http\Middleware\checkLogin;
use Illuminate\Http\Request;
use App\Models\supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use HasRole;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    //
    public function index(){
        $supplier=supplier::all();
        return view('admin.supplier.supplier',compact('supplier'));
    }
    
    public function store(Request $request)
    {
        //
        $supplier=new supplier;
        $supplier->name = $request->name;
        $supplier->address=$request->address;
        $supplier->phone=$request->phone;
        $supplier->email=$request->email;
        $supplier->save();
        return redirect()->back();
    }
    
    public function edit($id){
        $supplier=supplier::all();
        $editData=supplier::find($id);
        return view('admin.supplier.supplier',compact('editData','supplier'));
    }
    public function update(Request $request,$id){
        $supplier=supplier::find($id);
        $supplier->name = $request->name;
        $supplier->address=$request->address;
        $supplier->phone=$request->phone;
        $supplier->email=$request->email;
        $supplier->save();
        return redirect('admin/supplier');
    }
    
    public function destroy($id){
        $supplier=supplier::find($id);
        $supplier->delete();
        return redirect()->back();
    }
}
