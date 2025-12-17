<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', optional($setting)->title ?? 'Our College')</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

    <link rel="shortcut icon" href="{{ optional($setting)->favicon
    ? asset('uploads/settings/' . $setting->favicon)
    : asset('frontend/images/favicon.png') }}">
</head>

<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">
            <img
                src="{{ optional($setting)->logo ? asset('uploads/settings/' . $setting->logo) : asset('assets/img/logo.png') }}" />
        </a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn">
            <span class="nav-icon"></span>
        </label>
        <ul class="menu" style="border-radius: 5px;">
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('home') }}#notice">Notice Board</a></li>
            <li><a href="{{ route('home') }}#courses">Courses</a></li>
            <li><a href="{{ route('home') }}#contact">Contact</a></li>
            <li><a class="active" href="{{ route('login') }}"
                    style="width:auto; border-radius: 5px; cursor: pointer;">Login</a></li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')
</body>

</html>