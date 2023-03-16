@extends('admin.layout')
@section('content')
<div class="container-fluid pad-top-20 pad-bot-50">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Product Detail</h2>
        </div>

        <div class=" p-2 bd-highlight">
            <a class="btn btn-primary" href="{{ route('product-detail-create') }}">New Product Detail</a>
        </div>
    </div>
    <div class="table-responsive table-admin mb-4">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Product id</th>
                <th>Description</th>
                <th>Size</th>
                <th>Origin</th>
                <th>Weight</th>
                <th>Age</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($productDetails as $productDetail)
                <tr>
                    <td>{{ $productDetail->id }}</td>
                    <td>{{ $productDetail->product_id }}</td>
                    <td>{{ $productDetail->description }}</td>
                    <td>{{ $productDetail->size }}</td>
                    <td>{{ $productDetail->origin }}</td>
                    <td>{{ $productDetail->weight }}</td>
                    <td>{{ $productDetail->age }}</td>
                    <td>
                        <a href="{{ route('product.edit',$productDetail->id) }}" class="btn btn-warning editUser"><i class="far fa-pencil"></i></a>

                    </td>
                    <td>
                        <button  class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="fal fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
