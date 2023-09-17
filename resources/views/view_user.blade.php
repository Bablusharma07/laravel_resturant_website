@extends('layouts.adminlayout')
    
@section('content')
<div class="container ">
  <header class="modal-header">
   <h3 class="text-danger h_font fw-bold ">All Customers Details</h3>
     <h5>
     @if(session('message'))
        {{session('message')}}
     @endif
     </h5>
  </header>

    @if(isset($details))
    <div class="table-responsive  text-center">
    <table class="table table-hover table-bordered border-dark  align-middle">
    <thead>
    <tr class=" bg-dark text-white ">
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>

   </thead>
  <tbody>
    @php
     $i =1;
     @endphp
    @foreach($details->all() as $user_details)
    <tr>
      <th>{{$i}}</th>
      <td><img src="uploads/{{$user_details->image}}" class="rounded-circle" width="100" height="100"></td>
      <td>{{$user_details->name}}</td>
      <td>{{$user_details->email}}</td>
      <td>{{$user_details->phone}}</td>
      <td>
       <a href="{{url('/deleteuser')}}{{$user_details->id}}"><button class="btn btn-danger shadow-none" onclick = "return confirm('Are you sure,want to delete this..?');"><i class="bi bi-trash"></i> Delete</button></a>
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

@endsection