

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{('cssfile/style.css')}}">

</head>
<body>
   @if(session('message'))
         <div style="float: right;">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong style="color: black">{{session('message')}}</strong>
                  <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         </div>
         </div>
         @endif
<div class="form-container">
   <form action="{{url('/userlogin')}}" method="POST">
      @csrf
      <h3 class="text-danger">login now</h3>
     
      <input type="email" name="username" required placeholder="enter your email || phone">
      <input type="password" name="upassword" required placeholder="enter your password">
         
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="{{url('/register')}}">register now</a></p>
   </form>

</div>

</body>
</html>