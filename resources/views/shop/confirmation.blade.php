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
                        <span style="  display: inline-block;
                        margin: 0 10px;"><i class="fal fa-long-arrow-right"></i></span>
                    </a>
                    <a>
                        Confirmation
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank your. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><a href="#"><span> <b>Order number</b> </span> <span>: </span>
                                {{ $invoice->invoice_code }}</a></li>
                        <li><a href="#"><span> <b>Date</b> </span> <span>: </span>
                                {{ $invoice->created_at->format('Y-m-d') }}</a></li>
                        <li><a href="#"><span> <b>Total</b> </span> <span>: </span> ${{ $invoice->total_price }}</a>
                        </li>
                        <li><a href="#"><span> <b>Payment method</b> </span> <span>: </span>
                                @if ($invoice->payment_method==1)
                                Ship COD
                                @else
                                Bank Tranfer
                                @endif
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Shipping Address</h4>
                    <ul class="list">
                        <li><a href="#"><span><b>Phone</b></span> <span>: </span> {{ $customer->phone ?? ''}}</a></li>
                        <li><a href="#"><span><b>Address</b></span> <span>: </span> {{ $customer->address ?? ''}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice_detail as $item)
                        <tr>
                            <td>
                                <p>{{ $item->product->name }}</p>
                            </td>
                            <td>
                                <h5>x {{ str_pad($item->number, 2, 0, STR_PAD_LEFT) }}</h5>
                            </td>
                            <td>
                                <p>${{ $item->total_price }}</p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{ $invoice->price }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{ $invoice->ship_fee }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Vat</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{ $invoice->vat }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Voucher</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{($invoice->voucher > 0 ) ? $invoice->voucher : 0}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{ $invoice->total_price }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
