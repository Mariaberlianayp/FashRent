@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>PRODUCT DETAIL</h3>
        </div>
    </div>
</div>


<div class="container text-center ">
    @if (Route::current()->getName() == 'seestatis')
        <div class="row image ">
            <div class="col buttonImage align-self-center">
                @if ($product->product_status == 2)
                    <button type="button" onclick = "window.location='{{url('productDetail')}}/{{$product->product_id}}'" class="btn inactive">
                        <i class="fa-solid fa-camera-rotate"></i> 360 Image</button>
                    <br>
                    <button type="button" onclick = "window.location='{{url('productDetails')}}/{{$product->product_id}}'" class="btn active"><i class="fa-solid fa-image"></i> Static Image</button>
                @else
                    <button type="button" class="btn active"><i class="fa-solid fa-image"></i> Static Image</button>
                @endif
            </div>
            <div class="col imgdgr">
                <div class="degreeimage">
                    <div class="rotation">
                        <img src="{{Storage::url($product->product_thumbnail)}}">

                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row image ">
            <div class="col buttonImage align-self-center">
                @if ($product->product_status == 2)
                    <button type="button" onclick = "window.location='{{url('productDetail')}}/{{$product->product_id}}'" class="btn active">
                        <i class="fa-solid fa-camera-rotate"></i> 360 Image</button>
                    <br>
                    <button type="button" onclick = "window.location='{{url('productDetails')}}/{{$product->product_id}}'" class="btn inactive"><i class="fa-solid fa-image"></i> Static Image</button>
                @else
                    <button type="button" class="btn active"><i class="fa-solid fa-image"></i> Static Image</button>
                @endif
            </div>
            <div class="col imgdgr">
                <div class="degreeimage">
                    <div class="rotation">
                        @if ($product->product_status == 2)
                            @foreach ($degreephotos as $dp)
                                <img src="{{Storage::url($dp->photo360)}}">
                            @endforeach
                        @else
                            <img src="{{Storage::url($product->product_thumbnail)}}">
                        @endif
                    </div>

                    @if ($product->product_status == 2)
                        <div class="icon">
                            <i class="fa-solid fa-rotate"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3 mx-auto fotoToko">
            <div class="back">
                <img src="{{Storage::url($toko->shop_photoprofile)}}">
                @foreach ($users->where('id',$toko->id) as $u)
                <h4>{{$u->name}}</h4>
                @endforeach
                <div class="kota d-flex justify-content-center">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>{{$toko->shop_city}}</p>
                </div>
                <div class="button mx-auto">
                    @foreach ($users->where('id',$toko->id) as $u)
                    @if(Auth::check())
                        @if(Auth::user()->User_Priority == 3)
                            <button type="button" class="btn" ><a target="_blank" href="/chatify/{{$u->id}}"><i class="fa-solid fa-comment"></i> Chat</a></button>
                        @endif
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6 mx-auto align-self-center">
            <div class="hargastock">
                <h3>{{$product->product_name}}</h3>
                <div class="price d-flex justify-content-center">
                    <div class="sewa">
                        <i class="fa-solid fa-sack-dollar"></i>
                        <div class="hargaSewa">
                            <p>Rental price per day:</p>
                            <h5 class="data">{{$product->product_rentprice}}</h5 >
                        </div>
                    </div>
                    <div class="deposito">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <div class="hargaDeposito">
                            <p>Deposito price:</p>
                            <h5  class="data">{{$product->product_deposito}}</h5 >
                        </div>
                    </div>
                </div>
                <div class="stock d-flex">
                    <i class="fa-solid fa-layer-group"></i>
                    <div class="stockcontent">
                        <p>Stock (contact store to confirm!):</p>
                        <h5 class="data">{{$product->product_stock}} item(s)</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="detailProduk">
    <h3>Product Details</h3>
    <div class="row">
        <div class="col-sm-3 mx-auto">
            <div class="detail1">
                <div class="category detail">
                    <i class="fa-solid fa-object-group"></i>
                    <div class="isi">
                        <p>Category:</p>
                        <h5>{{$category->category_name}}</h5>
                    </div>
                </div>
                <div class="gender detail">
                    <i class="fa-solid fa-venus-mars"></i>
                    <div class="isi">
                        <p>Gender:</p>
                        <h5>{{$product->product_gender}}</h5>
                    </div>
                </div>
                <div class="color detail">
                    <i class="fa-solid fa-palette"></i>
                    <div class="isi">
                        <p>Color:</p>
                        <h5>{{$product->product_color}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 mx-auto">
            <div class="detail2">
                <div class="size detail">
                    <i class="fa-solid fa-ruler"></i>
                    <div class="isi">
                        <p>Size Details:</p>
                        <h6>{{$product->product_size}}</h6>
                    </div>
                </div>
                <div class="desc detail">
                    <i class="fa-solid fa-file-pen"></i>
                    <div class="isi">
                        <p>Description:</p>
                        <h6>{{$product->product_description}}</h6>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="feedback">
    <div class="card">
        @if (Auth::check())
        @if (Auth::user()->User_Priority == 3)
        <a class="btn btn-primary" href="/feedback/{{$product->product_id}}" role="button">Add Feedback</a>
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
</div>

<script src="{{url('js/360deg.js')}}"></script>

@endsection
