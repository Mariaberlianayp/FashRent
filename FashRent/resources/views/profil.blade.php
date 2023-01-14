@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">
<div class="container">
    <div class="row g-0 text-center">
        <div class="col-sm-6 col-md-8 editProfile">
            <h3>Edit Profile</h3>

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

                <div class="card-body">
                <form method="POST" action="/profile/update" enctype="multipart/form-data">
                    @csrf
                        {{-- Renter --}}
                        @if(Auth::user()->User_Priority == 3)
                        <div class="imageProfile">
                            <img src="{{Storage::url($d->renter_photoprofile)}}" class="card-img-top" alt="...">
                        </div>
                        <div class="row mb-3 ">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Change Photo:') }}</label>
                            <div class="col">
                                <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" autofocus>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name:') }}</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

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
                            <label for="NomorTelepon" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number:') }}</label>

                            <div class="col">
                                <input id="NoTelepon" type="text" class="form-control @error('NoTelepon') is-invalid @enderror" name="NoTelepon" value="{{$d->renter_phonenumber}}">

                                @error('NoTelepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @endif

                        {{-- toko --}}
                        @if(Auth::user()->User_Priority == 2)
                            <div class="imageProfile">
                                <img src="{{Storage::url($d->shop_photoprofile)}}" class="card-img-top" alt="...">
                            </div>
                            <div class="row mb-3">

                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Change Photo:') }}</label>
                                <div class="col">
                                    <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" autofocus>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name:') }}</label>

                                <div class="col">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

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
                            <label for="NomorTelepon" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number:') }}</label>

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

                    <div class=" buttonEdit">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
                <br>


                <br>
                </form>
            </div>

            </div>

        </div>
        <div class="col-6 col-md-4 changePassword">
            <h3>Change Password</h3>
            <form method="POST" action="/profile/editpassword" class="changePasswordForm">
                @csrf
                <div class="row mb-3">
                    <label for="password_lama" class="col-md-4 col-form-label text-md-end">{{ __('Old password:') }}</label>

                    <div class="col">
                        <input id="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" required autocomplete="password_lama">

                        @error('password_lama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password_baru" class="col-md-4 col-form-label text-md-end">{{ __('New password:') }}</label>

                    <div class="col">
                        <input id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" required autocomplete="new-password">

                        @error('password_baru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password:') }}</label>

                    <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="buttonPassword">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>


        </div>
    </div>

</div>


@endsection
