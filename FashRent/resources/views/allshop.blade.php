@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">


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



<div class="toko">
    <div class="tokoJudul">
      <h4>SHOP</h4>
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


@endsection

