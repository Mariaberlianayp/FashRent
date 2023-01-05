@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">

<div class="container text-center">
    <div class="row">
      <div class="col-6">
        <div class="p-3"><img src="{{url('images/Login register.png')}}" alt=""></div>
      </div>
      <div class="col-6">
        @if (\Session::has('complete'))
        <div class="alert alert-danger">
            {!! \Session::get('complete') !!}
        </div>
        @endif
        <div class="cardRegister">
            <div class="cardHeader">
                <h2>Complete Profile</h2>
            </div>

            <div class="cardBody">
                <form method="POST" action="/inputAfterRegister" enctype="multipart/form-data">
                    @csrf

                    {{-- Renter --}}
                @if(Auth::user()->User_Priority == 3)
                    <div class="row mb-3">

                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon" placeholder="Phone Number">

                            @error('NoTelepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kota" class="col-md-4 col-form-label text-md-end">Kota</label>
                        <div class="col-md-6">
                          <select id="kota" name="kota" class="custom-select" required="required">
                            <option value="Jakarta Timur">Jakarta Timur</option>
                            <option value="Jakarta Pusat">Jakarta Pusat</option>
                            <option value="Jakarta Barat">Jakarta Barat</option>
                            <option value="Jakarta Selatan">Jakarta Selatan</option>
                            <option value="Jakarta Utara">Jakarta Utara</option>
                          </select>

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

                    <div class="row mb-3">

                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" autofocus>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endif


                {{-- toko --}}
                @if(Auth::user()->User_Priority == 2)

                <div class="row mb-3">
                    <label for="namapemilik" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pemilik') }}</label>

                    <div class="col input-group">
                        <input id="namapemilik" type="text" class="form-control @error('namapemilik') is-invalid @enderror" name="namapemilik" value="{{ old('namapemilik') }}" required autocomplete="namapemilik" autofocus>

                        @error('namapemilik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" readonly>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="namatoko" class="col-md-4 col-form-label text-md-end">{{ __('Nama Toko') }}</label>

                    <div class="col input-group">
                        <input id="namatoko" type="text" class="form-control @error('namatoko') is-invalid @enderror" name="namatoko" value="{{ old('namatoko') }}" required autocomplete="namatoko" autofocus>

                        @error('namatoko')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Alamat Toko</label>
                    <div class="col input-group">
                    <textarea id="address" name="address" cols="40" rows="5" class="form-control @error('address') is-invalid @enderror" required></textarea>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="NomorTelepon" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Telepon') }}</label>

                    <div class="col input-group">
                        <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon">

                        @error('NoTelepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kota" class="col-md-4 col-form-label text-md-end">Kota</label>
                    <div class="col input-group">
                    <select id="kota" name="kota" class="custom-select" required="required">
                        <option value="timur">Jakarta Timur</option>
                        <option value="pusat">Jakarta Pusat</option>
                        <option value="barat">Jakarta Barat</option>
                        <option value="selatan">Jakarta Selatan</option>
                        <option value="utara">Jakarta Utara</option>
                    </select>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Deskripsi</label>
                    <div class="col input-group">
                    <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required></textarea>

                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Upload Foto') }}</label>
                    <div class="col input-group">
                        <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" autofocus>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @endif

                    <div class="row mb-0">
                        <div class="col input-group offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
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

