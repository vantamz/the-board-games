@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Redeem Code</b></h1>
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

                <div class="d-flex align-items-center order-info">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <p class="mb-0">
                        <a href="{{ route('invoice-shop') }}">My order</a>
                    </p>
                </div>
                <div class="d-flex align-items-center order-info">
                    <i class="fas fa-box-alt"></i>
                    <p class="mb-0">
                        <a href="{{ url('invoice-keep-order') }}">Order keep
                            @if (!empty($countKeep))
                            <span class="badge" style="background: red">{{ $countKeep }}</span>
                            @endif
                        </a>
                    </p>
                </div>
                <div class="d-flex align-items-center order-info active">
                    <i class="far fa-credit-card"></i>
                    <p class="mb-0">
                        <a href="{{ url('redeem-code') }}">Redeem code</a>
                    </p>
                </div>
            </div>
            <div class="col-9 mb-5">
                <h2 class="mt-2">Voucher list</h2>
                <div class="card border-0 myorder-wrapper mt-4 p-3">
                    <div id="redeemList">
                        @include('shop.voucher.redeem-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addVoucher(id) {
        $.ajax({
            url: 'redeem-code-exchange/' + id,
            type: 'GET',
        }).done(function (response) {
            RenderList(response);
            //console.log(response);
            alertify.success('Exchange successful');
        });
    }

    function RenderList(response) {
    $("#redeemList").empty();
    $("#redeemList").html(response);
}
</script>
@endsection
