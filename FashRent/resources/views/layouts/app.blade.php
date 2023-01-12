<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- FontAwsome --}}
     <script src="https://kit.fontawesome.com/c8ad5c3f4e.js" crossorigin="anonymous"></script>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    {{-- font --}}
    <link href='https://fonts.googleapis.com/css?family=Poppins:wght@400,600,700,800&display=swap' rel='stylesheet'>

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
                            <a href="/"><img src="{{url('images/logo_fashrent.png')}}" alt="Image" style="height: 50px;"></a>
                        </li>
                        <li class="search">
                                <form class="form-inline my-2 my-lg-0" action="/search">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search Product..." aria-label="Search" name="search">
                                    <button class="btn my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            @if (Auth::check())
                                @if (!Auth::user()->User_Status == 0)
                                    <a href="/chatify"><li class="chat"><i class="fa-solid fa-comment"></i></li></a>
                                @endif
                            @endif
                        </li>
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
                        @if(Auth::check())
                            @if(!Auth::user()->User_Status == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="/profileDetail/{{Auth::user()->id}}">Profile</a>
                            </li>
                            @endif
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
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
                <div class="row g-0">
                    <div class="col-sm-6 col-md-8 about">
                        <img src="{{url('images/LogoDark.png')}}" alt="">
                        <p class="text">Fashion product rental platform and helps stores display catalogs in an attractive way</p>
                    </div>
                    <div class="col-6 col-md-4">
                        <img src="{{url('images/footerIllustration.png')}}" alt="">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
