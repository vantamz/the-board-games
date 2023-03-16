@extends('shop.layout')
@section('content')
    <section class="banner-category">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
                <div>
                    <h1 class="color-w"><b>Favorite list</b></h1>
                    <nav class="d-flex align-items-center color-w">
                        <a href>
                            Home
                            <span style="display: inline-block; margin: 0 10px;">
                                <i class="fal fa-long-arrow-right"></i>
                            </span>
                        </a>
                        <a href>
                            Favorite
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container" style="padding-bottom: 30px">
        <div class="row">
            <div class="col-12">
                <section style="padding-top: 10px">
                    <div class="row align-items-center justify-content-center" id="productCategory">
                        @foreach ($favorite as $item)
                            <div class="col-lg-3 col-md-6 p-b-40">
                                <div class="single-product">
                                    <a href="{{ route('single', $item->product->id) }}">
                                        <span class="onsale">Sale {{ $item->product->promotionRelation->rate }}%
                                            off</span>
                                        <div class="wrap" style="top: 0px;z-index: 200;position: relative;">
                                            <div class="box-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('Img/product-img/' . $item->product->image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <h6> <a
                                                    href="{{ route('single', $item->product->id) }}">{{ $item->product->name }}</a>
                                            </h6>
                                            <div class="price">
                                                @if ($item->product->id_promotion != 0)
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h6 class="price-color">
                                                                <span class="price_icon">$</span>
                                                                {{ $item->product->promotion_price }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h6 class="l-through">
                                                                <span class="price_icon">$</span>
                                                                {{ $item->product->price }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                @else
                                                    <h6>${{ $item->product->price }}</h6>
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="prd-bottom">
                                                <div class="row p-b-20">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="tooltip col-lg-6">
                                                            <a onclick="AddCart({{ $item->product->id }})"
                                                                href="javascript:">
                                                                <i class="fal fa-shopping-bag fa-3x addCart"></i>
                                                            </a><span class="tooltiptext">Add Cart</span>
                                                        </div>
                                                        <div class="tooltip col-lg-6">
                                                            <a href="#">
                                                                @if (auth()->check())
                                                                    @php
                                                                        $check = auth()
                                                                            ->user()
                                                                            ->favorites()
                                                                            ->where('product_id', $item->product->id)
                                                                            ->first();
                                                                    @endphp
                                                                    @if ($check)
                                                                        <i class="fas fa-heart-circle fa-3x addFav removefav active"
                                                                            data-target="{{ $item->product->id }}"></i>
                                                                    @else
                                                                        <i class="fas fa-heart-circle fa-3x addFav addtofav"
                                                                            data-target="{{ $item->product->id }}"></i>
                                                                    @endif
                                                                @else
                                                                    <i class="fas fa-heart-circle fa-3x addFav addtofav"
                                                                        data-target="{{ $item->product->id }}"></i>
                                                                @endif
                                                            </a><span class="tooltiptext">Favortire</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('FrontEnd/js/category-js.js') }}"></script>
@endsection
