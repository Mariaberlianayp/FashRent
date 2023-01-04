@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Produk') }}</div>

                <div class="card-body">
                    <form method="POST" action="/editproduk" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Upload Foto') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="images[]" value="" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" multiple>
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
                            <label for="namaproduk" class="col-md-4 col-form-label text-md-end">{{ __('Nama Produk') }}</label>

                            <div class="col-md-6">
                                <input id="namaproduk" type="text" class="form-control @error('namaproduk') is-invalid @enderror" name="namaproduk">

                                @error('namaproduk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sewahari" class="col-md-4 col-form-label text-md-end">{{ __('Harga Sewa per Hari') }}</label>

                            <div class="col-md-6">
                                <input id="sewahari" type="text" class="form-control @error('sewahari') is-invalid @enderror" name="sewahari">

                                @error('sewahari')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deposito" class="col-md-4 col-form-label text-md-end">{{ __('Harga Deposito (Uang Jaminan)') }}</label>

                            <div class="col-md-6">
                                <input id="deposito" type="text" class="form-control @error('deposito') is-invalid @enderror" name="deposito">

                                @error('deposito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty" class="col-md-4 col-form-label text-md-end">Jumlah Produk</label>

                            <div class="col-md-6">
                                <input type="number" id="qty" name="qty" min="1" @error('qty') is-invalid @enderror name="qty">

                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori" class="col-md-4 col-form-label text-md-end">Kategori</label>
                            <div class="col-md-6">
                              <select id="kategori" name="kategori" class="custom-select" required="required">
                                @foreach ($categories as $category)
                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>
                            <div class="col-md-6">
                              <select id="gender" name="gender" class="custom-select" required="required">
                                <option value="1">Pria</option>
                                <option value="2">Wanita</option>
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="warna" class="col-md-4 col-form-label text-md-end">Warna</label>

                            <div class="col-md-6">
                                <input id="warna" type="text" class="form-control @error('warna') is-invalid @enderror" name="warna">

                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ukuran" class="col-md-4 col-form-label text-md-end">Ukuran</label>
                            <div class="col-md-6">
                              <textarea id="ukuran" name="ukuran" cols="40" rows="5" class="form-control @error('ukuran') is-invalid @enderror" required></textarea>

                              @error('ukuran')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Deskripsi</label>
                            <div class="col-md-6">
                              <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required></textarea>

                              @error('deskripsi')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>









                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Produk') }}
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
