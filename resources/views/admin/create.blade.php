@extends("admin.layout")

@section("body")
@include('error')
<form action="{{route("productStore")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Name</label>
      <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <textarea type="text" name="desc" class="form-control" id="exampleInputPassword1"></textarea>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Price</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Quntity</label>
        <input type="number" name="quantity" class="form-control">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select name="category_id">
            @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>




    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection