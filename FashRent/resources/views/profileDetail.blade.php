@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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

            <div class="card profile">

                @foreach ($data as $d)
                <div class="card-body">
                <form method="POST" action="/profile/update" enctype="multipart/form-data">
                    <fieldset disabled>
                    @csrf
                        {{-- Renter --}}
                        @if(Auth::user()->User_Priority == 3)
                        <div class="dataProfile">
                            <div class="row mb-3 justify-content-center align-self-center" >
                                <img src="{{Storage::url(Auth::user()->avatar)}}" class="card-img-top" alt="...">
                            </div>
                            <div class="Form">
                                <div class="row mb-3">
                                    <div class="col ">
                                        <label for="nama" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                        <input id="disabledTextInput" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="namapemilik" class="col-form-label text-md-end">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" readonly>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="namapemilik" class="col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                        <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon" value="{{$d->renter_phonenumber}}">

                                        @error('NoTelepon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>


                        @endif

                        {{-- toko --}}
                        @if(Auth::user()->User_Priority == 2)
                            <div class=" imageShop">
                                <img src="{{Storage::url(Auth::user()->avatar)}}" class="card-img-top" alt="...">
                            </div>

                            <div class="row mb-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col">
                                    <input id="disabledTextInput" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>


                            <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address:</label>
                            <div class="col">
                            <textarea id="address" name="address" cols="40" rows="5" class="form-control @error('address') is-invalid @enderror"required>{{$d->shop_address}}</textarea>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="NomorTelepon" class="col-md-4 col-form-label text-md-end">{{ __('Phone number:') }}</label>

                            <div class="col">
                                <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon" value="{{$d->shop_phonenumber}}">

                                @error('NoTelepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="row mb-3">
                            <label for="kota" class="col-md-4 col-form-label text-md-end">City:</label>
                            <div class="col">
                            <select id="kota" name="kota" class="custom-select @error('kota') is-invalid @enderror" required="required">
                                @if ($d->shop_city == 'Jakarta Timur')
                                <option value="Jakarta Timur" selected>Jakarta Timur</option>
                                <option value="Jakarta Pusat">Jakarta Pusat</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Jakarta Selatan">Jakarta Selatan</option>
                                <option value="Jakarta Utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'Jakarta Pusat')
                                <option value="Jakarta Timur">Jakarta Timur</option>
                                <option value="Jakarta Pusat" selected>Jakarta Pusat</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Jakarta Selatan">Jakarta Selatan</option>
                                <option value="Jakarta Utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'Jakarta Barat')
                                <option value="Jakarta Timur">Jakarta Timur</option>
                                <option value="Jakarta Pusat">Jakarta Pusat</option>
                                <option value="Jakarta Barat" selected>Jakarta Barat</option>
                                <option value="Jakarta Selatan">Jakarta Selatan</option>
                                <option value="Jakarta Utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'Jakarta Selatan')
                                <option value="Jakarta Timur">Jakarta Timur</option>
                                <option value="Jakarta Pusat">Jakarta Pusat</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Jakarta Selatan" selected>Jakarta Selatan</option>
                                <option value="Jakarta Utara">Jakarta Utara</option>
                                @endif
                                @if ($d->shop_city == 'Jakarta Utara')
                                <option value="Jakarta Timur">Jakarta Timur</option>
                                <option value="Jakarta Pusat">Jakarta Pusat</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Jakarta Selatan">Jakarta Selatan</option>
                                <option value="Jakarta Utara" selected>Jakarta Utara</option>
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
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Shop Description:</label>
                            <div class="col">
                            <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{$d->shop_description}}</textarea>

                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            </div>

                        @endif

                @endforeach
                </fieldset>
                </form>
                <br>


            </div>
            <div class="row buttonEdit">
                <div class="col">
                    @if(Auth::user()->User_Priority == 2)
                        <a class="btn btn-primary manageProduct" href="/shop/produk" role="button">Manage Products</a>
                    @endif
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        <a href="/profil/{{Auth::user()->id}}">{{ __('Edit Profile') }}</a>
                    </button>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>


@endsection
