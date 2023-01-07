@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/addProduk.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a>

        </div>
        <div class="col-sm-9  text-left">
            <h3>ADD PRODUCT</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('add'))
                <div class="alert alert-success">
                    {!! \Session::get('add') !!}
                </div>
            @endif
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="/addproduk" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="iamges" class="col-md-4 col-form-label text-md-end">{{ __('Product Image:') }}</label>
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


                        <div class="row mb-3">
                            <label for="namaproduk" class="col-md-4 col-form-label text-md-end">{{ __('Product Name:') }}</label>

                            <div class="col">
                                <input id="namaproduk" type="text" class="form-control @error('namaproduk') is-invalid @enderror" name="namaproduk">

                                @error('namaproduk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sewahari" class="col-md-4 col-form-label text-md-end">{{ __('Rental Price Per Day:') }}</label>

                            <div class="col">
                                <input id="sewahari" type="text" class="form-control @error('sewahari') is-invalid @enderror" name="sewahari">

                                @error('sewahari')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deposito" class="col-md-4 col-form-label text-md-end">{{ __('Deposit Price (security deposit):') }}</label>

                            <div class="col">
                                <input id="deposito" type="text" class="form-control @error('deposito') is-invalid @enderror" name="deposito">

                                @error('deposito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty" class="col-md-4 col-form-label text-md-end">Product Quantity:</label>

                            <div class="col">
                                <input type="number" id="qty" name="qty" min="1" @error('qty') is-invalid @enderror name="qty">

                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori" class="col-md-4 col-form-label text-md-end">Category:</label>
                            <div class="col">
                              <select id="kategori" name="kategori" class="custom-select" required="required">
                                @foreach ($data as $d)
                                <option value="{{$d->category_id}}">{{$d->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender:</label>
                            <div class="col">
                              <select id="gender" name="gender" class="custom-select" required="required">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="warna" class="col-md-4 col-form-label text-md-end">Color:</label>

                            <div class="col">
                                <input id="warna" type="text" class="form-control @error('warna') is-invalid @enderror" name="warna">

                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ukuran" class="col-md-4 col-form-label text-md-end">Size:</label>
                            <div class="col">
                              <textarea id="ukuran" name="ukuran" cols="40" rows="5" class="form-control @error('ukuran') is-invalid @enderror" required placeholder="Contoh:&#10;Lingkar dada: 100cm&#10;Panjang tangan: 50cm&#10;Panjang bagian depan dan belakang: 70"></textarea>

                              @error('ukuran')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Description:</label>
                            <div class="col">
                              <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required></textarea>

                              @error('deskripsi')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>

                          {{-- <div id="container">

                          </div> --}}



                        <div class="row">
                            <div class="col button">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        </script>
</div>
@endsection
