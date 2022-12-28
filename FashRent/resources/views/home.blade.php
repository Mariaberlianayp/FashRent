@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

    @if (Auth::check())
        @if (Auth::user()->User_Priority!=1)
        <div class="slideCard align-middle">
            <div id="carouselExampleIndicators" class="carousel slide bannerSlide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{url('images/banner1.jpg')}}" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{url('images/banner2.jpg')}}" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{url('images/banner3.jpg')}}" class="d-block img-fluid" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <div class="kategori">
            <h4>CATEGORY</h4>
            <div class="container text-center">
              @foreach($categories as $category)
              <div class="cardKategori">
                <div class="image">
                  <img src="{{Storage::url($category->category_image)}}" alt="">
                </div>
                <div class="title">
                  <a class="" href="/category/{{$category->category_id}}"><h6>{{$category->category_name}}</h6></a>
                </div>
              </div>
              @endforeach
            </div>
        </div>
        <div class="toko">
          <div class="tokoJudul">
            <h4>SHOP</h4>
            <a href="/allshop"><p>View all</p></a>
          </div>
          <div class="listToko">
            @foreach($shops->take(6) as $shop)
            <div class="cardToko">
              <div class="atas">
                <div class="image">
                  <img src="{{Storage::url($shop->shop_photoprofile)}}" alt="">
                </div>
                <div class="keterangan">
                    @foreach ($users->where('id',$shop->id) as $u)
                    <h6>{{$u->name}}</h6>
                    @endforeach
                  <p>{{$shop->shop_city}}</p>
                    @php
                        $count_avg=0;
                        $total_stars=0;
                    @endphp
                  @foreach($products->where('shop_id',$shop->shop_id) as $product)
                  @if (count($productfeedback->where('product_id',$product->product_id))>0)
                  @php
                    $stars=0;
                    $count=0;
                  @endphp
                  @foreach ($productfeedback->where('product_id',$product->product_id) as $p)
                    <p hidden>{{$stars=$stars+$p->rating_stars}}</p>
                    <p hidden>{{$count=$count+1}}</p>
                  @endforeach
                  @php
                      $stars_now = $stars/$count;
                      $total_stars = $stars_now+$total_stars;
                      $count_avg++;
                        $stars=0;
                        $count=0;
                  @endphp
                  @else
                  @php
                    $stars_now = 0;
                    $total_stars = $stars_now+$total_stars;
                    $count_avg++;
                 @endphp
                @endif

                  @endforeach
                  @if ($count_avg ==0)
                  <i data-star="0"></i>
                  @else
                  <i data-star="{{$total_stars/$count_avg}}"></i>
                  @endif

                </div>
                <div class="button">
                    <a class="btn btn-primary" href="/detailtoko/{{$shop->shop_id}}" role="button">View Shop</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>

        <div class="produk">
          <h4>PRODUCT</h4>
          <div class="listProduk row justify-content-center">
            @foreach($products as $product)
            <div class="col-md-3">
              <div class="cardProduk">
                <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($product->product_thumbnail)}}" alt="">
                  <div class="card-body">
                    <a class="card-title" href="{{url('productDetail')}}/{{$product->product_id}}">{{Str::limit($product->product_name, 35)}}</a>
                    <h5 class="price">Rp. {{$product->product_rentprice}}</h5>
                    <p class="city">{{$shop->shop_city}}</p>
                    @if (count($productfeedback->where('product_id',$product->product_id))>0)
                    @php
                        $stars=0;
                        $count=0;
                    @endphp
                    @foreach ($productfeedback->where('product_id',$product->product_id) as $p)
                      <p hidden>{{$stars=$stars+$p->rating_stars}}</p>
                      <p hidden>{{$count=$count+1}}</p>
                    @endforeach
                    <i data-star="{{$stars/$count}}"></i>
                    @php
                        $stars=0;
                        $count=0;
                    @endphp
                    @else
                    <i data-star="0"></i>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        @endif
    @else
    <div class="slideCard align-middle">
        <div id="carouselExampleIndicators" class="carousel slide bannerSlide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{url('images/banner1.jpg')}}" class="d-block img-fluid" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('images/banner2.jpg')}}" class="d-block img-fluid" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('images/banner3.jpg')}}" class="d-block img-fluid" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="kategori">
        <h4>KATEGORI</h4>
        <div class="container text-center">
          @foreach($categories as $category)
          <div class="cardKategori">
            <div class="image">
              <img src="{{Storage::url($category->category_image)}}" alt="">
            </div>
            <div class="title">
              <a class="" href="/category/{{$category->category_id}}"><h6>{{$category->category_name}}</h6></a>
            </div>
          </div>
          @endforeach
        </div>
    </div>
    <div class="toko">
        <div class="tokoJudul">
          <h4>SHOP</h4>
          <a href="/allshop"><p>View all</p></a>
        </div>
        <div class="listToko">
          @foreach($shops->take(6) as $shop)
          <div class="cardToko">
            <div class="atas">
              <div class="image">
                <img src="{{Storage::url($shop->shop_photoprofile)}}" alt="">
              </div>
              <div class="keterangan">
                  @foreach ($users->where('id',$shop->id) as $u)
                  <h6>{{$u->name}}</h6>
                  @endforeach
                <p>{{$shop->shop_city}}</p>
                  @php
                      $count_avg=0;
                      $total_stars=0;
                  @endphp
                @foreach($products->where('shop_id',$shop->shop_id) as $product)
                @if (count($productfeedback->where('product_id',$product->product_id))>0)
                @php
                  $stars=0;
                  $count=0;
                @endphp
                @foreach ($productfeedback->where('product_id',$product->product_id) as $p)
                  <p hidden>{{$stars=$stars+$p->rating_stars}}</p>
                  <p hidden>{{$count=$count+1}}</p>
                @endforeach
                @php
                    $stars_now = $stars/$count;
                    $total_stars = $stars_now+$total_stars;
                    $count_avg++;
                      $stars=0;
                      $count=0;
                @endphp
                @else
                @php
                  $stars_now = 0;
                  $total_stars = $stars_now+$total_stars;
                  $count_avg++;
               @endphp
              @endif

                @endforeach
                @if ($count_avg ==0)
                <i data-star="0"></i>
                @else
                <i data-star="{{$total_stars/$count_avg}}"></i>
                @endif

              </div>
              <div class="button">
                  <a class="btn btn-primary" href="/detailtoko/{{$shop->shop_id}}" role="button">View Shop</a>
              </div>
            </div>
            <div class="bawah">

            </div>
          </div>
          @endforeach
        </div>

      </div>

      <div class="produk">
        <h4>PRODUCT</h4>
        <div class="listProduk row justify-content-center">
          @foreach($products as $product)
          <div class="col-md-3">
            <div class="cardProduk">
              <div class="card" style="width: 18rem;">
                      <img src="{{Storage::url($product->product_thumbnail)}}" alt="">
                <div class="card-body">
                  <a class="card-title" href="{{url('productDetail')}}/{{$product->product_id}}">{{Str::limit($product->product_name, 35)}}</a>
                  <h5 class="price">Rp. {{$product->product_rentprice}}</h5>
                  <p class="city">{{$shop->shop_city}}</p>
                  @if (count($productfeedback->where('product_id',$product->product_id))>0)
                  @php
                      $stars=0;
                      $count=0;
                  @endphp
                  @foreach ($productfeedback->where('product_id',$product->product_id) as $p)
                    <p hidden>{{$stars=$stars+$p->rating_stars}}</p>
                    <p hidden>{{$count=$count+1}}</p>
                  @endforeach
                  <i data-star="{{$stars/$count}}"></i>
                  @php
                      $stars=0;
                      $count=0;
                  @endphp
                  @else
                  <i data-star="0"></i>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    @endif

    @if (Auth::check())
        @if (Auth::user()->User_Priority == 1)

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (\Session::has('acc'))
                    <div class="alert alert-success">
                        {!! \Session::get('acc') !!}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Shop</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Inputted Image</th>
                            <th scope="col">Verification</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop )
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$shop->shop_id}}</td>
                                <td>@foreach ($users->where('id',$shop->id) as $u)
                                    {{$u->name}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($degreephotos->where('product_id',$shop->product_id) as $d)
                                    <input type="text" hidden>
                                    <img height="200px" src="{{Storage::url($d->photo360)}}" alt="">
                                    @endforeach
                                </td>
                                <td><a class="btn btn-primary" href="/verif/acc/{{$shop->product_id}}" role="button">Accept</a> <a class="btn btn-danger" href="/verif/dec/{{$shop->product_id}}" role="button">Reject</a></td>
                            </tr>
                            <h1 hidden>{{$counter=$counter+1}}</h1>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $shops->links() }}
        </div>

        @endif

    @endif



@endsection

