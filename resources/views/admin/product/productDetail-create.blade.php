@extends('admin.layout')
@section('content')
<div class="container-fluid" style="padding-top: 20px">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Add Product</h2>
        </div>
    </div>
    <div class="table-admin">
        <form action="{{ route('product-detail-store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 row">
                    <div class="mb-3">
                        <label for="productType" class="form-label">Product</label>
                        <select name="product" id="productType" class="form-select">
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="productType" class="form-label">Size</label>
                                <input type="text" class="form-control" name="size">
                            </div>
                            <div class="col-lg-4">
                                <label for="productType" class="form-label">Origin</label>
                                <input type="text" class="form-control" name="origin">
                            </div>
                            <div class="col-lg-4">
                                <label for="productType" class="form-label">Weight</label>
                                <input type="text" class="form-control" name="weight">
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="productType" class="form-label">Age</label>
                                <input type="text" class="form-control" name="age">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"
                            placeholder="Description"></textarea>
                    </div>

                </div>

            </div>
            <div class="mb-3 d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

</div>
@endsection
