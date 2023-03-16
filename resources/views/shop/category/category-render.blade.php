@foreach ($products as $product)
<div class="col-lg-4 col-md-6 p-b-40">
    <div class="single-product">
        <a href="{{ route('single',$product->id) }}">
            @if($product->stock==0)
            <span class="onsale">Out of stock</span>
            @elseif($product->promotionRelation->id!=1)
                                                    <span class="onsale">Sale {{ $product->promotionRelation->rate }}%
                                                        off</span>
                                                    @endif
            <div class="wrap" style="top: 0px;z-index: 200;position: relative;">
                <div class="box-img">
                    <img class="img-fluid" src="{{ asset('Img/product-img/'.$product->image) }}" alt="">
                </div>
            </div>
            <div class="product-details">
                <h6> <a href="{{ route('single',$product->id) }}">{{ $product->name }}</a></h6>
                <div class="price">
                                                            <div class="row">
                                                                @if($product->promotionRelation->id!=1)
                                                                <div class="col-lg-6">
                                                                    <h6 class="price-color">
                                                                        ${{ $product->promotion_price}}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <h6 class="l-through">${{ $product->price }}</h6>
                                                                </div>
                                                                @else
                                                                <div class="col-lg-12">
                                                                    <h6 class="price-color">
                                                                        ${{ $product->promotion_price}}
                                                                    </h6>
                                                                </div>
                                                                    @endif
                                                            </div>
                                                        </div>
                <hr>
                <div class="prd-bottom">
                    <div class="row p-b-20">
                        <div class="d-flex justify-content-center">
                            @if($product->stock!=0)
                            <div class="tooltip col-lg-6">
                                <a onclick="AddCart({{ $product->id }})" href="javascript:">
                                    <i class="fal fa-shopping-bag fa-3x addCart"></i>
                                </a><span class="tooltiptext">Add Cart</span>
                            </div>
                            @endif
                            <div class="tooltip col-lg-6">
                                <a href="#">
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
