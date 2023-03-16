@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Add Product</h2>
        </div>
    </div>
    <div class="table-admin">
        <form action="{{ route('product-update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @method('Post')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="inputSKU" class="form-label">Stock Keeping Unit</label>
                        <input type="text" class="form-control" id="inputSKU" placeholder="Ex: MA-105" name="sku"
                            value="{{ $product->stock_keeper_unit }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="productType" class="form-label">Product Type</label>
                        <select name="productType" id="productType" class="form-select">
                            @foreach ($producttypes as $producttype)
                            <option value="{{ $producttype->id }}" <?php
                                if(!empty($product)) {if($product->id_product_type==$producttype->id){echo 'selected';}}
                            ?>>{{ $producttype->product_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="inputSupplier" class="form-label">Supplier</label>
                        <select name="supplier" id="inputSupplier" class="form-select">
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" <?php
                                if(!empty($product)) {if($product->id_product_type==$supplier->id){echo 'selected';}}
                            ?>>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="inputStaff" class="form-label">Staff</label>
                    <select name="staff" id="inputStaff" class="form-select">
                        @foreach ($staffs as $staff)
                        <option value="{{ $staff->id }}"
                            <?php if(!empty($product)) {if($product->id_product_type==$staff->id){echo 'selected';}} ?>>
                            {{ $staff->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="" name="name"
                            value="{{ $product->name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="inputStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="inputStock" name="stock"
                            value="{{ $product->stock }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="inputPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="inputPrice" name="price"
                            value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="productType" class="form-label">Size</label>
                                <input type="text" class="form-control" name="size"
                                    value="{{ isset($product) && $product->size!=null ? $product->size : '' }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="productType" class="form-label">Origin</label>
                                <input type="text" class="form-control" name="origin"
                                    value="{{ isset($product) && $product->origin!=null ? $product->origin : '' }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="productType" class="form-label">Weight</label>
                                <input type="text" class="form-control" name="weight"
                                    value="{{ isset($product) && $product->weight!=null ? $product->weight : '' }}">
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="productType" class="form-label">Age</label>
                                <input type="text" class="form-control" name="age"
                                    value="{{ isset($product) && $product->age!=null ? $product->age : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="8" class="form-control"
                            placeholder="Description">{{ isset($product) && $product->description!=null ? $product->description : '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="formPromotion" class="form-label">promotion</label>
                        <select name="promotion" id="formPromotion" class="form-select">
                            @foreach ($promotions as $promotion)
                            <option value="{{ $promotion->id }}"
                                <?php if(!empty($product)) {if($product->id_promotion==$promotion->id){echo 'selected';}} ?>>
                                {{ $promotion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="" class="form-label">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="status" name="status"
                            <?php if(!empty($product)) {if($product->status==1){echo 'checked';}} ?>>
                        <label class="form-check-label" for="status">
                            Active
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image" onchange="ImgPreview()">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="in cen">
                        <img id="img-preview" src="{{ asset('Img/product-img/'.$product->image) }}" style="width: 80%">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    function ImgPreview() {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("img-preview");
        preview.src = src;
    }

</script>
@endsection
