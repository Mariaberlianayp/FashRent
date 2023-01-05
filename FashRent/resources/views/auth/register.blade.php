@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">

<div class="container text-center  register">
    <div class="row">
      <div class="col-6">
        <img src="{{url('images/Login register.png')}}" alt="">
      </div>
      <div class="col-6">
        <div class="cardRegister">
            <div class="cardHeader">
                <h2>Register</h2>
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>

            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf

                    <div class="row mb-3">
                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">


                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                          <select id="peran" name="User_Priority" class="custom-select @error('User_Priority') is-invalid @enderror" >
                            <option value="3">Renter</option>
                            <option value="2">Shop</option>
                          </select>

                          @error('User_Priority')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col input-group offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
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
