@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/add360image.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/shop/produk"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>ADD 360° IMAGE</h3>
        </div>
    </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <h3>Procedure for Entering Products 360° View</h3>
        <div class="container">
            <div class="d-flex justify-content-center">
              <div class="detail">
                <p>The 360° feature can attract consumers' attention because the product image display will look more realistic.</p>
                <p>Slide to know how to Input photo <i class="fa-solid fa-arrow-right"></i></p>
              </div>
              <div class="image">
                <img src="{{url('images/360View.png')}}" alt="">
              </div>
            </div>
        </div>
      </div>
      <div class="carousel-item">
        <h3>Tata Cara Memasukkan Produk 360° View</h3>
        <div class="container CaraInputPhoto">
            <div class="d-flex justify-content-center">
              <div class="detail">
                <ol>
                    <li>Foto Produk dengan latar belakang polos dari beberapa sisi, mulai dari depan sampai produk memutar kedepan lagi</li>
                    <li>Hapus background semua foto pada website: <a target="_blank" href="https://www.remove.bg/">remove.bg</a></li>
                    <li>Rename foto secara berurutan dengan urutan foto paling depan dengan nomor 1</li>
                </ol>
              </div>
              <div class="image">
                <img src="{{url('images/360image2.png')}}" alt="">
              </div>
            </div>
        </div>
      </div>
      <div class="carousel-item">
        <h3>Tata Cara Memasukkan Produk 360° View</h3>
        <div class="container CaraInputPhoto">
            <div class="d-flex justify-content-center">
              <div class="detail">
                <ol start="3">
                    <li>Input foto dari urutan nomor yang sudah di rename ke form dibawah ini <i class="fa-solid fa-arrow-down"></i></li>
                    <li>Gambar - gambar yang sudah diinput akan diverifikasi oleh admin FastRent (apakah sudah sesuai atau tidak)</li>
                    <li>Gambar 360° yang disetujui oleh admin akan diinfokan melalui email dan langsung ditampilkan pada produk terkait</li>
                </ol>
              </div>
              <div class="image">
                <img src="{{url('images/360Add3.png')}}" alt="">
              </div>
            </div>
        </div>
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="SubmitImage">
    <div class="card submitCard">
        @if ($data->product_status == 0)
        <form method="POST" action="/add360photo" enctype="multipart/form-data">
            @csrf

            <input type="text" hidden name="product_id" value="{{$id}}">
            <div class="row mb-3">
                <label for="images" class="col-form-label ">Input 360&#176 Image:</label>
                <div class="col">
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

        <div class="row ">
            <div class="col button">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit Image') }}
                </button>
            </div>
        </div>
        </form>
        @elseif ($data->product_status == 3)
            <div class="alert alert-danger">
                360 image is rejected, please read the documentation or contact us!
            </div>
        @else
            <div class="alert alert-danger">
                Waiting for verification!
            </div>
        @endif
    </div>

</div>

@endsection
