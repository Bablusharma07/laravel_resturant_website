
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Pannel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('cssfile/adminpage.css')}}">
    
   
</head>
<body class="bg-light">
    @if(session('message'))
        <div style="float: right;">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong style="color: black">{{session('message')}}</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        </div>
        @endif
     <div class="login-form text-center rounded bg-white shadow ">
        <form method="POST" action="{{url('/loginpage')}}">
            @csrf
            <h4 class="bg-danger text-white py-3">ADMIN LOGIN PANNEL</h4>
            <div class="p-4">

             <div class="mb-3">
             <input name="admin_name" required type="text" class="form-control shadow-none text-center " placeholder="Admin Name">
             </div>

             <div class="mb-3">
             <input name="admin_pass" required type="password" id="password" class="form-control shadow-none text-center " 
              placeholder="Password" autocomplete="off">

             <div class="input-group">
              <i id="open" class="bi bi-eye-fill "></i>
              <i id="closed" class="bi bi-eye-slash"></i>
              </div>
             </div>
              <button name="login" type="login" class="btn btn-danger text-white shadow-none">Login</button>
             </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('jsfile/adminlogin.js') }}"></script>

</body>
</html>