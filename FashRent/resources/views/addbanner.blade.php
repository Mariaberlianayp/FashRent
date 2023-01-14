@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/addbanner.css') }}">
<div class="container admin">
    <a class="btn btn-primary disabled" href="/managebanner" role="button">Manage Banner</a>
    <a class="btn btn-primary" href="/" role="button">Verification 360° Image</a>
    @if (\Session::has('suc'))
    <div class="alert alert-success">
        {!! \Session::get('suc') !!}
    </div>
    @endif
    <form method="POST" action="/addbanner" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="shop_id" class="col-md-4 col-form-label text-md-end">{{ __('Shop ID') }}</label>

            <div class="col-md-6">
                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id">

                @error('shop_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>Shop ID invalid!</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Upload Foto') }}</label>
            <div class="col-md-6">
                <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" autofocus>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col input-group offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Banner') }}
                </button>
            </div>
        </div>
</div>
<div class="container">
    @if (\Session::has('del'))
    <div class="alert alert-success">
        {!! \Session::get('del') !!}
    </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Shop</th>
            <th scope="col">Banner Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $counter=1;
            @endphp
            @foreach ($data as $d)
            <tr>
                <th scope="row">{{$counter}}</th>
                <td>{{$d->shop_id}}</td>
                <td>
                    <img height="200px" src="{{Storage::url($d->banner_image)}}" alt="">
                </td>
                <td><a class="btn btn-danger" href="/bannerdelete/{{$d->shop_id}}" role="button">Delete</a></td>
            </tr>
            <h1 hidden>{{$counter=$counter+1}}</h1>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>

@endsection
