@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
<div class="container text-center login">
    <div class="row">
      <div class="col-6">
        <img src="{{url('images/loginRegister.png')}}" alt="">
      </div>
      <div class="col-6">
        <div class="cardLogin">
            <div class="cardHeader">
               <h2>Login</h2>
               <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
            </div>

            <div class="cardBody">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
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
