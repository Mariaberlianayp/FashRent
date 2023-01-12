@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/detailToko.css') }}">

<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>STORE CATALOG</h3>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
      <div class="col-sm-5 col-md-6 fotoToko">
        <div class="back">
            <img src="{{Storage::url($toko->shop_photoprofile)}}">
            @foreach ($users->where('id',$toko->id) as $u)
                <h4>{{$u->name}}</h4>
            @endforeach

            @if(Auth::check())
                @if(Auth::user()->User_Priority == 3)
                    <button type="button" class="btn" ><a target="_blank" href="/chatify/{{$u->id}}"><i class="fa-solid fa-comment"></i> Chat</a></button>
                @endif
            @endif
        </div>

      </div>
      <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
        <div class="desc">
            <h3>About <span>Us</span></h3>
            <br>
            <p>{{$toko->shop_description}}</p>
            <div class="kota d-flex">
                <i class="fa-solid fa-location-dot"></i>
                <p>{{$toko->shop_city}}</p>
            </div>
            <div class="alamat">
                <p>{{$toko->shop_address}}</p>
            </div>
        </div>

      </div>
    </div>
  </div>
<div class="produk">
    <h4>PRODUCT</h4>
    <div class="listProduk row justify-content-center">
        @if (count($products) == 0)
        <h5 style="text-align: center; color: #533D9E;">Product does not exist</h5>
        @else
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="cardProduk">
                <div class="card" style="width: 18rem;">

                    <img src="{{Storage::url($product->product_thumbnail)}}" alt="">

                    <div class="card-body">
                    <a class="card-title" href="{{url('productDetail')}}/{{$product->product_id}}">{{Str::limit($product->product_name, 35)}}</a>
                    <h5 class="price">Rp. {{$product->product_rentprice}}</h5>
                    <p class="city">{{$toko->shop_city}}</p>
                    @if (count($productfeedback->where('product_id',$product->product_id))>0)
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
        @endif

    </div>
  </div>


<script src="{{url('js/360deg.js')}}"></script>
@endsection

