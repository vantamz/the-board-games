@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Profile</b></h1>
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

                <div class="d-flex align-items-center mt-3 user-info active">
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
                <h4 class="mt-2">My account</h4>
                <div class="card border-0 myorder-wrapper mt-4 p-3">
                    @if (!empty($staff))
                        <form action="{{ route('profile-staff-update') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('profile-user-update') }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="col-lg-12">
                        <div class="d-flex form-label justify-content-center">
                            <img src="@php
                                if (!empty($customer->avatar)) {
                                    echo asset('Img/customer-avatar/' . $customer->avatar);
                                } elseif (!empty($staff->avatar)) {
                                    echo asset('Img/user-img/' . $staff->avatar);
                                } else {
                                    echo asset('Img/unsigned.png');
                                }
                            @endphp" alt="" class="profile_edit" id="img-preview-single">
                        </div>

                        <div class="d-flex form-label justify-content-center mt-3">
                            <label class="btn btn-light" for="uploadIMG">Upload Image</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" id="uploadIMG" hidden
                                onchange="ImgPreview()">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-2">
                            <div>Email: </div>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="email" value="{{ Auth()->user()->email }}">
                        </div>
                    </div>

                    <div class="row align-items-center mb-3">
                        <div class="col-lg-2">
                            <div>Name: </div>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{ Auth()->user()->name }}">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-2">
                            <div>Phone</div>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"
                                value="{{ !empty($customer) ? $customer->phone : $staff->phone }}" name="phone">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-2">
                            <div>Birth: </div>
                        </div>
                        <div class="col-lg-10">
                            <input type="date" class="form-control"
                                value="{{ !empty($customer) ? $customer->birth : $staff->birth }}" name="birth">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-2">
                            <div>Sex: </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input class="form-check-input" type="radio" name="gender" id="maleRadios" value="1"
                                        <?php if (!empty($customer)) {
                                            if ($customer->sex == 1) {
                                                echo 'checked';
                                            }
                                        } elseif (!empty($staff)) {
                                            if ($staff->sex == 1) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <label class="form-check-label" for="maleRadios">
                                        Male
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-check-input" type="radio" name="gender" id="femaleRadios" value="2"
                                        <?php if (!empty($customer)) {
                                            if ($customer->sex == 2) {
                                                echo 'checked';
                                            }
                                        } elseif (!empty($staff)) {
                                            if ($staff->sex == 2) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <label class="form-check-label" for="femaleRadios">
                                        Female
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-check-input" type="radio" name="gender" id="otherRadios" value="3"
                                        <?php if (!empty($customer)) {
                                            if ($customer->sex == 3) {
                                                echo 'checked';
                                            }
                                        } elseif (!empty($staff)) {
                                            if ($staff->sex == 3) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <label class="form-check-label" for="otherRadios">
                                        Other
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-2">
                            <div>Address: </div>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"
                                value="{{ !empty($customer) ? $customer->address : $staff->address }}" name="address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-lg-10"><button class="btn btn-warning save-user-info-btn">UPDATE</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        function ImgPreview() {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("img-preview-single");
            preview.src = src;
        }
    </script>
@endsection
