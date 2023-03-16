<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\productDetail;
use App\Models\supplier;
use App\Models\productType;
use App\Models\staff;
use App\Models\promotion;
use App\Models\turtorial;
use App\Models\productImage;
use GuzzleHttp\Middleware;

class productController extends Controller
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
        $products = product::where('status', '=', 1)->get();
        return view('admin.product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $promotions = promotion::all();
        $staffs = staff::all();
        $producttypes = productType::where('status', 1)->get();
        $suppliers = supplier::where('status', 1)->get();
        return view('admin.product.product-create', compact('staffs', 'producttypes', 'suppliers', 'promotions'));
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
        $product = new product();
        $product->product_code = $request->sku;
        $product->product_type_id = $request->productType;
        $product->supplier_id = $request->supplier;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->importPrice = $request->ImportPrice;
        $product->stock = $request->stock;
        $product->promotion_id = 1;
        if ($request->status != null)
            $product->status = $request->status;
        else
            $product->status = 0;
        $product->image = $this->ImgUpload($request);
        // $product->promotion_price=$product->price-($product->price*$product->promotionRelation->rate/100);
        $product->promotion_price = $product->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->origin = $request->origin;
        $product->weight = $request->weight;
        $product->age = $request->age;

        $product->save();

        if ($request->hasfile('imageFile')) {
            $files = $request->file('imageFile');
            foreach ($files as $file) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('../Img/product-img'), $name);
                $product->image()->create(['image' => $name, 'product_id' => $product->id]);
            }
        }

        $turtorial = new turtorial();
        $turtorial->product_id = $product->id;
        $turtorial->title = $product->name . " description";
        $turtorial->content = $request->editor;
        toast('Product created', 'success');
        $turtorial->save();

        return redirect('admin/product');
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
        $promotions = promotion::all();
        $product = product::findOrFail($id);
        //$productDetail=productDetail::where('product_id',$id)->first();
        $staffs = staff::all();
        $producttypes = productType::all();
        $suppliers = supplier::all();
        return view('admin.product.product-edit', compact('staffs', 'producttypes', 'suppliers', 'product', 'promotions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = product::findOrFail($id);
        //$productDetail=productDetail::where('product_id',$id)->first();
        $product->product_code = $request->sku;
        $product->product_type_id = $request->productType;
        $product->supplier_id = $request->supplier;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->importPrice = $request->ImportPrice;
        $product->stock = $request->stock;
        $product->status = $request->status;
        if ($request->image != null) {
            $product->image = $this->ImgUpload($request);
        } else {
            $product->image = $product->image;
        }
        // $product->promotion_id=1;
        // $product->promotion_price=$product->price;
        // $product->promotion_price=$product->price-($product->price*$product->promotionRelation->rate/100);
        $product->description = $request->description;
        $product->size = $request->size;
        $product->origin = $request->origin;
        $product->weight = $request->weight;
        $product->age = $request->age;
        // dd($product);
        $product->save();
        toast('Product info updated', 'success');
        return redirect('admin/product');
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
        $product = product::findOrFail($request->productID);
        $productImages = productImage::where('product_id', '=', $product->id)->get();
        foreach ($productImages as $item) {
            $item->status = 0;
            $item->save();
        }

        $description = turtorial::where('product_id', '=', $product->id)->first();
        if ($description !== null) {
            $description->status = 0;
            $description->save();
        }
        $product->status = 0;
        $product->save();
        //$product->delete();
        toast('Product status changed', 'success');
        return redirect('admin/product');
    }
    public function ImgSingle(Request $request)
    {
        $imageName = time() . '.' . $request->imageFile[0]->extension();
        $request->imageFile[0]->move('Img/product-img/', $imageName);
        return $imageName;
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

    public function productDetail()
    {
        $productDetails = productDetail::all();
        return view('admin.product.productDetail', compact('productDetails'));
    }

    public function productDetailCreate()
    {
        $products = product::all();
        return view('admin.product.productDetail-create', compact('products'));
    }
    public function productDetailStore(Request $request)
    {
        $productDetail = new productDetail();
        $productDetail->product_id = $request->product;
        $productDetail->description = $request->description;
        $productDetail->size = $request->size;
        $productDetail->origin = $request->origin;
        $productDetail->weight = $request->weight;
        $productDetail->age = $request->age;
        /* dd($productDetail); */
        $productDetail->save();
        /* return view('admin.product.productDetail-create',compact('products')); */
    }
}
