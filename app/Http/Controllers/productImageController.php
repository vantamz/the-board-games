<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productImage;
use Illuminate\Http\Request;

class productImageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    public function index()
    {
        $products = product::all();
        $productImages = productImage::all();
        return view('admin.product.productImage', compact('products', 'productImages'));
    }
    public function store(Request $request)
    {
        //validate the files
        if ($request->hasfile('imageFile')) {
            $files = $request->file('imageFile');
            foreach ($files as $file) {

                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('Img/product-img/'), $name);
                productImage::create([
                    'id_product' => $request->idProduct,
                    'image' => $name,
                ]);
            }
            return redirect()->route('product-img');
        }
    }

    public function deleteImg(Request $request)
    {
        $productImg = productImage::find($request->imgId);
        $productImg->delete();
        return redirect()->back();
    }
    public function editImg($id)
    {
        $productImg = productImage::find($id);
        return view('admin.product.productImage-edit', compact('productImg'));
    }
    public function updateImg(Request $request, $id)
    {

        $productImg = productImage::find($id);
        if ($request->image != null) {
            $productImg->image = $this->ImgUpload($request);
        } else {
            $productImg->image = $productImg->image;
        }
        $productImg->save();
        toast('Image updated', 'success');
        return redirect('admin/product-image');
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
                $request->image->move(public_path('Img/product-img/'), $imageName);
                return $imageName;
            }
        }
    }
}
