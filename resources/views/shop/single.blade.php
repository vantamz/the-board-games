@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Product detail</b></h1>
            </div>
        </div>
    </div>
</section>
<div class="container" style="padding-top: 20px;padding-bottom:50px">
    <div class="row">
        <div class="col-lg-4 col-mb-12">
            <div class="product-img-box">
                <div class="product-image">
                    <div class="wrap" style="top: 0px;z-index: 200;position: relative;overflow:hidden">
                        <div style="position: relative;
                        display: table-cell;
                        vertical-align: middle;
                        text-align: center;
                        width: 400px;
                        height: 400px;" class="box-img">
                            <div class="owl-single owl-carousel owl-theme owl-loaded">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage">
                                        @foreach ($product_images as $product_image)
                                        <div class="owl-item"><img class="lazyOwl"
                                                src="{{ asset('Img/product-img/'.$product_image->image) }}" alt=""
                                                width="100%" height="350"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-lg-8 col-mb-12" style="color: #000;padding-left:50px">
            <div class="product_text">
                <h3>
                    {{ $product->name }}
                </h3>
                    @if($product->promotionRelation->id!=1)
                                                                <div class="col-lg-6">
                                                                    <h2 class="price-color">
                                                                        ${{ $product->promotion_price}}
                                                                    </h2>
                                                                </div>
                                                                <div class="col-lg-6 single-product-price">
                                                                    <h6 class="l-through">${{ $product->price }}</h6>
                                                                </div>
                                                                @else
                                                                <div class="col-lg-12">
                                                                    <h2 class="price-color">
                                                                        ${{ $product->promotion_price}}
                                                                    </h2>
                                                                </div>
                                                                    @endif
                
                <ul class="list">
                    <li>
                        @if ( $product->stock >0)
                        <a href="#">
                            <span class="active">Availibilti</span>: {{ $product->stock }}
                        </a>
                        @else
                        <a href="#">
                            <span class="active">Availibilti</span>: Out of order
                        </a>
                        @endif

                    </li>
                </ul>
                <p>
                    {{ isset($product) && $product->description!=null ? $product->description : '' }}
                </p>
                {{-- <div class="product_count">
                    <label for="qty">Quantity</label>
                    <input type="number" value="1" min="1">
                </div> --}}
                <div style="bottom: 100px!important;">
                    @if($product->stock!=0)
                    <a onclick="AddCart({{ $product->id }})" href="javascript:" class="product-primary-btn">
                        ADD TO CART
                    </a>
                    @endif
                    <a href="#" class="icon_btn">
                        @if (auth()->check())
                            @php
                                $check = auth()->user()->favorites()->where('product_id', $product->id)->first();
                            @endphp
                            @if ($check)
                                <i class="fas fa-heart-circle fa-3x addFav removefav active" data-target="{{ $product->id }}"></i>
                            @else
                                <i class="fas fa-heart-circle fa-3x addFav addtofav" data-target="{{ $product->id }}"></i>
                            @endif
                        @else
                            <i class="fas fa-heart-circle fa-3x addFav addtofav" data-target="{{ $product->id }}"></i>
                        @endif
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@if ($turtorial)
<section>
    <div class="container">
        <div style="margin-top:10px">
            <div  class="singleDescription">Product Description
            </div>
            <div class="singleUnderline">
        </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="single-detail">
                    {!! $turtorial->content ?? ''!!}
                </div>

            </div>
        </div>
    </div>
</section>
@endif

<section class="product_description">
    <div class="container">
        <div style="margin-top:10px">
            <div  class="singleDescription">Product Detail
            </div>
            <div class="singleUnderline">
        </div>
        <br>
        <ul class="nav nav-tabs nav-pills nav-background justify-content-center pointer" id=" nav-tab" role="tablist">
            <li class="nav-items">
                <a class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#specification"
                    role="tab" aria-controls="nav-profile" aria-selected="false">specification</a>
            </li>
            <li class="nav-items">
                <a class="nav-link" id="nav-co-tab" data-bs-toggle="tab" data-bs-target="#comment" role="tab"
                    aria-controls="nav-review" aria-selected="false">Review</a>
            </li>
        </ul>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="specification" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table_product">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Size</h5>
                                </td>
                                <td>
                                    <h5>{{ isset($product) && $product->size!=null ? $product->size : '' }}
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Origin</h5>
                                </td>
                                <td>
                                    <h5>{{ isset($product) && $product->origin!=null ? $product->origin : '' }}
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>{{ isset($product) && $product->weight!=null ? $product->weight : '' }}
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Age range</h5>
                                </td>
                                <td>
                                    <h5>>{{ isset($product) && $product->age!=null ? $product->age : '' }}
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>>Category</h5></td> <td>
                                        <h5>Child</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="comment" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6">
                        @include('shop.comment.comment')
                    </div>
                    <div class="col-lg-6">
                        <div class="review-box">
                            @if (Auth::check()&&$is_buy==true)
                            <h4>Add a review and comment</h4>
                            <p>
                                <div id="rateYo"></div>
                                <br>
                                <span id="result" name="rating"></span>
                            </p>
                            <input type="text" name="id_product" value="{{ $product->id }}" hidden>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="comment" id="message"
                                        placeholder="Review"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <a id="addComment" href="javascript:" data-id="{{ $product->id }}" class="btn btn-primary">Submit</a>
                                    {{-- <button type="submit" class="product-primary-btn">Submit Now</button> --}}
                            </div>
                            <div id="rateYo"></div>
                            @elseif(Auth::check()&&$is_buy==false)
                            <div class="text-center">
                                Please buy this product to leave comment.
                            </div>
                            @else
                            <div class="text-center">
                                <a href="{{ route('loginPage') }}">Please login to leave comment.</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Related-->
