@if(Session::has("Cart")!=null)
@php
                                            $cartCount=0;
                                            @endphp
                                            @foreach (Session::get("Cart")->products as $item)
                                            @php
                                            $cartCount++;
                                            @endphp
                                            @endforeach
                                            @if($cartCount>3)
                                            <div style="height:550px;overflow:auto">
                                                @else
                                                <div style="overflow:auto">
                                                @endif
<div style="padding-top: 15px;padding-bototm:15px">
    <table class="table">
        <tbody>
            @foreach (Session::get("Cart")->products as $item)
            <tr style="border-bottom: 1px solid #fff!important">
                <td>
                    <div class="cart-detail-img">
                        <img src="{{ asset('Img/product-img/'.$item['productInfo']->image) }}">
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-lg-12 text-info">
                            ${{ $item['productInfo']->price-($item['productInfo']->price*$item['productInfo']->promotionRelation->rate/100) }} x {{ $item['quanty'] }}
                        </div>
                        <div class="col-lg-12"><b>{{ $item['productInfo']->name }}</b></div>
                    </div>
                </td>
                <td>
                    <div class="cart-close">
                        <button data-id="{{ $item['productInfo']->id }}" class="btn"><i
                                class="fas fa-times"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<div class="total-section text-center checkout row">
    <div class="col-lg-6">
        Total:
    </div>
    <div class="col-lg-6">
        <span class="text-info">${{ number_format(Session::get('Cart')->totalPrice) }}</span>
        <input type="number" value="{{ Session::get('Cart')->totalQuanty }}" id="quanty-cart" hidden>
    </div>
    <p>

    </p>
</div>
@else
<div style="padding: 15px 15px 15px 15px">There no product in your Cart. Please choose some thing.</div>
<input type="number" value="0" id="quanty-cart" hidden>
@endif

