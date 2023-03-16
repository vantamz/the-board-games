@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Shopping cart</b></h1>
                <nav class="d-flex align-items-center color-w">
                    <a href>
                        Home
                        <span style="  display: inline-block;
                        margin: 0 10px;"><i class="fal fa-long-arrow-right"></i></span>
                    </a>
                    <a href>
                        Cart
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
@include('shop.ListCart')

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
                        @foreach ($randomProduct as $related)
                        <div class="owl-item">
                            <div class="single-product">
                                <a href="{{ route('single',$related->id) }}">
                                    @if($related->stock==0)
                                    <span class="onsale">Out of stock</span>
                                    @elseif($related->promotionRelation->id!=1)
                                    <span class="onsale">Sale {{ $related->promotionRelation->rate }}% off</span>
                                    @endif
                                    <div class="wrap" style="top: 0px;z-index: 200;position: relative;">
                                        <div class="box-img">
                                            <img class="img-fluid" src="{{ asset('Img/product-img/'.$related->image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h6> <a href="{{ route('single',$related->id) }}">{{ $related->name }}</a></h6>
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
                        <div class="owl-prev-related"><img src="{{ asset('FrontEnd/img/prev-black.png') }}" alt=""
                                class="img-fluid"></div>
                    </div>
                    <div class="btn-right-related">
                        <div class="owl-next-related"><img src="{{ asset('FrontEnd/img/next-black.png') }}" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" style="padding-bottom: 35px">
                <div class="section-title">
                    <h1>Best deals for you</h1>
                    <p>All the products below all sale form 40-50%, get it before too late.</p>
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
                                            @if($deal->stock==0)
                                            <span class="onsale">Out of stock</span>
                                            @else
                                            <span class="onsale">Sale {{ $deal->promotionRelation->rate }}% off</span>
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
                    <a target="_blank">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('FrontEnd/img/deal.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>




<script src="{{ asset('FrontEnd/js/cart-deal.js') }}"></script>
<script>
    function DeleteItem(id){
        $.ajax({
            url: 'remove-Listitem-cart/'+id,
            type: 'GET',
        }).done(function(response){
            RenderListCart(response)
            alertify.success('Product deleted successful');
        });
    }


    function UpdateItem(id){
        setTimeout(function(){ 
        var quanty = $("#quanty-item"+id).val();
        $.ajax({
            url: 'update-Listitem-cart/'+id+'/'+quanty,
            type: 'GET',
        }).done(function(response){
            RenderListCart(response)
           // alertify.success('Product updated successful');
        });
        }, 50);
    }
    function RenderListCart(response){
        $("#listCart").empty();
        $("#listCart").html(response);
        $("#quanty-show").text($("#quanty-cart").val());
    }
    var userMain=document.getElementById("dropdownCart");
    if(window.location.href.indexOf("cart")>-1){
        userMain.className="visible_hidden"
    }
</script>
@endsection
