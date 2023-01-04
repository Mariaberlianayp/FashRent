@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kelolaProduk.css') }}">

<div class="container text-center">
    @if (\Session::has('deleteProduk'))
        <div class="alert alert-success">
            {!! \Session::get('deleteProduk') !!}
        </div>
    @endif
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a>

        </div>
        <div class="col-sm-9  text-left">
            <h3>MANAGE PRODUCT</h3>
        </div>
    </div>

    <div class="row align-items-end product">
        @foreach ($data as $d)
        <div class="col-md-3 data">
            <div class="card" style="width: 18rem;">
                <img width="100px" height="200px" src="{{Storage::url($d->product_thumbnail)}}" class="card-img-top" alt="Gambar Tidak Tersedia">
                <div class="card-body">
                    <h5 class="card-title">{{$d->product_name}}</h5>
                    <h5 class="card-text">Rp. {{$d->product_rentprice}}</h5>
                    <div class="button">
                        <a href="/productdelete/{{$d->product_id}}" class="btn btn-danger mt-auto">Delete</a>
                        <a href="/productedit/{{$d->product_id}}" class="btn btn-primary mt-1">Edit</a>
                    </div>
                    @if($d->product_status == 0)
                    <a href="/product/360photo/{{$d->product_id}}" class="btn360 btn btn-primary mt-auto">Add 360° View</a>
                    @endif
            </div>
            @endif
            <div class="container">
                <div class="row row-cols-3">
                    <a class="btn btn-primary" href="/addproduk" role="button">Tambah Produk</a>
                    @foreach ($data as $d)
                        <div class="col p-3">
                            <div class="card h-100">
                                <img width="100px" height="200px" src="{{Storage::url($d->product_thumbnail)}}" class="card-img-top" alt="Gambar Tidak Tersedia">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{$d->product_name}}</h5>
                                        <p class="card-text">{{$d->product_description}}</p>
                                            <a href="/productdelete/{{$d->product_id}}" class="btn btn-danger mt-auto">Hapus</a>
                                            <br>
                                            <a href="/productedit/{{$d->product_id}}" class="btn btn-primary mt-1">Ubah</a>
                                            @if($d->product_status == 0)
                                            <a href="#" class="btn btn-primary mt-auto">Tambah 360</a>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $data->links() }}
            </div>
        </div>
        @endforeach
        <div class="col-md-3 addProduct">
            <h3>Add Product</h3>
            <a class="btn btn-primary" href="/addproduk" role="button"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
    </div>

</div>

@endsection
