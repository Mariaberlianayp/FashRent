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

<div class="kategori">
    <h4>KATEGORI</h4>
    <div class="container text-center">
      @foreach($categories as $category)
      <div class="cardKategori">
        <div class="image">
          <img src="{{url('images/category')}}/{{$category->category_image}}" alt="">
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
    <h4>TOKO</h4>
    <a href=""><p>Lihat Semua</p></a>
  </div>
  <div class="listToko">
    @foreach($shops->take(6) as $shop)
    <div class="cardToko">
      <div class="atas">
        <div class="image">
          <img src="{{url('images/toko')}}/{{$shop->shop_shopname}}/{{$shop->shop_photoprofile}}" alt="">
        </div>
        <div class="keterangan">
          <h6>{{$shop->shop_shopname}}</h6>
          <p>{{$shop->shop_city}}</p>
          <i data-star="4.5"></i>
        </div>
        <div class="button">
          <button type="button" class="btn btn-primary">Lihat Toko</button>
        </div>
      </div>
      <div class="bawah">
        @foreach($products->where('shop_id' , $shop->shop_id)->take(3) as $dataProducts)
          @foreach($photos->where('product_id' , $dataProducts->product_id)->take(1) as $photo)
            <img src="{{url('images/toko')}}/{{$shop->shop_shopname}}/{{$dataProducts->product_name}}/{{$photo->photo360}}" alt="">
          @endforeach
        @endforeach
      </div>
    </div>
    @endforeach
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
              @foreach($photos->where('product_id' , $product->product_id)->take(1) as $photo)
                <img src="{{url('images/toko')}}/{{$shop->shop_shopname}}/{{$product->product_name}}/{{$photo->photo360}}" alt="">
              @endforeach

          <div class="card-body">
            <a class="card-title" href="{{url('productDetail')}}/{{$product->product_id}}">{{Str::limit($product->product_name, 35)}}</a>
            <h5 class="price">Rp. {{$product->product_rentprice}}</h5>
            <p class="city">{{$shop->shop_city}}</p>
            <i data-star="4.5"></i>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>



@endsection

