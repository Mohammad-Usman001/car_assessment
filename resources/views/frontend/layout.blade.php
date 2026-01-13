<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','CarsDekho Clone')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Frontend CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/style.css') }}">
</head>
<body>

@include('frontend.partials.header')

<main>
    @yield('content')
</main>

@include('frontend.partials.footer')

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Frontend JS -->
<script src="{{ asset('frontend-assets/js/script.js') }}"></script>

@stack('scripts')
</body>
</html>
