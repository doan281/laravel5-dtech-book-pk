<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('vendor/book/css/bootstrap.css') }}">
    <script src="{{ asset('vendor/book/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('vendor/book/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/book/js/bootstrap.js') }}"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>