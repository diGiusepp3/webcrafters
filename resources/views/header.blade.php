<!-- Header.blade.php -->
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

    <a class="w-10 text-center" id="toggleUserMenuButton" onclick="toggleUserMenu()" href="javascript:void(0);">
        <i class="fas fa-user text-white"></i>
    </a>
    <div class="userMenu w-10">
        <i class="fas fa-user-plus text-white"></i>
        <i class="fas fa-user-minus text-white"></i>
    </div>


</header>
