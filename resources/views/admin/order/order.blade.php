@extends('admin.layout')
@section('content')
<div class="container-fluid" style="padding-top: 20px">
    <div class="table-responsive table-admin mb-4">
        <table class="table">
            <thead>
                <thead>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Total price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>$ 850 </td>
                    <td>5/6/2021</td>
                    <td>1</td>
                    <td><a href="{{ route('order-detail') }}" class="btn btn-success"><i class="fal fa-info-square"></i></a></td>
                    <td><a class="btn btn-danger"><i class="fal fa-trash"></i></a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>1</td>
                    <td>$ 850 </td>
                    <td>5/6/2021</td>
                    <td>1</td>
                    <td><a href="{{ route('order-detail') }}" class="btn btn-success"><i class="fal fa-info-square"></i></a></td>
                    <td><a class="btn btn-danger"><i class="fal fa-trash"></i></a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>1</td>
                    <td>$ 850 </td>
                    <td>5/6/2021</td>
                    <td>1</td>
                    <td><a href="{{ route('order-detail') }}" class="btn btn-success"><i class="fal fa-info-square"></i></a></td>
                    <td><a class="btn btn-danger"><i class="fal fa-trash"></i></a></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
