<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="shortcut icon" href="{{ asset(('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset(('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset(('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset(('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset(('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset(('assets/css/style.css') }}">
</head>

<body class="error-page">

    {{-- content error --}}
    @yield('content')

    <script src="{{ asset(('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset(('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset(('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset(('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset(('assets/js/script.js') }}"></script>
</body>

</html>
