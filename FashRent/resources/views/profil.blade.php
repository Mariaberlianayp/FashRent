@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('update'))
                <div class="alert alert-success">
                    {!! \Session::get('update') !!}
                </div>
            @endif

            @if (\Session::has('update_password'))
                <div class="alert alert-success">
                    {!! \Session::get('update_password') !!}
                </div>
            @endif
            <div class="card">
                @foreach ($data as $d)
                <div class="card-header">
                {{ __('Edit Profil') }}

                @if (Auth::user()->User_Priority==2)
                    <a class="btn btn-primary" href="/shop/produk/{{$d->shop_id}}" role="button">Kelola Produk</a>
                @endif
                </div>

                <div class="card-body">
                <form method="POST" action="/profile/update" enctype="multipart/form-data">
                    @csrf
                        {{-- Renter --}}
                        @if(Auth::user()->User_Priority == 3)
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$d->renter_name}}" required autocomplete="name" autofocus>

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
                                <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon" value="{{$d->renter_phonenumber}}">

                                @error('NoTelepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <img width="200px" height="300px" src="{{Storage::url($d->renter_photoprofile)}}" class="card-img-top" alt="...">
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ganti Foto') }}</label>
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
                                <input id="namapemilik" type="text" class="form-control @error('namapemilik') is-invalid @enderror" name="namapemilik" value="{{$d->shop_ownername}}" required autocomplete="namapemilik" autofocus>

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
                                <input id="namatoko" type="text" class="form-control @error('namatoko') is-invalid @enderror" name="namatoko" value="{{$d->shop_shopname}}" required autocomplete="namatoko" autofocus>

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
                            <textarea id="address" name="address" cols="40" rows="5" class="form-control @error('address') is-invalid @enderror"required>{{$d->shop_address}}</textarea>

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
                                <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon" value="{{$d->shop_phonenumber}}">

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
                            <select id="kota" name="kota" class="custom-select @error('kota') is-invalid @enderror" required="required">
                                @if ($d->shop_city == 'timur')
                                <option value="timur" selected>Jakarta Timur</option>
                                <option value="pusat">Jakarta Pusat</option>
                                <option value="barat">Jakarta Barat</option>
                                <option value="selatan">Jakarta Selatan</option>
                                <option value="utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'pusat')
                                <option value="timur">Jakarta Timur</option>
                                <option value="pusat" selected>Jakarta Pusat</option>
                                <option value="barat">Jakarta Barat</option>
                                <option value="selatan">Jakarta Selatan</option>
                                <option value="utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'barat')
                                <option value="timur">Jakarta Timur</option>
                                <option value="pusat">Jakarta Pusat</option>
                                <option value="barat"selected>Jakarta Barat</option>
                                <option value="selatan">Jakarta Selatan</option>
                                <option value="utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'selatan')
                                <option value="timur">Jakarta Timur</option>
                                <option value="pusat">Jakarta Pusat</option>
                                <option value="barat">Jakarta Barat</option>
                                <option value="selatan" selected>Jakarta Selatan</option>
                                <option value="utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'utara')
                                <option value="timur">Jakarta Timur</option>
                                <option value="pusat">Jakarta Pusat</option>
                                <option value="barat">Jakarta Barat</option>
                                <option value="selatan">Jakarta Selatan</option>
                                <option value="utara"selected>Jakarta Utara</option>
                                @endif


                            </select>

                            @error('kota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Deskripsi</label>
                            <div class="col-md-6">
                            <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{$d->shop_description}}</textarea>

                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            </div>

                            <div class="col-4">
                                <img width="200px" height="300px" src="{{Storage::url($d->shop_photoprofile)}}" class="card-img-top" alt="...">
                            </div>

                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ganti Foto') }}</label>
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

                @endforeach

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
                <br>

                <form method="POST" action="/profile/editpassword">
                    @csrf
                    <div class="row mb-3">
                        <label for="password_lama" class="col-md-4 col-form-label text-md-end">{{ __('Password Lama') }}</label>

                        <div class="col-md-6">
                            <input id="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" required autocomplete="password_lama">

                            @error('password_lama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password_baru" class="col-md-4 col-form-label text-md-end">{{ __('Password Baru') }}</label>

                        <div class="col-md-6">
                            <input id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" required autocomplete="new-password">

                            @error('password_baru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
                <br>
                </form>
            </div>

            </div>
        </div>
    </div>
</div>


@endsection