<section style="padding-bottom: 30px">
    <div class="container product-more">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" style="padding-bottom: 35px">
                <div class="section-title">
                    <h1>Related Product</h1>
                </div>
            </div>
        </div>
        <div>
            <div class="owl-product-more owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach ($relateds as $related)
                        <div class="owl-item">
                            <div class="single-product">
                                <a href="{{ route('single',$related->id) }}">
                                    @if($related->stock==0)
                                    <span class="onsale">Out of stock</span>
                                    @elseif($related->promotionRelation->id!=1)
                                                    <span class="onsale">Sale {{ $related->promotionRelation->rate }}%
                                                        off</span>
                                                    @endif
                                    <div class="wrap" style="top: 0px;z-index: 200;position: relative;">
                                        <div class="box-img">
                                            <img class="img-fluid" src="{{ asset('Img/product-img/'.$related->image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h6 class="mb-3"> <a href="{{ route('single',$related->id) }}">{{ $related->name }}</a></h6>
                                        <div class="price">
                                            <div class="row">
                                                @if($related->promotionRelation->id!=1)
                                                                <div class="col-lg-6">
                                                                    <h6 class="price-color">
                                                                        ${{ $related->promotion_price}}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <h6 class="l-through">${{ $related->price }}</h6>
                                                                </div>
                                                                @else
                                                                <div class="col-lg-12">
                                                                    <h6 class="price-color">
                                                                        ${{ $related->promotion_price}}
                                                                    </h6>
                                                                </div>
                                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-nav ">
                    <div class="btn-left-related">
                        <div class="owl-prev-related" style="margin:25px"><img src="{{ asset('FrontEnd/img/prev-black.png') }}" alt=""
                                class="img-fluid"></div>
                    </div>
                    <div class="btn-right-related">
                        <div class="owl-next-related" style="margin:25px"><img src="{{ asset('FrontEnd/img/next-black.png') }}" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--Related-->

<!--Deal start-->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" style="padding-bottom: 35px">
                <div class="section-title">
                    <h1>Deals of the Week</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div>
                    <div class="owl-product-deal owl-carousel owl-theme owl-loaded ">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($deals as $deal)
                                @if ($deal->promotionRelation->rate>35)
                                <div class="owl-item">
                                    <div class="single-product">
                                        <a href="{{ route('single',$deal->id) }}">
                                            @if($deal->stock!=0)
                                            <span class="onsale">Sale {{ $deal->promotionRelation->rate }}% off</span>
                                            @else
                                            <span class="onsale">Out of stock</span>
                                            @endif
                                            <div class="wrap" style="top: 0px;z-index: 200;position: relative;">
                                                <div class="box-img">
                                                    <img class="img-fluid"
                                                        src="{{ asset('Img/product-img/'.$deal->image) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="product-details">
                                                <h6> <a href="{{ route('single',$deal->id) }}">{{ $deal->name }}</a>
                                                </h6>
                                                <div class="price">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h6 class="price-color"> <span
                                                                    class="price_icon">$</span>{{ $deal->promotion_price}}
                                                            </h6>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h6 class="l-through"><span
                                                                    class="price_icon">$</span>{{ $deal->price }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav">
                            <div class="btn-left-deal">
                                <div class="owl-prev-deal"><img src="{{ asset('FrontEnd/img/prev-deal.png') }}" alt=""
                                        class="img-fluid-deal"></div>
                            </div>
                            <div class="btn-right-deal">
                                <div class="owl-next-deal"><img src="{{ asset('FrontEnd/img/next-deal.png') }}" alt=""
                                        class="img-fluid-deal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('FrontEnd/img/deal.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Deal end-->
<!--Deal end-->


<!--js product more-->
<script src="{{ asset('FrontEnd/js/single_slider.js') }}"></script>
<script src="{{ asset('FrontEnd/js/deal.js') }}"></script>
<!--js product more-->

@endsection
