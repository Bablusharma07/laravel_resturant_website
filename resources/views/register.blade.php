

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset('cssfile/style.css')}}">

</head>
<body>
   @if(isset($message))
   {{$message}}
   @endif
<div class="form-container">
 
   <form action="{{url('/submit')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h3 class="text-danger">register now</h3>
   
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="number" name="phone" required placeholder="enter your phone number">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="file" name="image" required placeholder="add your image">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="{{url('/login')}}">login now</a></p>
   </form>

</div>

</body>
</html>