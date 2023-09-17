@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <h2 class="text-danger text-center  fw-bold mb-4"
        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
        Welcome To Admin Dashboard
    </h2>

    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 px-2">
            <div class="bg-white rounded p-4 shadow border-top border-4 border-dark text-center box">
              <h4 class="text-danger">Total Users</h4>
              <h2 class="mt-2 mb-0">{{$count_user}}</h2>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 px-2 ">
            <div class="bg-white rounded p-4 shadow border-top border-4 border-dark text-center box">
             <h4 class="text-danger">Total Bookings</h4>
              <h2 class="mt-2 mb-0 ">{{$count_booking}}</h2>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 px-2 ">
            <div class="bg-white rounded p-4 shadow border-top border-4 border-dark text-center box">
             <h4 class="text-danger">Food Items</h4>
              <h2 class="mt-2 mb-0 ">{{$count_food}}</h2>
            </div>
        </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ullam maxime voluptate ratione enim illum possimus atque ab praesentium, 
        nihil quasi deserunt assumenda, sunt obcaecati error, aliquid laudantium temporibus.
         Adipisci quod sit nesciunt dolorum itaque repudiandae aut perferendis? Sunt fugiat consectetur non sint ex. 
         Labore doloremque eligendi laborum nulla dolorum veniam repellendus odit nesciunt.
          Quia consequatur beatae porro. 
         Quis sapiente consequatur ratione expedita possimus necessitatibus aut aperiam dicta officia eaque ab illo exercitationem veniam minima, 
         ad vel suscipit quo debitis eveniet recusandae voluptatem.
          Veritatis eius temporibus ea dolorem, necessitatibus nulla quia ut earum incidunt suscipit quas consectetur sint alias porro sapiente accusamus perferendis facilis vel totam cumque! Est quia atque voluptates, 
          velit esse odio, optio veritatis, eligendi repudiandae similique magnam doloremque culpa? Veniam, 
          vitae explicabo libero ducimus eius quidem atque, pariatur dolor mollitia corrupti quaerat voluptates sequi amet vel, 
          rerum quibusdam optio perferendis voluptas eos? Totam nulla id cupiditate non, sunt maiores doloremque fugiat, molestias, 
          iure molestiae earum commodi quas. Magnam deleniti impedit error ipsam libero modi ducimus eum esse voluptatibus distinctio tempore quia quas beatae iusto harum necessitatibus, 
          fuga totam exercitationem nost0000000rum excepturi? Voluptate consequuntur velit expedita voluptates fuga libero non eveniet facere. 
          Dicta id eum sit corporis at? Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ipsam cum amet omnis fugit non enim, cumque eaque earum, illum numquam quasi aspernatur mollitia ipsa similique delectus architecto, illo obcaecati laboriosam nemo. Incidunt delectus quasi quisquam repellendus veritatis commodi rem iusto suscipit aliquam illo obcaecati, doloremque aut officiis impedit atque recusandae, dolorum odio provident quam tenetur dolore corrupti ex omnis. Dicta debitis quae ipsa dolore ut vel quam error earum perspiciatis et, rem necessitatibus id tenetur repellendus hic, maiores incidunt accusamus laborum excepturi porro a non eos numquam quidem. 
          Illum veniam reprehenderit cumque velit soluta perferendis voluptas reiciendis nesciunt expedita? </p>

  </div>
<!--  
   <div class="row">
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center text-dark p-3 rounded shadow ">
                    <h5>Total Bookings</h5>
                    <h1 class="mt-2 mb-0"></h1>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center text-dark p-5 rounded shadow">
                    <h5>Total Users</h5>
                    <h1 class=" mb-0"></h1>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center text-dark p-3 rounded shadow">
                    <h5>Total Items</h5>
                    <h1 class="mt-2 mb-0"></h1>
                </div>
            </a>
        </div>
    </div> -->


 @endsection   