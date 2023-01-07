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
            <img src="{{url('images/Product/img01.jpg')}}">
            <img src="{{url('images/Product/img02.jpg')}}">
            <img src="{{url('images/Product/img03.jpg')}}">
            <img src="{{url('images/Product/img04.jpg')}}">
            <img src="{{url('images/Product/img05.jpg')}}">
            <img src="{{url('images/Product/img06.jpg')}}">
            <img src="{{url('images/Product/img07.jpg')}}">
            <img src="{{url('images/Product/img08.jpg')}}">
            <img src="{{url('images/Product/img09.jpg')}}">
            <img src="{{url('images/Product/img10.jpg')}}">
            <img src="{{url('images/Product/img11.jpg')}}">
            <img src="{{url('images/Product/img12.jpg')}}">
            <img src="{{url('images/Product/img13.jpg')}}">
            <img src="{{url('images/Product/img14.jpg')}}">
            <img src="{{url('images/Product/img15.jpg')}}">
            <img src="{{url('images/Product/img16.jpg')}}">
            <img src="{{url('images/Product/img17.jpg')}}">
            <img src="{{url('images/Product/img18.jpg')}}">
            <img src="{{url('images/Product/img19.jpg')}}">
            <img src="{{url('images/Product/img20.jpg')}}">
            <img src="{{url('images/Product/img21.jpg')}}">
            <img src="{{url('images/Product/img22.jpg')}}">
            <img src="{{url('images/Product/img23.jpg')}}">
            <img src="{{url('images/Product/img24.jpg')}}">
            <img src="{{url('images/Product/img25.jpg')}}">
            <img src="{{url('images/Product/img26.jpg')}}">
            <img src="{{url('images/Product/img27.jpg')}}">
            <img src="{{url('images/Product/img28.jpg')}}">
            <img src="{{url('images/Product/img29.jpg')}}">
            <img src="{{url('images/Product/img30.jpg')}}">
            <img src="{{url('images/Product/img31.jpg')}}">
            <img src="{{url('images/Product/img32.jpg')}}">
            <img src="{{url('images/Product/img33.jpg')}}">
            <img src="{{url('images/Product/img34.jpg')}}">
            <img src="{{url('images/Product/img35.jpg')}}">
            <img src="{{url('images/Product/img36.jpg')}}">
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
    <h2>Penilaian Produk</h2>
    <div class="isibawah">

    </div>
</div>

<script src="{{url('js/360deg.js')}}"></script>
@endsection

