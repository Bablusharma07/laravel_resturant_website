
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit food item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
      #edit-form{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width:420px;
      }

    </style>
    
   
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
     <div class=" text-center rounded bg-white shadow " id="edit-form">
        <form method="POST" action="{{url('/updateitem')}}" enctype="multipart/form-data">
            @csrf

            <h4 class="bg-danger text-white py-3">Food Item Update Page</h4>

            <input type="hidden" name="hidden_id" value="{{$fooditem->id}}" class="form-control">

            <div class="p-3">
             <div class="input-group mb-2">
              <span class="input-group-text " id="basic-addon1">Title</span>
              <input type="text" name="title" value="{{$fooditem->title}}" class="form-control">
             </div>

             <div class="input-group mb-2">
              <span class="input-group-text" id="basic-addon1">Price</span>
              <input type="text" name="price" value="{{$fooditem->price}}" class="form-control">
             </div>

             <div class="input-group mb-2">
              <span class="input-group-text" id="basic-addon1">Description</span>
              <input type="text" name="description" value="{{$fooditem->description}}" class="form-control">
             </div>

             <div class="input-group">
               <span class="input-group-text" id="basic-addon1">Image</span>
               <input type="file" name="image" class="form-control">
             </div>
             <img src="foodimage/{{$fooditem->image}}" width="60" height="60" class="mb-2  rounded">


          
              <button type="submit" class="btn btn-danger text-white shadow-none mt-5">Update</button>
             </div>
        </form>
    </div>

</body>
</html>