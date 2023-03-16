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
                        <span style="  display: inline-block;
                        margin: 0 10px;"><i class="fal fa-long-arrow-right"></i></span>
                    </a>
                    <a href>
                        Checkout
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="section_gap">
    <form action="{{ route('invoice-store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        @if(Session::has("Cart")!=null)
                        <div class="cart-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="p-name">Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Session::get("Cart")->products as $item)
                                    <tr>
                                        <td class="cart-pic first-row"><img
                                                src="{{ asset('Img/product-img/'.$item['productInfo']->image) }}" alt=""
                                                width="100%"></td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $item['productInfo']->name }}</h5>
                                        </td>
                                        <td class="p-price first-row">${{ $item['productInfo']->promotion_price }}</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity" style="text-align: end">
                                                <div>
                                                    {{ $item['quanty'] }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">
                                            ${{ $item['productInfo']->promotion_price*$item['quanty'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                    @php
                    $total=Session::get('Cart')->totalPrice;
                    $tax= $total*10/100;
                    $ship=0;
                    if ($total>1000)
                    $ship=0;
                    elseif ($total>700)
                    $ship=1;
                    elseif ($total>500)
                    $ship=1.5;
                    elseif ($total>200)
                    $ship=1.75;
                    else
                    $ship=2;
                    @endphp
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6">Customer name:</div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6">Phone:</div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <input type="text" value="{{ $customer->phone ?? '' }}" name="phone"
                                                    hidden>
                                                {{ $customer->phone ?? ''}}
                                            </div>
                                        </div>
                                    </div>
                                    <a> <span class="middle"></span>
                                    </a>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6">Address:</div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <input type="text" value="{{ $customer->address ?? ''}}" name="address"
                                                    hidden>
                                                {{ $customer->address ?? ''}}</div>
                                        </div>
                                    </div>
                                    </span></a>
                                </li>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6">Tax:</div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <input type="text" value="{{ $tax }}" name="tax" hidden>
                                                ${{ $tax }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6">Ship cost:</div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <input type="text" value="{{ $ship }}" name="ship" hidden>
                                                @if ($ship!=0)
                                                ${{ $ship }}
                                                @else
                                                Free ship
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6">Total:</div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <input type="text" value="{{ Session::get('Cart')->totalPrice }}"
                                                    name="price" hidden>
                                                <input type="text"
                                                id="total"
                                                    value="{{ Session::get('Cart')->totalPrice+$tax+$ship }}"
                                                    name="total" hidden>
                                                ${{ number_format(Session::get('Cart')->totalPrice+$tax+$ship) }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-6"><div id="voucherTittle"></div></div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                    <div id="voucherTotal"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <p></p>
                            <div>
                                <input type="checkbox" id="keepProduct" name="keep" value="1" onclick="checkType()">
                                <label for="keepProduct">keep product</label>

                            </div>
                            <br>
                            <div id="paymentMethod">
                                <div>
                                    <h5><b>Payment method</b></h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="payment_item">
                                            <div class="radion_btn" style="display: inline-block;text-align: center;">
                                                <label for="optionCod" style="display:block;padding-bottom:15px"><img src="{{ asset('FrontEnd/img/COD.jpg') }}" alt="" width="100%"></label>
                                                <input type="radio" id="optionCod" name="paymentMethod" checked
                                                    value="1">
                                                    <div class="check"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ghi chú --}}
                                   {{-- <div class="col-lg-4">
                                    <div class="payment_item">
                                    <div class="radion_btn" style="display: inline-block;text-align: center;">
                                      <label for="optionBank" style="display:block;padding-bottom:15px"><img src="{{ asset('FrontEnd/img/Bank.png') }}" alt="" width="100%"></label>
                                    <input type="radio" id="optionBank" name="paymentMethod" value="2">
                                   <div class="check"></div>
                                   </div>
                                    </div>
                                   </div> --}}
                                   {{-- edn ghi chú --}}
                                    <div class="col-lg-6">
                                        <div class="payment_item">
                                            <div class="radion_btn" style="display: inline-block;text-align: center;">
                                                <label for="optionVnpay" style="display:block;padding-bottom:15px"><img src="{{ asset('FrontEnd/img/vnpay.png') }}" alt="" width="100%"></label>
                                                <input type="radio" id="optionVnpay" name="paymentMethod" value="3">
                                                
                                                <div class="check"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="keepProductRule" class="hide mb-3">
                                <div style="color: red;">
                                    Note: Your product only keep for 24 hour if you choose COD. Please pay attention to the time.
                                </div>
                            </div>
                            <br>
                            <div id="RedeemCodeId">
                                <div>
                                    <h5><b>Redeem code</b></h5>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="payment_item">
                                            <div>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Choose redeem code
                                                  </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <p id="gift_code"></p>
                                    <input type="hidden" id="scanCode" name="scancode">
                                    <input type="hidden" id="voucherId" name="voucherId">
                                </div>

                                <div>
                                    <div class="payment_item">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                            County,
                                            Store Postcode.</p>
                                    </div>
                                </div>
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector">
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <button class="primary-btn btn" style="width: 100%">Proceed to order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voucher</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('shop.redeemCode')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
      </div>
    </div>
  </div>

<script>
    function checkType() {
        if (document.getElementById('keepProduct').checked) {
            // document.getElementById("paymentMethod").setAttribute("class", "hide");
            document.getElementById("keepProductRule").removeAttribute("class", "hide");
        } else {
            // document.getElementById("paymentMethod").removeAttribute("class", "hide");
            document.getElementById("keepProductRule").setAttribute("class", "hide");
        }
    }

</script>
<script>
    $(".add_voucher").click(function() {
        var value_code = $(this).val();
        
        var id_code = event.srcElement.id;
        var str = $("#total").val();
        var endMoney=str-value_code;
        // var totalMoney= document.getElementById('total').text();
        document.getElementById('voucherTittle').innerHTML='Total after Voucher'
        document.getElementById('gift_code').innerHTML = 'You selected voucher' +' ' +value_code + '$';
        document.getElementById('voucherTotal').innerHTML = '$' +endMoney;
        
        $('#exampleModal').modal('hide');
        document.getElementById("scanCode").setAttribute('value', value_code);
        document.getElementById("voucherId").setAttribute('value', id_code);
        
    });

</script>
@endsection
