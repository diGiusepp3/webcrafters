<!DOCTYPE html>
<html lang="nl-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Welkom bij Webcrafters')
    </title>
    <meta name="keywords" content="@yield('keywords', 'Webcrafters, Web, applicaties, websites, ontwerp')">
    <meta name="description" content="@yield('description', 'Webcrafters, Waar uw idee digitaal gaat')">
    <link rel="stylesheet" href="{{ asset('css/mybootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
</head>
<body>
<header class="w-100 d-flex flex-row bg-primary align-center">
    @include('menu')
</header>

<div class="content">
    @yield('content')
</div>
<footer class="w-100 d-flex flex-row justify-content-between bg-primary text-white text-center">
    <div class="copyright text-center w-100">
        <small>&copy; Copyright {{Date('Y')}} Webcrafters<br> Made with Laravel</small>
    </div>
</footer>
</body>
</html>


