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
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Upload Photo') }}</label>
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
                @if ($d->shop_id == null)
                <td>Admin</td>
                @else
                <td>{{$d->shop_id}}</td>
                @endif
                <td>
                    <img height="200px" src="{{Storage::url($d->banner_image)}}" alt="">
                </td>
                <td><a class="btn btn-danger" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Delete</a></td>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delete this item?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-danger mt-auto" href="/bannerdelete/{{$d->banner_id}}" role="button">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </tr>
            <h1 hidden>{{$counter=$counter+1}}</h1>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>

@endsection
