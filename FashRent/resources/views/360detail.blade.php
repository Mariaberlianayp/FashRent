@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/degreedetail.css') }}">

<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="{{url('productDetail')}}/{{$product->product_id}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>{{$product->product_name}}</h3>
        </div>
    </div>
</div>

<div class="image d-flex justify-content-center">
    <i class="fa-solid fa-circle-play left"></i>
    <div class="degreeimage">
        <div class="rotation">
            @foreach ($degreephotos as $dp)
                <a class="zoomImage" href="{{url('degreeDetail')}}/{{$product->product_id}}">
                    <img src="{{Storage::url($dp->photo360)}}">
                </a>
            @endforeach
        </div>
    </div>
    <i class="fa-solid fa-circle-play"></i>
</div>
<div class="icon text-center">
    <i class="fa-solid fa-rotate"></i>
</div>

<script src="{{url('js/360deg.js')}}"></script>

@endsection
