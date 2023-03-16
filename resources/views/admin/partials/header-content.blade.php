<input type="checkbox" id="check">
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left-area">
        <h3>Admin <span class="neon">Manager</span></h3>
    </div>
    <div class="right-area">
        @guest
        @else
        <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endguest

    </div>
</header>
<!--navigator mobile start-->
<div class="mobile_nav">
    <div class="nav_bar">
        <img src="{{ asset('Img/unsigned.png') }}" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a href="{{ route('admin') }}"><i class="fal fa-desktop"></i><span>Home</span></a>
        <a href="{{ route('user') }}"><i class="fal fa-user"></i><span>User</span></a>
        <a href="#"><i class="far fa-chess-board"></i><span>Product</span></a>
        <a href="#"><i class="far fa-cogs"></i><span>Setting</span></a>
        <a href="#"><i class="fal fa-user-tag"></i><span>Role</span></a>
        <a href="{{ route('home') }}"><i class="fal fa-store"></i><span>Store</span></a>
    </div>
</div>
<!--navigatpr mobile end-->
<div class="sidebar" id="sideBar">
    <div class="profile_info" style="padding-top: 30px">
        @guest
        <img src="{{ asset('Img/unsigned.png') }}" alt="" class="cen profile_image">
        <h4>Admin</h4>
        @else
        <img src="{{asset('Img/user-img/'.Auth::user()->staffRelation->avatar)}}" alt="" class="cen profile_image">
        <h4>{{ Auth::user()->name }}</h4>
        @endguest
    </div>
    <a href="{{ route('admin') }}" class=" dot"><i class="fal fa-desktop"></i><span>Dashboard</span></a>
    <a data-bs-toggle="collapse" href="#collapseUser" class="dot"><i class="fal fa-user"></i><span>Account</span></a>
    <div class="collapse" id="collapseUser">
        <div style="padding: 20px 20px 20px 20px">
            <a href="{{ route('user') }}" class="dot test" id="user"><i class="fal fa-user"></i><span>User</span></a>
            <a href="{{ route('role') }}" class="dot" id="role"><i class="fal fa-key"></i><span>Role</span></a>
            <a href="{{ route('permission') }}" class="dot" id="permission"><i class="fal fa-user-tag"></i><span>User Role</span></a>
            <a href="{{ route('staff-index') }}" class="dot test" id="staff"><i class="fal fa-user"></i><span>Staff</span></a>
            <a href="{{ route('customer-index') }}" class="dot" id="role"><i class="fal fa-key"></i><span>Customer</span></a>
        </div>
    </div>
    <a href="{{ route('supplier.index') }}" class="dot"><i class="fal fa-truck-loading"></i><span>Supplier</span></a>
    <a data-bs-toggle="collapse" href="#collapseProduct" class="dot"><i
            class="far fa-chess-board"></i><span>product</span></a>
    <div class="collapse" id="collapseProduct">
        <div style="padding: 20px 20px 20px 20px">
            <a href="{{ route('productType-index') }}" class="dot test"><i class="fal fa-box-ballot"></i><span>Product
                    Type</span></a>
            <a href="{{ route('product.index') }}" class="dot"><i class="fal fa-box-open"></i><span>Product</span></a>
            <a href="{{ route('product-img') }}" class="dot"><i class="fal fa-images"></i><span>Product Image</span></a>
            <a href="{{ route('promotion-index') }}" class="dot"><i class="fal fa-percent"></i><span>Promotion</span></a>
        </div>
    </div>
    <a href="{{ route('invoice') }}" class="dot"><i class="fas fa-file-invoice"></i><span>Invoice</span></a>
    <a href="{{ route('home') }}" class="dot"><i class="fal fa-store"></i><span>Store</span></a>
    <a href="#" hidden>a</a>
</div>
