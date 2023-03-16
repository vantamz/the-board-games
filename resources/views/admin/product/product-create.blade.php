@extends('admin.layout.layout')
@section('adminContent')
    <div class="inner-block">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>Add Product</h2>
            </div>
        </div>
        <div class="table-admin">
            <form action="{{ url('admin/product-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST');
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="inputSKU" class="form-label">Stock Keeping Unit</label>
                            <input type="text" class="form-control" id="inputSKU" placeholder="Ex: MA-105" name="sku" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="productType" class="form-label">Product Type</label>
                            <select name="productType" id="productType" class="form-control">
                                @foreach ($producttypes as $producttype)
                                <option value="{{ $producttype->id }}">{{ $producttype->product_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="inputSupplier" class="form-label">Supplier</label>
                            <select name="supplier" id="inputSupplier" class="form-control">
                                @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder=""
                                name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="inputStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="inputStock" name="stock" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="ImportPrice" class="form-label">Import price</label>
                                <input type="number" class="form-control" id="ImportPrice" name="ImportPrice" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="inputPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="inputPrice" name="price" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="productType" class="form-label">Size</label>
                                    <input type="text" class="form-control" name="size" required>
                                </div>
                                <div class="col-lg-4">
                                    <label for="productType" class="form-label">Origin</label>
                                    <input type="text" class="form-control" name="origin" required>
                                </div>
                                <div class="col-lg-4">
                                    <label for="productType" class="form-label">Weight</label>
                                    <input type="text" class="form-control" name="weight" required>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="productType" class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="8" class="form-control"
                                placeholder="Description" required></textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="formPromotion" class="form-label">Promotion</label>-->
                    <!--        <select name="promotion" id="formPromotion" class="form-control">-->
                    <!--            @foreach ($promotions as $promotion)-->
                    <!--            <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>-->
                    <!--            @endforeach-->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-lg-6">
                        <label for="" class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="status" name="status" checked>
                            <label class="form-check-label" for="status">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="productType" class="form-label">Description detail</label>
                    <textarea name="editor" id="editor" cols="30" rows="50" required></textarea>
                    {{-- <div id="editor" name="content"></div> --}}
                </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Representative Image</label>
                            <input class="form-control" type="file" id="formFile" name="image" onchange="ImgPreview()" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="in cen">
                            <img id="img-preview-single" style="width: 50%">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            {{-- <input class="form-control" type="file" id="formFile" name="image" onchange="ImgPreview()"> --}}
                            <input class="form-control" type="file" id="file-input" name="imageFile[]" multiple="multiple" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="in cen row">
                            {{-- <img id="img-preview" style="width: 70%;hright:70%"> --}}
                            {{-- <div id="img-preview" style="height:70%" class=" col-lg-12"></div> --}}
                            <div id="img-preview" class=" col-lg-12"></div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="d-flex justify-content-center cen">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

<script>
    $(document).ready(function(){
     $('#file-input').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {

            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                        $('#img-preview').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>

<script>
    function ImgPreview() {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("img-preview-single");
        preview.src = src;
    }

</script>
<script type="text/javascript">
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{route('Img-Upload', ['_token' => csrf_token() ])}}",
filebrowserUploadMethod: 'form'
});
</script>
@endsection
