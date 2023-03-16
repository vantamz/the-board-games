<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span
                id="logo"></span>
            <!--<img id="logo" src="" alt="Logo"/>-->
        </a> </div>
    <div class="menu">
        <ul id="menu">
            <li id="menu-home"><a href="{{ route('admin') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li><a href="#"><i class="fad fa-user-cog"></i><span>Account</span><span class="fa fa-angle-right"
                        style="float: right"></span></a>
                <ul>
                    <li><a href="{{ route('user') }}" id="user"><i class="fal fa-user"></i><span> User</span></a></li>
                    <li><a href="{{ route('role') }}" id="role"><i class="fal fa-key"></i><span> Role</span></a></li>
                    <li><a href="{{ route('permission') }}" class="dot" id="permission"><i
                                class="fal fa-user-tag"></i><span> User Role</span></a></li>
                    <li><a href="{{ route('staff-index') }}" class="dot test" id="staff"><i
                                class="fal fa-user"></i><span> Staff</span></a></li>
                    <li><a href="{{ route('customer-index') }}" class="dot" id="role"><i class="fal fa-key"></i><span>
                                Customer</span></a></li>
                                <li><a href="{{ url('admin/user-ban-list') }}" class="dot" id="role"><i class="fal fa-user-slash"></i><span>
                                    Ban List</span></a></li>
                </ul>
            </li>
            <li id="menu-home"><a href="{{ url('admin/supplier') }}"><i
                        class="fal fa-truck-loading"></i><span>Supplier</span></a></li>
            <li><a href="#"><i class="fad fa-hand-holding-box"></i><span>product</span><span class="fa fa-angle-right"
                        style="float: right"></span></a>
                <ul>
                    <li><a href="{{ route('productType-index') }}" class="dot test"><i class="fal fa-box-ballot"></i><span>Product
                        Type</span></a></li>
                    <li><a href="{{ url('admin/product') }}" class="dot"><i class="fal fa-box-open"></i><span>Product</span></a></li>
                    <li><a href="{{ route('product-img') }}" class="dot"><i class="fal fa-images"></i><span>Product Image</span></a></li>
                    <li><a href="{{ route('turtorial') }}" class="dot"><i class="fad fa-info-circle"></i><span>Product description</span></a></li>
                    <li><a href="{{ route('promotion-index') }}" class="dot"><i class="fal fa-percent"></i><span>Promotion</span></a></li>
                    <li><a href="{{ url('admin/voucher') }}" class="dot"><i class="fas fa-donate"></i><span>Voucher</span></a></li>
                </ul>
            </li>
            <li id="menu-home"><a href="{{ route('invoice') }}" class="dot"><i
                        class="fas fa-file-invoice"></i><span>Invoice</span></a></li>
            <li id="menu-home"><a href="{{ route('home') }}" class="dot"><i
                        class="fal fa-store"></i><span>Store</span></a></li>
        </ul>
    </div>
</div>
