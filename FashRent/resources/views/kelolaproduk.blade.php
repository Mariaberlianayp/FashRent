@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('edit'))
            <div class="alert alert-success">
                {!! \Session::get('edit') !!}
            </div>
            @endif
            @if (\Session::has('deleteProduk'))
            <div class="alert alert-success">
                {!! \Session::get('deleteProduk') !!}
            </div>
            @endif
            @if (\Session::has('addfoto'))
            <div class="alert alert-success">
                {!! \Session::get('addfoto') !!}
            </div>
            @endif
            @if (\Session::has('add'))
            <div class="alert alert-success">
                {!! \Session::get('add') !!}
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
                                        @if ($d->product_status == 3)
                                        <div class="alert alert-danger">
                                            Your 360&#176 images has been declined!
                                        </div>
                                        @endif
                                        <h5 class="card-title">{{$d->product_name}}</h5>
                                        <p class="card-text">{{$d->product_description}}</p>
                                            <a href="/productdelete/{{$d->product_id}}" class="btn btn-danger mt-auto">Hapus</a>
                                            <br>
                                            <a href="/productedit/{{$d->product_id}}" class="btn btn-primary mt-1">Ubah</a>
                                            @if($d->product_status == 0 || $d->product_status == 3)
                                            <a href="/product/360photo/{{$d->product_id}}" class="btn btn-primary mt-auto">Tambah 360</a>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $data->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
