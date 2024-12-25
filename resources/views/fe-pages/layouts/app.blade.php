<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varta:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/costume.css') }}">
   
    <style>
    body {
        font-family: "Varta", serif;
    }
    h1, h2, h3, h4, h5, h6 {
        font-family: "Varta", serif;
    }
</style>
</head>
<body class="d-block">
    @include('fe-pages.partials.topnav')
    @include('fe-pages.partials.navbar')
    @yield('content')
    @include('fe-pages.partials.partners')
    @include('fe-pages.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/timeline.js') }}"></script>
</body>
</html>