@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@if (Route::current()->getName() == 'allCategory')
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>{{$categoryName->category_name}}</h3>
        </div>
    </div>
</div>
@else
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h4>Search result: {{ request()->get('search') }}</h4>
        </div>
    </div>
</div>
@endif


<div class="produk">
    <div class="listProduk row justify-content-center">
        @if(count($products)==0)
            <h4 style="text-align: center">Product does not exist</h4>
        @else
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
        @endif
    </div>
  </div>




@endsection

