<html>
<head>
    @include('admin.partials.header')
</head>

<body>
    @include('admin.partials.header-content')
    <div class="background">@yield('content')</div>

    @include('admin.partials.footer')
</body>
</html>
