@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kelolaProduk.css') }}">

<div class="container text-center">
    @if (\Session::has('deleteProduk'))
        <div class="alert alert-success">
            {!! \Session::get('deleteProduk') !!}
        </div>
    @endif
    <div class="judul row d-flex">
        <div class="col-3">
            <a href="/profileDetail/{{Auth::user()->id}}"><i class="fa-solid fa-arrow-left"></i></a>

        </div>
        <div class="col-sm-9  text-left">
            <h3>MANAGE PRODUCT</h3>
        </div>
    </div>

    <div class="row align-items-end product">
        @foreach ($data as $d)
        <div class="col-md-3 data">
            <div class="card" style="width: 18rem;">
                <img width="100px" height="200px" src="{{Storage::url($d->product_thumbnail)}}" class="card-img-top" alt="Gambar Tidak Tersedia">
                <div class="card-body" style="height: 300px">
                    <h5 class="card-title">{{$d->product_name}}</h5>
                    <h5 class="card-text">@currency($d->product_rentprice)</h5>
                    <div class="button">
                        <a href="#" class="btn btn-danger mt-auto" data-toggle="modal" data-target="#exampleModal">Delete</a>
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
                                  <a class="btn btn-danger" href="/productdelete/{{$d->product_id}}" role="button">Delete</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <a href="/productedit/{{$d->product_id}}" class="btn btn-primary mt-1">Edit</a>
                    </div>
                    @if($d->product_status == 0)
                    <a href="/product/360photo/{{$d->product_id}}" class="btn360 btn btn-primary mt-auto">Add 360° View</a>
                    @elseif($d->product_status == 1)
                        Waiting For Verification
                    @elseif($d->product_status == 3)
                        Your Request Has Been Rejected, Contact Us For Further Information.
                    @endif
            </div>


            </div>
        </div>
        @endforeach
        <div class="col-md-3 addProduct">
            <h3>Add Product</h3>
            <a class="btn btn-primary" href="/addproduk" role="button"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
    </div>

</div>

@endsection
