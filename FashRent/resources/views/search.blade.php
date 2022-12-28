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



<div class="produk">
  <h4>PRODUK</h4>
  <div class="listProduk row justify-content-center">
    @foreach($products as $product)
    <div class="col-md-3">
      <div class="cardProduk">
        <div class="card" style="width: 18rem;">
          @foreach($shops->where('shop_id' , $product->shop_id)->take(1) as $shop)
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
          @endforeach
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>



@endsection

