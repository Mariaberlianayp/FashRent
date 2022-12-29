<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- FontAwsome --}}
     <script src="https://kit.fontawesome.com/c8ad5c3f4e.js" crossorigin="anonymous"></script>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    {{-- Font --}}
    <link href='https://fonts.googleapis.com/css?family=Poppins:wght@400,600,700' rel='stylesheet'>

    <title>Fashrent</title>

  </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div id="navbar-content">
                        <ul class="navbar-nav mr-auto justify-content-center">
                            <li>
                                <a href="#"><img src="{{url('images/logo_fashrent.png')}}" alt="Image" style="height: 50px;"></a>
                            </li>
                            <li class="search">
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk..." aria-label="Search">
                                    <button class="btn my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </li>
                            <li class="fav"><i class="fa-solid fa-heart"></i></li>
                            <li class="chat"><i class="fa-solid fa-comment"></i></li>
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                    </li>
                                @endif
                        </ul>
                    </div>

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="footer shadow-sm ">
            <div class="container ">
                <div class="row ">
                  <div class="col about">
                        <div class="row ">
                            <div class="col">
                                <img src="{{url('images/LogoDark.png')}}" alt="">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <p>Platform penyewaan produk fashion dan membantu toko menampilkan katalog dengan menarik</p>
                            </div>
                        </div>
                    </div>
                  <div class="col layanan_pelanggan">
                    <div class="row ">
                        <div class="col">
                            <h6>Layanan Pelanggan</h6>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <ul>
                                <li><a href="">Bantuan</a> </li>
                                <li><a href="">Hubungi Kami</a></li>
                                <li><a href="">Syarat dan Ketentuan</a></li>
                                <li><a href="">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                  </div>
                  <div class="col">
                    <img src="{{url('images/footerIllustration.png')}}" alt="">
                  </div>

              </div>

            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
