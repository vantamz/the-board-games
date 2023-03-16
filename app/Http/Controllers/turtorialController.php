<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\turtorial;
use App\Models\product;

class turtorialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    public function index()
    {
        //
        $turtorials=turtorial::all();
        return view('admin.turtorial.turtorial',compact('turtorials'));
    }
    // public function create(){
    //     $products=product::all();

    //     return view('admin.turtorial.turtorial-create',compact('products'));
    // }
    public function store(Request $request){

        $turtorial=new turtorial();
        $turtorial->product_id=$request->product_id;
        $products=Product::find($turtorial->product_id);
        $turtorial->title=$products->name;
        $turtorial->content=$request->editor;

        $turtorial->save();
        return redirect()->route('turtorial');
    }
    public function edit($id){
        $productContent=turtorial::find($id);
        return view('admin.turtorial.turtorial-edit',compact('productContent'));
    }
    public function update(Request $request,$id){
        $productContent=turtorial::find($id);
        $productContent->content=$request->editor;
        $productContent->save();
        toast('Product content updated','success');
        return redirect('admin/turtorial');
    }
    public function destroy(Request $request){
        $productContent=turtorial::find($request->contentId);
        $productContent->delete();
        toast('Product content deleted','success');
        return redirect()->back();
    }

    public function ImgUpload(Request $request)
    {
        if($request->hasFile('editor'))
        {
            if($request->file('editor')->isValid())
            {
                $request->validate(
                [
                    'editor'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName=time().'.'.$request->editor->extension();
                $request->editor->move(public_path('Img/content'),$imageName);
                return $imageName;
            }
        }
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('Img/content'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('Img/content/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
