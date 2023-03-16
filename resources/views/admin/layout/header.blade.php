
<!--header start here-->
<div class="header-main">
    <div class="header-left">
        <div class="logo-name">
            <a href="{{ route('admin') }}">
                <h1>Admin Control</h1>
            </a>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="header-right">
        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_info" style="padding-top: 30px">
                            @guest
                            <img src="{{ asset('Img/unsigned.png') }}" alt="" class="cen profile_image">
                            <h4>Admin</h4>
                            @else
                            <img src="{{asset('Img/user-img/'.Auth::user()->staffRelation->avatar)}}" alt="" class="cen profile_image">
                            <div class="user-name">
                                <p>{{ Auth::user()->name }}</p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                            @endguest
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                        <li><a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </li>

                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!--heder end here-->
