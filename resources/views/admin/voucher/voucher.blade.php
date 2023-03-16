@extends('shop.layout')
@section('content')
@inject('userVoucher', 'App\Models\userVoucher')
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
                    </p>
                </div>

                <div class="d-flex align-items-center mt-3 user-info">
                    <i class="fas fa-user"></i>
                    <p class="mb-0">
                        <a href="{{ route('profile-user') }}">My account</a>
                    </p>
                </div>

                <div class="d-flex align-items-center order-info active">
                    <i class="far fa-credit-card"></i>
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
            </div>
            <div class="col-9 mb-5">
                <h2 class="mt-2">Voucher list</h2>
                <div class="card border-0 myorder-wrapper mt-4 p-3">
                    <div class="row">
                        @foreach ($vouchers as $item)
                        <div class="col-lg-3">
                            <div class="item-game-wrapper">
                                <div class="item-info">
                                    <div class="item-title">
                                        {{ $item->name }}
                                    </div>
                                    <div class="item-price">
                                        {{ $item->price }} $
                                    </div>
                                    <div class="item-btn-a">
                                        <a href=""><i class="fal fa-shopping-cart"></i></a>
                                    </div>
                                    {{-- <div class="item-btn" style="margin-top: 10px">
                                        Exchange now
                                    </div> --}}
                                    @php
                                     $voucherUser= $userVoucher::where('voucher_id','=',$item->id)->where('user_id','=',Auth::user()->id)->select('voucher_id')->first()
                                    @endphp


                                    @if (!empty($voucherUser))
                                    <a class="item-btn-disable" style="margin-top: 10px">
                                        Owned
                                    </a>
                                    @else
                                    <a class="item-btn" style="margin-top: 10px" href="{{ url('redeem-code-exchange/'.$item->id) }}">
                                        Exchange now
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('FrontEnd/js/category-js.js') }}"></script>
@endsection
