@extends('layouts.adminlayout')
    
@section('content')

 <!-- add Chef modal start -->
 <div class="modal fade" id="addChefModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Chef</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('/uploadchef')}}" method="POST" id="add_chef_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-lg">
              <label for="">Speciality</label>
              <input type="text" name="speciality" class="form-control"  required>
            </div>
          </div>
      
            <div class="my-2">
              <label for="">Image</label>
              <input type="file" name="image" class="form-control" required>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_chef_btn" class="btn btn-primary">Add Chef</button>
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
            <h3 class="text-light">Manage Chef Details</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addChefModal"><i
                class="bi-plus-circle me-2"></i>Add New Chef</button>
          </div>
        </div>

     @if(isset($chef_details))
    <div class="table-responsive  text-center mt-1">
    <table class="table table-hover table-bordered border-dark  align-middle">
    <thead>
    <tr class=" bg-dark text-white ">
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Speciality</th>
      <th scope="col">Action</th>
    </tr>

   </thead>
  <tbody>
    @php
     $i=1;
     @endphp
    @foreach($chef_details->all() as $chefs)
    <tr>
      <th>{{$i}}</th>
      <td><img src="chefimage/{{$chefs->image}}" class="rounded-circle" width="100" height="100"></td>
      <td>{{$chefs->name}}</td>
      <td>{{$chefs->speciality}}</td>

      <td>
       <a href="{{url('/edit_chef')}}{{$chefs->id}}" class="btn btn-warning shadow-none me-1"><i class="bi bi-pencil-square"></i> Edit</a> 
       <a href="{{url('/delete_chef')}}/{{$chefs->id}}" class="btn btn-danger shadow-none"><i class="bi bi-trash"></i> Delete</a>
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


@endsection