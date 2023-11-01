<!-- Header.blade.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Welkom bij Webcrafters')
    </title>
    <meta name="keywords" content="@yield('keywords', 'Webcrafters, Web, applicaties, websites, ontwerp')">
    <meta name="description" content="@yield('description', 'Webcrafters, Waar uw idee digitaal gaat')">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mybootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
<header class="w-100 d-flex flex-row bg-primary align-center">
    <div class="logo w-10 d-flex align-center justify-center m-1">
        <a href="/">
            <img class="w-50 m-auto p-0" src="{{asset('images/logo.svg')}}" alt="logo">
        </a>
    </div>

    <nav>
         <a href="/">Home</a>
         <a href="/about">Over ons</a>
         <a href="/services">Diensten</a>
         <a href="/contact">Contact</a>
    </nav>

    <div class="dropdown">
        <a class="w-10 text-center dropdown-toggle" id="toggleUserMenuButton dropdownMenuButton" onclick="toggleUserMenu()">
            <i class="bi bi-person-fill-down" style="font-size: 1.5em"></i>
        </a>
        <div class="userMenu" aria-labelledby="dropdownMenuButton" style="position: absolute; top: 9em;">
            <i class="dropdown-item  bi bi-person-plus-fill text-primary">
                <a href="/login">Inloggen</a>
            </i>
            <i class="dropdown-item bi bi-person-dash text-primary"><p>Registreren</p></i>
        </div>
    </div>
</header>


