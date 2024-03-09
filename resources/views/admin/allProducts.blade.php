@extends('admin.layout')

@section('body')
@include("success")
<table class="table">
    <thead>
      <tr>

        <th> Product Name </th>
        <th> Product Price </th>
        <th> Product Quantity </th>
        <th> Product Image </th>
        <th> Actions </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>
            <img src="{{asset("storage/$product->image")}}" alt="">

        </td>
        <td>
            <a href="{{url("products/show/$product->id")}}"><div class="btn btn-info">Show</div></a>
            <a href="{{url("products/edit/$product->id")}}"><div class="btn btn-success">Edit</div></a>
            <form class="btn btn-danger" action="{{url("products/delete/$product->id")}}" method="POST">
                @csrf
                <button type="submit" class="bg-transparent border-0">Delete</button>
            </form>
        </td>

      </tr>

      @endforeach
    </tbody>
  </table>

{{-- Pagination  --}}
  {{$products->links()}}
@endsection