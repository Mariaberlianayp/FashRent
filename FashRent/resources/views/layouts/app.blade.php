<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- FontAwsome --}}
     <script src="https://kit.fontawesome.com/c8ad5c3f4e.js" crossorigin="anonymous"></script>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <title>Fashrent</title>

  </head>
  <body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div id="navbar-content">
                    <ul class="navbar-nav mr-auto justify-content-center">
                        <li>
                            <a href="/home"><img src="{{url('images/logo_fashrent.png')}}" alt="Image" style="height: 50px;"></a>
                        </li>
                        <li class="search">
                            @if (Auth::check())
                                @if (!Auth::user()->User_Status == 0)
                                    <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk..." aria-label="Search">
                                        <button class="btn my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                    <li class="fav"><i class="fa-solid fa-heart"></i></li>
                                    <li class="chat"><i class="fa-solid fa-comment"></i></li>
                                @endif
                            @endif
                        </li>
                        @guest
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
                        @else
                        @if(Auth::check())
                            @if(!Auth::user()->User_Status == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="/profil/{{Auth::user()->id}}">Profil</a>
                            </li>
                            @endif
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Keluar') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                        @endguest
                    </ul>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
