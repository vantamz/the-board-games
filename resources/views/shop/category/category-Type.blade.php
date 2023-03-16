@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Shop Category page</b></h1>
                <nav class="d-flex align-items-center color-w">
                    <a href>
                        Home
                        <span style="    display: inline-block;
                        margin: 0 10px;"><i class="fal fa-long-arrow-right"></i></span>
                    </a>
                    <a href>
                        Shop
                        <span style="    display: inline-block;
                        margin: 0 10px;"><i class="fal fa-long-arrow-right"></i></span>
                    </a>
                    <a href>
                        Category
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container" style="padding-bottom: 30px">
    <div class="row">
        <div class="col-lg-3">
            <div class="affix" id="navBar">
                <div class="side_Bar_Categories">
                    <div class="head">
                        Browser Category
                    </div>
                </div>
                <ul class="main-categories">
                    <li class="main-nav-list" style="padding:20px;20px;20px;20px">
                        <h4>PRICE</h4>
                        <ul class="list-group list-group-category">
                            <li class="list-group-item">
                                <button class="btn btn-outline-secondary" id="Price1">0$ - 200$</button>
                            </li>
                            <li class="list-group-item">
                                <button class="btn btn-outline-secondary" id="Price2">200$ - 400$</button>
                            </li>
                            <li class="list-group-item">
                                <button class="btn btn-outline-secondary" id="Price3">400$ - 1000$</button>
                            </li>
                            <li class="list-group-item">
                                <button class="btn btn-outline-secondary" id="Price4">1000$ - 1500$</button>
                            </li>
                            <li class="list-group-item">
                                <button class="btn btn-outline-secondary" id="Price5">1500$ - 2000$</button>
                            </li>
                        </ul>
                    </li>
                    <li class="main-nav-list" style="padding:20px;20px;20px;20px">
                        <div id="slider"></div>
                        <br>
                        <div id="abc" hidden></div>
                        <div class="row">
                            <div class="col-lg-6"><button id="priceSubmit" class="primary-btn btn">Filter</button></div>
                            <div class="col-lg-6">$<span id="slider-range-value"></span></div>
                        </div>
                    </li>
                    <hr>
                    <li class="main-nav-list" style="padding:20px;20px;20px;20px">
                        <h4>Product Type</h4>
                        <ul class="list-group list-group-category">
                            @foreach ($productTypes as $productType)
                            <li class="list-group-item list-group-item-link">
                                <a href="{{ url('category-type'.'/'.$productType->id.'/'.'0') }}">
                                    {{-- <a href="{{ url('category-type'.'/'.$productType->id.'/'.'0') }}"> --}}
                                    <span class="lnr lnr-arrow-right"></span>{{ $productType->product_type_name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <div style="padding: 0 20px 10px 20px;" class="d-flex flex-wrap align-items-center main_color">
                <div class="sorting">
                    <select name="" class="form-select" id="sortCategory">
                        <option value="{{ url('category-type'.'/'.$id.'/'.'0') }}" @php if(strpos($_SERVER['REQUEST_URI'], "category-type/1/0" ))
                            { {echo 'selected' ;} } @endphp>Newest</option>
                        <option value="{{ url('category-type'.'/'.$id.'/'.'1') }}" @php if(strpos($_SERVER['REQUEST_URI'], "category-type/1/1" ))
                            { {echo 'selected' ;} } @endphp>Price: low to high</option>
                        <option value="{{ url('category-type'.'/'.$id.'/'.'2') }}" @php if(strpos($_SERVER['REQUEST_URI'], "category-type/1/2" ))
                            { {echo 'selected' ;} } @endphp>Price: high to low</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                </div>
                {!! $products->render() !!}
            </div>
            <section>
                <div class="row" id="productCategory">
                    @include('shop.category.category-render')

                </div>
            </section>
            <div style="background-color: #828bb3;padding: 0 20px 10px 20px;"
                class="d-flex flex-wrap align-items-center">
                <div class="sorting mr-auto">
                    <select name="" class="form-select">
                        <option value="">Show 3</option>
                        <option value="">Show 6</option>
                        <option value="">Show 9</option>
                        <option value="">Show 12</option>
                    </select>
                </div>
                {!! $products->render() !!}
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('FrontEnd/js/category-js.js') }}"></script>

@endsection
