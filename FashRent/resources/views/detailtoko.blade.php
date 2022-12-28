@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

<div class="judul d-flex text-center">
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a>
    <h3>Store Catalog</h3>
</div>
<div class="isiatas">
    <div class="kontak d-flex justify-content-between" style="width: 80%">
        <div class="card">
            <img class="rounded mx-auto d-block" src="{{Storage::url($toko->shop_photoprofile)}}">
            @foreach ($users->where('id',$toko->id) as $u)
            <h4>{{$u->name}}</h4>
            @endforeach
            <div class="kota d-flex justify-content-center">
                <i class="fa-solid fa-location-dot"></i>
                <p>{{$toko->shop_city}}</p>
            </div>
            <div class="button mx-auto">
                @if(Auth::check())
                    @if(Auth::user()->User_Priority == 3)
                        <button type="button" class="btn" ><a target="_blank" href="/chatify/{{$u->id}}"><i class="fa-solid fa-comment"></i> Chat</a></button>
                    @endif
                @endif
            </div>
        </div>

        <div class="card">
            <h3>About Us</h3>
            <br>
            {{$toko->shop_description}}
        </div>

    </div>
</div>

<div class="produk">
    <h4>PRODUK</h4>
    <div class="listProduk row justify-content-center">
      @foreach($products as $product)
      <div class="col-md-3">
        <div class="cardProduk">
          <div class="card" style="width: 18rem;">

                @foreach($photos->where('product_id' , $product->product_id)->take(1) as $photo)
                  <img src="{{Storage::url($product->product_thumbnail)}}" alt="">
                @endforeach

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

    </div>
  </div>


<script src="{{url('js/360deg.js')}}"></script>
@endsection

