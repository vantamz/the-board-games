<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class voucherController extends Controller
{
    //
    public function index()
    {
        $vouchers = voucher::all();
        return view('admin.product.voucher', compact('vouchers'));
    }

    public function store(Request $request)
    {
        $voucher = new voucher();
        $voucher->name = $request->name;
        $voucher->voucher_code = strtoupper(Str::random(10));
        $voucher->price = $request->price;
        $voucher->point = $request->point;
        $voucher->quantity = $request->quantity;
        $voucher->image = $this->ImgUpload($request);
        $voucher->save();
        toast('New voucher created', 'success');
        //dd($voucher->voucher_code);
        return redirect()->back();
        // return view('admin.product.voucher');
    }

    public function edit($id, Request $request)
    {
        $editData = voucher::find($id);
        $vouchers = voucher::all();
        return view('admin.product.voucher', compact('editData', 'vouchers'));
    }

    public function update($id, Request $request)
    {
        $voucher = voucher::find($id);
        $voucher->name = $request->name;
        $voucher->price = $request->price;
        $voucher->point = $request->point;
        $voucher->quantity = $request->quantity;
        if ($request->image != null) {
            $voucher->image = $this->ImgUpload($request);
        } else {
            $voucher->image = $voucher->image;
        }
        $voucher->save();
        toast('voucher updated', 'success');
        return redirect('admin/voucher');
    }

    public function lock(Request $request)
    {
        $vouchers = voucher::find($request->voucherId);
        $vouchers->status = 0;
        //$vouchers->save();
        toast('voucher deactivate', 'success');
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
                $request->image->move(public_path('Img/voucher-img'), $imageName);
                return $imageName;
            }
        }
    }
}
