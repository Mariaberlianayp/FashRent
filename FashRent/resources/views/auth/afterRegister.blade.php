@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('complete'))
                <div class="alert alert-danger">
                    {!! \Session::get('complete') !!}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Lengkapi Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/inputAfterRegister" enctype="multipart/form-data">
                        @csrf

                        {{-- Renter --}}
                    @if(Auth::user()->User_Priority == 3)
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NomorTelepon" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon">

                                @error('NoTelepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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
                    @endif


                    {{-- toko --}}
                    @if(Auth::user()->User_Priority == 2)

                    <div class="row mb-3">
                        <label for="namapemilik" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pemilik') }}</label>

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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
                        <div class="col-md-6">
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

                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                    @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
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
