@inject('userNotification', 'App\Models\notification')
@inject('promotion', 'App\Models\promotion')
@inject('product', 'App\Models\product')
@inject('productKeep', 'App\Models\invoice')
@inject('customer', 'App\Models\customer')
<div class=" border-bottom header-color header-nav">
    @if (Auth::check())
    @php
    $dateNow=date("Y-m-d h:m:s");
    $customer=$customer::where('user_id',Auth::user()->id)->first();
    //dòng dưới này đã đc sửa ở Auth:user
    $productKeepInfo=$productKeep::where('customer_id', Auth::user()->id)->where('status','=',1)->where('keep_product','=',1)->get();
    $abc=0;
    foreach ($productKeepInfo as $item) {
    if ($item->created_at<$dateNow && $item->payment_method==1) {
        $invoiceExpress=$productKeep::find($item->id);
        $abc++;
        $invoiceExpress->status=0;
        $invoiceExpress->save();
        }
        }
        @endphp
        @endif
        <div class="container">
            <div class="row">
                <div class="md-12">
                    <ul>
                        <li style="float: left;line-height:50px">
                            <i class="fad fa-phone-alt"></i> Hotline: 02838505520
                        </li>
                        <li style="padding-left: 40px;padding-right: 40px;">
                            <div class="dropdown" id="keep-open">
                                <a href="{{ route('cart') }}" class=" link dropdown-toggle" id="dropdownCart" data-bs-toggle="dropdown"><i class="fal fa-bags-shopping fa-2x"></i>
                                    @if (Session::has('Cart') != null)
                                    <span class="badge badge-pill badge-danger" style="color: #000" id="quanty-show">{{ Session::get('Cart')->totalQuanty }}</span>
                                    @else
                                    <span class="badge badge-pill badge-danger" id="quanty-show">0</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu  cart" aria-labelledby="dropdownCart" role="menu">
                                    <li>
                                        <div style="padding: 15px 0px 15px 0px">
                                            <div id="change-item-cart">
                                                @if (Session::has('Cart') != null)
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
                                                                                    ${{ $item['productInfo']->price-($item['productInfo']->price*$item['productInfo']->promotionRelation->rate/100) }}
                                                                                    x {{ $item['quanty'] }}
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <b>{{ $item['productInfo']->name }}</b>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="cart-close">
                                                                                <button data-id="{{ $item['productInfo']->id }}" class="btn"><i class="fas fa-times"></i></button>
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
                                                            <span class="text-info">${{ Session::get('Cart')->totalPrice }}</span>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div style="padding: 15px 15px 15px 15px">There no product in your
                                                        Cart.
                                                        Please
                                                        choose some thing.</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout d-flex justify-content-end">
                                                    <a href="{{ route('cart') }}" class="btn btn-primary">CART</a>
                                                </div>
                                            </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li style="padding-left: 20px;margin-right: 20px;border-left: 1px solid #353940;">
                            @guest
                        <li>
                            <div class="dropdown">
                                <a href="{{ route('loginPage') }}" class="link"><i class="fas fa-sign-in-alt fa-2x"></i></a>
                                {{-- <a data-bs-toggle="modal" data-bs-target="#modalRegister" class="link"><i
                                    class="fas fa-sign-in-alt fa-2x"></i></a> --}}
                            </div>
                        </li>
                        @else
                        <li style="float: right;line-height:50px;padding-left:20px;padding-right:20px">
                            <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @hasanyrole('admin|staff')
                                <li><a class="dropdown-item" href="{{ route('admin') }}">Admin Dashboard</a>
                                </li>
                                @endhasanyrole
                                @hasrole('customer')
                                <li><a class="dropdown-item" href="{{ route('profile-user') }}"><i class="fal fa-user"></i>
                                        <span style="padding-left: 10px">Profile</span></a></li>
                                <li><a href="{{ route('invoice-shop') }}" class="dropdown-item"><i class="far fa-file-invoice"></i><span style="padding-left: 15px">Invoice</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('favorite') }}" class="dropdown-item">
                                        <i class="far fa-heart"></i>
                                        <span style="padding-left: 15px">Favorite</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('redeem-code') }}" class="dropdown-item">
                                        <i class="far fa-credit-card"></i>
                                        <span style="padding-left: 15px">Redeem code</span>
                                    </a>
                                </li>
                                @endhasrole
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"><i class="fal fa-portal-exit"></i>
                                        <span style="padding-left: 8px">{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li style="float: right;line-height:50px;padding-left:20px;padding-right:20px">
                            <div class="btn-group">
                                <a type="button" class="btn " data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-bell" style="color: #fff"></i>
                                </a>
                                @php
                                $notifications=$userNotification::where('user_id','=',Auth::user()->id)->where('status','=',1)->get();
                                $count=$userNotification::where('user_id','=',Auth::user()->id)->where('status','=',1)->count();
                                $number=0;
                                $promotionCheck=$promotion::where('status',1)->get();
                                $dateNow=date("Y-m-d");
                                $dateCount=0;
                                foreach ($promotionCheck as $item) {
                                if($item->end_date<$dateNow) { $products=$product::find($item->product_id);
                                    // $products->promotion_id=1;
                                    // $products->promotion_price=$products->price;

                                    // $products->save();
                                    // $item->status=0;
                                    // $item->save();
                                    }
                                    }
                                    @endphp
                                    <span class="badge badge-pill badge-danger">{{$count}}</span>
                                    <ul class="dropdown-menu">
                                        @foreach ($notifications as $notification)
                                        @php
                                        $number++;
                                        @endphp
                                        @endforeach
                                        @if($number>2)
                                        <div style="height:350px;overflow:auto">
                                            @else
                                            <div style="overflow:auto">
                                                @endif
                                                @foreach ($notifications as $notification)
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('notification-status/'.$notification->id) }}" onclick="notificationStatus({{ $notification->id }})">
                                                        <div class="row">
                                                            <div class="col align-self-start">
                                                                {{ $notification->content }}
                                                            </div>
                                                            <div class="col align-self-start">
                                                                {{ date('d/m/Y', strtotime($notification->created_at))}}
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr>
                                                <li>
                                                    @endforeach
                                            </div>

                                            <div class="container" style="width: 250px;">
                                                You have {{ $number }} notification
                                            </div>
                                            @if ($number!=0)
                                            <div class="d-grid gap-2">
                                                <a href="{{ url('notification-all-status') }}" class="btn btn-info btn-block" style="color: #fff">Mark all
                                                    notifications</a>
                                            </div>
                                            @endif

                                    </ul>
                            </div>
                        </li>


                        @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
