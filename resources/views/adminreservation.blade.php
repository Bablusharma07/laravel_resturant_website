@extends('layouts.adminlayout')
    
@section('content')
<div class="container ">
  <header class="modal-header">
   <h3 class="text-danger h_font fw-bold">Table Reservation Details</h3>
     <h5 class="text-dark">
     @if(isset($message))
        {{$message}}
        @endif
     </h5>
  </header>

    @if(isset($details))
    <div class="table-responsive  text-center">
    <table class="table table-hover table-bordered border-dark  align-middle">
    <thead>
    <tr class=" bg-dark text-white ">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Guest</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>

   </thead>
  <tbody>
    @php
     $i=1;
     @endphp
    @foreach($details->all() as $reservation_details)
    <tr>
      <th>{{$i}}</th>
      <td>{{$reservation_details->name}}</td>
      <td>{{$reservation_details->email}}</td>
      <td>{{$reservation_details->phone}}</td>
      <td>{{$reservation_details->guest}}</td>
      <td>{{$reservation_details->date}}</td>
      <td>{{$reservation_details->time}}</td>
      <td>{{$reservation_details->message}}</td>

      <td>
       <a href="{{url('/delete')}}{{$reservation_details->id}}" class="btn btn-danger btn-sm shadow-none" 
          onclick="return comfirm('Are you sure,want to delete this..?')";><i class="bi bi-trash"></i> Delete</a>
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