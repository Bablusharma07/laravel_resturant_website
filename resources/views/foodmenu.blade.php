@extends('layouts.adminlayout')
    
@section('content')


   <!-- add foodmenu modal start -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('/uploadfood')}}" method="POST" id="add_item_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="">Title</label>
              <input type="text" name="title" class="form-control" required>
            </div>

            <div class="col-lg">
              <label for="">Price</label>
              <input type="text" name="price" class="form-control"  required>
            </div>
          </div>
      
            <div class="my-2">
              <label for="">Select Image</label>
              <input type="file" name="image" class="form-control" required>
            </div>
            
            <div class="my-2">
              <label for="">Description</label>
              <input type="text" name="description" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_item_btn" class="btn btn-primary">Add Item</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
  <div class="col-12">
  <div style="float: right;">
     <h5 class=" bg-info text-dark">
     @if(session('message'))
        {{session('message')}}
        @endif
     </h5>
  </div>
  </div>
  </div>
</div>
<body class="bg-light">
  <div class="container">
    <div class="row my-3">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Food Menu</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addItemModal"><i
                class="bi-plus-circle me-2"></i>Add New Item</button>
          </div>
        </div>
        @if(isset($item_details))
    <div class="table-responsive  text-center mt-1">
    <table class="table table-hover table-bordered border-dark  align-middle">
    <thead>
    <tr class=" bg-dark text-white ">
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>

   </thead>
  <tbody>
    @php
     $i=1;
     @endphp
    @foreach($item_details->all() as $food_details)
    <tr>
      <th>{{$i}}</th>
      <td><img src="foodimage/{{$food_details->image}}" class="rounded-circle" width="100" height="100"></td>
      <td>{{$food_details->title}}</td>
      <td>{{$food_details->price}}</td>
      <td>{{$food_details->description}}</td>

      <td>
       <a href="{{url('/edititem')}}{{$food_details->id}}" class="btn btn-warning shadow-none me-1"><i class="bi bi-pencil-square"></i> Edit</a> 
       <a href="{{url('/delete_item')}}/{{$food_details->id}}" class="btn btn-danger shadow-none"><i class="bi bi-trash"></i> Delete</a>
      </td>
    </tr>
     @php
     $i++;
     @endphp
    @endforeach
    </tbody>
  </table>
  @endif
      </div>
    </div>
  </div>

  <!-- <div class="container">
  <header class="modal-header">
     <h5 class="text-dark">
     @if(isset($message))
        {{$message}}
        @endif
     </h5>
  </header> -->

    <!-- @if(isset($item_details))
    <div class="table-responsive  text-center">
    <table class="table table-hover table-bordered border-dark  align-middle">
    <thead>
    <tr class=" bg-dark text-white ">
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>

   </thead>
  <tbody>
    @php
     $i=1;
     @endphp
    @foreach($item_details->all() as $food_details)
    <tr>
      <th>{{$i}}</th>
      <td><img src="foodimage/{{$food_details->image}}" class="rounded-circle" width="100" height="100"></td>
      <td>{{$food_details->title}}</td>
      <td>{{$food_details->price}}</td>
      <td>{{$food_details->description}}</td>

      <td>
       <a href="{{url('/deleteitem')}}{{$food_details->id}}" class="btn btn-danger btn-sm shadow-none" 
          onclick="return comfirm('Are you sure,want to delete this..?')";><i class="bi bi-trash"></i> Delete</a>
      </td>
    </tr>
     @php
     $i++;
     @endphp
    @endforeach -->
 
   <!-- </tbody>
  </table>
  @endif -->
<!-- </div> -->


@endsection