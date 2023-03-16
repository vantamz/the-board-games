@if(Session::has("Cart")!=null)
@inject('product', 'App\Models\product')
<section class="shopping-cart spad" id="listCart">
    <div class="container">
        <div class="row">
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th class="p-name">Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Session::get("Cart")->products as $item)
                        @php
                            $productInfo=$product::find($item['productInfo']->id);
                        @endphp
                        <tr>
                            <td class="cart-pic first-row"><img src="{{ asset('Img/product-img/'.$item['productInfo']->image) }}" alt="" width="70%"></td>
                            <td class="cart-title first-row">
                                <h4>{{ $item['productInfo']->name }}</h4>
                                <br>
                                Stocking: @if($productInfo->stock<$item['quanty'])
                                <span style="color:red">{{$productInfo->stock}}</span>
                                @else
                                {{$productInfo->stock}}
                                @endif
                            </td>
                            <td class="p-price first-row" style="font-size:25px">${{ $item['productInfo']->promotion_price }}</td>
                            <td class="qua-col first-row">
                                <div class="quantity">
                                    <div class="input-group inline-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary btn-minus" onclick="UpdateItem({{ $item['productInfo']->id }})" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input class="form-control" min="1" name="quantity"
                                            id="quanty-item{{ $item['productInfo']->id }}" value="{{ $item['quanty'] }}"
                                            type="number">
                                             @if($productInfo->stock >$item['quanty'])
                                        <div class="input-group-append">
                                            <button  class="btn btn-outline-secondary btn-plus" onclick="UpdateItem({{ $item['productInfo']->id }})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        @else
                                        <div class="input-group-append">
                                            <button disabled  class="btn btn-outline-secondary btn-plus" >
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                @if($productInfo->stock ==$item['quanty'])
                                The product has reached the maximum quantity
                                @endif
                            </td>
                            <td class="total-price first-row" style="font-size:25px">${{ ($item['productInfo']->price-($item['productInfo']->price*$item['productInfo']->promotionRelation->rate/100))*$item['quanty'] }}</td>
                            <td class="close-td first-row"><a class="btn"
                                    onclick="UpdateItem({{ $item['productInfo']->id }})"><i class="fal fa-save"></i></a>
                            </td>
                            <td class="close-td first-row"><a class="btn"
                                    onclick="DeleteItem({{ $item['productInfo']->id }})"><i
                                        class="fas fa-times"></i></a>
                                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="cart-buttons">
                        <a href="{{ route('home') }}" class="cart-btn continue-shop">Continue shopping</a>
                        <a href="{{ route('clear-cart') }}" class="cart-btn up-cart">clear all</a>
                    </div>

                </div>

                <div class="col-lg-4 offset-lg-4">
                    <div class="proceed-checkout">
                        <ul>
                            <li class="subtotal">
                                <div class="row">
                                    <div class="col-lg-6">Quantity</div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <span>{{ Session::get('Cart')->totalQuanty }}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-total">
                                <div class="row">
                                    <div class="col-lg-6">Total</div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <span>${{ number_format(Session::get('Cart')->totalPrice) }}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="proceed-btn Ripple-effect">PROCEED TO CHECK OUT</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@else
<div class="container">
    <div class="text-center empty_bag">
        <img src="{{ asset('Img/empty-bag.png') }}" alt="">
        <div class="notice mb-3">
        <b>your shopping cart is empty</b>
        </div>
        <a href="{{ route('home') }}" class="primary-btn">buy now</a>
    </div>
</div>
@endif

<script>
    $('.btn-plus, .btn-minus').on('click', function (e) {
        const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
        const input = $(e.target).closest('.input-group').find('input');
        if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
        }
    })


</script>
