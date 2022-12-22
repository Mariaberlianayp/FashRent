<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
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
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('')?'active':''}}" href="#">Masuk </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('')?'active':''}}" href="#">Daftar</a>
                            </li>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
</body>
</html>