<!--Nav Bar-->
<div class="container">
    <div style="margin: auto;
    text-align:center;">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('FrontEnd/img/logo-new.png') }}" class="logo" alt="">
            <span class="title_shop">The World Of Board Games</span></a>
    </div>
    <hr>
    <div>
        <nav class="navbar navbar-expand-lg nav-index navbar-light ">
            <div class="container">
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="menu-background"><a class="nav-link" href="{{ route('home') }}">Home</a>
                            </div>
                        </li>
                        <li class=" nav-item">
                            <div class="menu-background"><a class="nav-link" href="{{ url('category/0') }}">Category</a>
                            </div>
                        </li>
                        <li class=" nav-item">
                            <div class="menu-background"><a class="nav-link" href="{{ route('about-us') }}">About
                                    Us</a>
                            </div>
                        </li>
                        <li class=" nav-item">

                        </li>
                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <div style="padding-top: 15px">
                                <button class="btn search_button" onclick="searchVisible()"><i class="fal fa-search"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="search_input_box" class="visible_hidden">
        <div class="container">
            <form action="{{ route('search') }}" class="d-flex justify-content-between">
                <input type="text" class="form-control-search" id="search_input" placeholder="Search Here" name="keyword">
                <button class="btn_search" type="submit"></button>
                <span id="close_search" title="Close Search" onclick="searchHidden()"><i class="fal fa-times"></i></span>
            </form>
        </div>
    </div>
</div>

<!--//Nav Bar-->