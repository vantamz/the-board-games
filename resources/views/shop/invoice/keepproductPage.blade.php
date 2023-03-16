@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Invoice</b></h1>
            </div>
        </div>
    </div>
</section>
<div class="container" style="padding-top: 20px;padding-bottom:50px">
    <div class="p-5" style="background: #f5f5f5;">
        <div class="row">
            <div class="col-3">
                <div class="d-flex align-items-center ">
                    <img src="@php
                        if (!empty($customer->avatar)) {
                            echo asset('Img/customer-avatar/' . $customer->avatar);
                        } elseif (!empty($staff->avatar)) {
                            echo asset('Img/user-img/' . $staff->avatar);
                        } else {
                            echo asset('Img/unsigned.png');
                        }
                    @endphp" class="profile_edit mr-2">

                    <p class="mb-0">
                        {{ auth()->user()->name }}
                        <br>
                        <img src="{{ asset('Img/coint.jpg') }}" alt="" style="width: 20%;height:20%">
                        {{ Auth::user()->userRelation->point }} Point
                    </p>
                </div>

                <div class="d-flex align-items-center mt-3 user-info">
                    <i class="fas fa-user"></i>
                    <p class="mb-0">
                        <a href="{{ route('profile-user') }}">My account</a>
                    </p>
                </div>

                <div class="d-flex align-items-center order-info ">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <p class="mb-0">
                        <a href="{{ route('invoice-shop') }}">My order</a>
                    </p>
                </div>
                <div class="d-flex align-items-center order-info active">
                    <i class="fas fa-box-alt"></i>
                    <p class="mb-0">
                        <a href="{{ url('invoice-keep-order') }}">Order keep @if (!empty($countKeep))
                            <span class="badge" style="background: red">{{ $countKeep }}</span>
                            @endif </a>
                    </p>
                </div>
                <div class="d-flex align-items-center order-info">
                    <i class="far fa-credit-card"></i>
                    <p class="mb-0">
                        <a href="{{ url('redeem-code') }}">Redeem code</a>
                    </p>
                </div>
            </div>
            <div class="col-9 mb-5">
                <h4 class="mt-2">My order</h4>
                <form action="{{ url('invoice-keep-store') }}" method="POST">
                    @csrf
                <div class="card border-0 myorder-wrapper mt-4 p-3">
                    <table class="table myorder-table table-responsive overflow-auto row-border hover todo-table" id="table_id">
                        <thead class="thead-light">
                            <tr class="align-middle h-90">
                                <th></th>
                                <th hidden>Id</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Total price</th>
                                <th scope="col">Order Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($invoices as $item)
                                <tr class="align-middle h-90 {{ $loop->last ? '' : 'hasborder' }}">
                                    <td>
                                        <input type="checkbox" name="checkId[]" value="{{ $item->id }}">
                                    </td>
                                    <td  class="id" hidden>{{ $item->id}}</td>
                                    <td>
                                        <a
                                            href="{{ route('invoice-detail', ['invoice' => $item->id]) }}">{{ $item->invoice_code }}</a>
                                    </td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>${{ $item->total_price }}</td>
                                    <td>@if($item->status==0)
                                                    <button type="button" class="btn btn-danger">Your order has been cancel</button>
                                                    
                                                        @elseif ($item->order_status==1)
                                                        <button type="button" class="btn btn-secondary">Your order has been confirmed</button>
                                                        
                                                        @elseif($item->order_status==2)
                                                        <button type="button" class="btn btn-warning">Your order are being delivered</button>
                                                        
                                                        @elseif($item->order_Status==3)
                                                        <button type="button" class="btn btn-success">Your order has been delivered</button>
                                                        
                                                        @endif</td>
                                                        <td>
                                                            @if($item->status==0)
                                                            <button type="button" class="btn btn-primary" disabled data-bs-toggle="modal" data-bs-target="#exampleModal">Cancel order</button>
                                                            @else
                                                            <button type="button" class="btn btn-primary cancelProduct" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancel order</button>
                                                    @endif
                                                         </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div>
                    <table class="table myorder-table">
                        <tbody>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">@if (!empty($countKeep))<button class="btn btn-primary" type="submit">Ship now</button>@endif</td>
                        </tbody>
                    </table>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.cancelProduct', function () {
        var _this = $(this).parents('tr');
        $('#v_id').val(_this.find('.id').text());
    });
</script>
<script>
    $(document).ready(function () {
        
        $('#table_id').DataTable({
            "order": [ 0, 'desc' ]
        });
    });

</script>
@endsection
