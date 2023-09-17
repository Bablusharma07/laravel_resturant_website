@if (!session('admin_name'))
<script>
    window.location.href="{{url('/adminlogin')}}";
</script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!--Font Awesome-->
   <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset('cssfile/common.css')}}">


</head>
<body class="bg-light">

 <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    
    <h4 class="mb-0 h_font">Klassy Cafe - Restaurent</h4>
    <a href="{{url('/adminlogin')}}" class="btn btn-light fw-bold btn-sm"><i class="bi bi-power"></i> LOG OUT</a>
 </div>

<div  class="col-lg-2 bg-danger border-top border-3 border-secondary" id="dashboard-menu" >
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid flex-lg-column align-items-stretch">
      <h5 class="mt-2 text-light">ADMIN PANNEL</h5>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
      <ul class="nav nav-pills flex-column">

      <li class="nav-item">
        <a class="nav-link text-white " href="{{url('/adminpannel')}}"><i class="bi bi-speedometer2"></i> Dashboard</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{url('/view_user')}}"><i class="bi bi-people-fill"></i> User Details</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{url('/viewreservation')}}"><i class="bi bi-person-bounding-box"></i> Reservation</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{url('/get_all')}}"><i class="bi bi-cup-hot-fill"></i> FoodMenu</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white " href="{{url('/get_chef')}}"><i class="bi bi-flower3"></i> Chef</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link text-white" href="{{url('/adminlogin')}}"><i class="bi bi-power"></i> Logout</a>
      </li>

      </ul>
    </div>

    </div>
  </nav>
</div>

<div class="conatainer-fluid" id="main-content">
 <div class="row">
  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    @yield('content')
  </div>
 </div>
</div>


  <!-- All script links -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
 
</body>
</html> 