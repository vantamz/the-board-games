<html>

<head>
    @include('shop/partials/header')
</head>
<body>
    @include('shop.partials.header-content')
    <!--Content-->
    @include('register')
    @yield('content')
    <!--//Content-->
    <!--Footer-->
    @include('shop.partials.footer')
    <!--//Footer-->
</body>

</html>
