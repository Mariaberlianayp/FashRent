@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/allshop.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>ALL SHOP</h3>
        </div>
    </div>
</div>


<div class="toko">
    <div class="row listToko">
        @foreach($shops as $shop)
        <div class="col">
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
                <i data-star="4.5"></i>
                </div>
                <div class="button">
                    <a class="btn btn-primary" href="/detailtoko/{{$shop->shop_id}}" role="button">View Shop</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

