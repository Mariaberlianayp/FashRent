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
                    <a class="btn btn-primary" href="/detailtoko/{{$shop->shop_id}}" role="button">Lihat Toko</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

