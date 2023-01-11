@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/feedback.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/productDetail/{{$id}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9  text-left">
            <h3>PRODUCT FEEDBACK</h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('addcomment'))
            <div class="alert alert-success">
                {!! \Session::get('addcomment') !!}
            </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="/addfeedback" enctype="multipart/form-data">
                        @csrf

                        <input type="text" hidden value="{{$id}}" name="product_id">
                        <div class="row mb-3">
                            <label for="stars">Rating</label>
                            <div class="col-md-6">
                                <div class="rate">
                                    <input type="radio" id="star5" name="stars" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="stars" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="stars" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="stars" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="stars" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                  </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" autofocus>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea id="comment" name="comment" cols="40" rows="5" class="form-control @error('comment') is-invalid @enderror" required></textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Feedback') }}
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


