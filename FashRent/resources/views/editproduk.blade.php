@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/editProduk.css') }}">
<div class="container text-center">
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/shop/produk"><i class="fa-solid fa-arrow-left"></i></a>

        </div>
        <div class="col-sm-9  text-left">
            <h3>PRODUCT EDIT</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <form method="POST" action="/editproduk" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="product_id" value="{{$data->product_id}}" hidden>
                        <div class="row mb-3">
                            <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('Product Image:') }}</label>
                            <div class="col-md-6">
                            <input type="file" name="images[]" value="" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" multiple>

                                @foreach ($images as $img)
                                <div class="d-flex flex-rowv image">
                                    <img width="100px" height="100px" src="{{Storage::url($img->product_photo)}}" class="card-img-top-p2" alt="...">
                                    <a href="#"><i class="fa-solid fa-circle-xmark" data-toggle="modal" data-target="#exampleModal"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Are you sure want to delete this item?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger mt-auto" href="/deletephoto/{{$img->photo_id}}" role="button">Delete</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                @endforeach

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
                                <div class="col">
                                    @if (\Session::has('delfoto'))
                                    <div class="alert alert-success">
                                        {!! \Session::get('delfoto') !!}
                                    </div>
                                @endif
                                @if (\Session::has('delfoto2'))
                                <div class="alert alert-danger">
                                    {!! \Session::get('delfoto2') !!}
                                </div>
                                @endif
                            </div>
                    </div>

                        <div class="row mb-3">
                            <label for="namaproduk" class="col-md-4 col-form-label text-md-end">{{ __('Product Name:') }}</label>

                            <div class="col">
                                <input id="namaproduk" type="text" class="form-control @error('namaproduk') is-invalid @enderror" value="{{$data->product_name}}" name="namaproduk">

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
                                <input id="sewahari" type="text" class="form-control @error('sewahari') is-invalid @enderror" value="{{$data->product_rentprice}}" name="sewahari">

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
                                <input id="deposito" type="text" class="form-control @error('deposito') is-invalid @enderror" value="{{$data->product_deposito}}" name="deposito">

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
                                <input type="number" id="qty" name="qty" min="1" @error('qty') is-invalid @enderror value="{{$data->product_stock}}" name="qty">

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
                                @foreach ($categories as $category)
                                @if ($data->category_id == $category->category_id)
                                <option value="{{$category->category_id}}" selected>{{$category->category_name}}</option>
                                @else
                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender:</label>
                            <div class="col">
                              <select id="gender" name="gender" class="custom-select" required="required">
                                @if ($data->product_gender == 1)
                                <option value="Pria" selected>Pria</option>
                                <option value="Wanita">Wanita</option>
                                @else
                                <option value="Pria">Pria</option>
                                <option value="Wanita" selected>Wanita</option>
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="warna" class="col-md-4 col-form-label text-md-end">Color:</label>

                            <div class="col">
                                <input id="warna" type="text" class="form-control @error('warna') is-invalid @enderror" value="{{$data->product_color}}" name="warna">

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
                              <textarea id="ukuran" name="ukuran" cols="40" rows="5" class="form-control @error('ukuran') is-invalid @enderror" required>{{$data->product_size}}</textarea>

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
                              <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{$data->product_description}}</textarea>

                              @error('deskripsi')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>

                        <div class="row">
                            <div class="col button">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Product') }}
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
