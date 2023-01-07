@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="judul d-flex text-center">
                <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i>  Back to Manage Catalog</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Tambah Produk') }}</div>

                <div class="card-body">
                    <form method="POST" action="/add360photo" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="iamges" class="col-md-4 col-form-label text-md-end">Enter 360&#176 Image</label>
                            <div class="col-md-6">
                                <input type="file" name="images[]" value="" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" multiple onchange="image_select()">
                                @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @error('images.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>The images must be an image.</strong>
                                </span>
                                @enderror

                        </div>
                    </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enter Image') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


