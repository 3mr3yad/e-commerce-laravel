@extends('admin.layout')

@section('body')
@include("success")
<p class="lead">
    Show Product
  </p>
<div class="card" style="width: 18rem;" >
    <img src={{asset("storage/$product->image")}} class="card-img-top" height="350px" alt="...">
    <div class="card-body">
      <h2 class="card-title text-warning">{{$product->name}}</h2>
      <h5 class="card-title text-danger">{{$product->price}} L.E</h5>
      <p class="card-title text-secondary">In Stock : {{$product->quantity}}</p>
      <p class="card-text">{{$product->desc}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@endsection