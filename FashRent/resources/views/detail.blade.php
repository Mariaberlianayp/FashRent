@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

<div class="judul d-flex text-center">
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a>
    <h3>Detail Produk</h3>
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
            <h4>{{$toko->shop_shopname}}</h4>
            <div class="kota d-flex justify-content-center">
                <i class="fa-solid fa-location-dot"></i>
                <p>{{$toko->shop_city}}</p>
            </div>
            <div class="button mx-auto">
                <button type="button" class="btn" ><a target="_blank" href="https://wa.me/0895334975428"><i class="fa-solid fa-comment"></i> Chat</a></button>
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
    <a class="btn btn-primary" href="/feedback/{{$product->product_id}}" role="button" style="width: 10%">Add Feedback</a>
    <h2>Product Rating</h2>
    <span><i data-star="{{$stars_avg}}"></i> ({{$count}})</span>
    <div class="isibawah">
        @foreach ($productfeedback as $pf)
        <img class="rounded mx-auto d-block" src="{{Storage::url($pf->renter_photoprofile)}}">
        <p>{{$pf->renter_name}}</p>
        <img class="rounded mx-auto d-block" src="{{Storage::url($pf->rating_photo)}}">
        <i data-star="{{$pf->rating_stars}}"></i>
        <p>{{$pf->rating_description}}</p>
        <p>{{$pf->rating_date}}</p>
        @endforeach
    </div>
</div>

<script src="{{url('js/360deg.js')}}"></script>
@endsection

