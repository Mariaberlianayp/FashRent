@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>PRODUCT DETAIL</h3>
        </div>
    </div>
</div>
<div class="360image d-flex justify-content-center">
<div class="center">

        <div class="rotation">
            @if ($product->product_status == 2)
            @foreach ($degreephotos as $dp)
            <img src="{{Storage::url($dp->photo360)}}">
            @endforeach
            @else
            <img src="{{Storage::url($product->product_thumbnail)}}">
            360&#176 image is not available
            @endif
        </div>
    </div>
</div>
<div class="isiatas">
    <div class="detail">
        <h3>{{$product->product_name}}</h3>
        <p>Harga sewa per hari:</p>
        <p class="data">{{$product->product_rentprice}}</p>
        <p>Harga desposito (uang jaminan):</p>
        <p class="data">{{$product->product_deposito}}</p>
        <p>Stok:</p>
        <p class="data">{{$product->product_stock}} item</p>
    </div>
    <div class="kontak">
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
                @foreach ($users->where('id',$toko->id) as $u)
                <button type="button" class="btn" ><a target="_blank" href="/chatify/{{$u->id}}"><i class="fa-solid fa-comment"></i> Chat</a></button>
                @endforeach
            </div>
        </div>
    </div>

</div>

<div class="card detailProduk">
        <h2>Detail Produk</h2>
        <div class="isibawah">
           <div class="kiri">
                <p>Kategori: {{$category->category_name}}</p>
                <p>Gender: {{$product->product_gender}}</p>
                <p>Warna: {{$product->product_color}}</p>
            </div>
            <div class="kanan">
                <p>Detail Ukuran:</p>
                <p>{{$product->product_size}}</p>
            </div>
        </div>

</div>
<div class="card detailProduk">
    <h2>Deskripsi Produk</h2>
    <div class="isibawah">
       <p>{{$product->product_description}}</p>
    </div>
</div>
<div class="card detailProduk">
    @if (Auth::check())
        @if (Auth::user()->User_Priority == 3)
        <a class="btn btn-primary" href="/feedback/{{$product->product_id}}" role="button" style="width: 10%">Add Feedback</a>
        @endif
    @endif
    <h2>Product Rating</h2>
    @if (count($productfeedback)>0)
    <span><i data-star="{{$stars_avg}}"></i> ({{$count}})</span>
    @endif
    <div class="isibawah">
        @foreach ($productfeedback as $pf)
        <img class="rounded mx-auto d-block" src="{{Storage::url($pf->renter_photoprofile)}}">
        @foreach ($users->where('id',$pf->id) as $u)
        <h4>{{$u->name}}</h4>
        @endforeach
        <img class="rounded mx-auto d-block" src="{{Storage::url($pf->rating_photo)}}">
        <i data-star="{{$pf->rating_stars}}"></i>
        <p>{{$pf->rating_description}}</p>
        <p>{{$pf->rating_date}}</p>
        @endforeach
    </div>
</div>

<script src="{{url('js/360deg.js')}}"></script>
@endsection

