<html>
<head>
    @include('admin.layout.head')
</head>
<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                @include('admin.layout.sidebar')
                @include('admin.layout.header')
                <div>
                    @yield('adminContent')
                </div>
            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</body>
<footer>
    @include('admin.layout.footer')
</footer>
</html>
