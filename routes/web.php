<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home',[homeController::class,'index']);

// login and register page
Route::get('/login',[homeController::class,'login_form']);
Route::get('/register',[homeController::class,'registration_form']);

// register form submit page
Route::post('/submit',[homeController::class,'submit_form']);

Route::get('/view_user',[homeController::class,'user_details']);
Route::get('/deleteuser{id}',[homeController::class,'delete_details']);

// user login and logout 
Route::post('/userlogin',[homeController::class,'user_login']);
Route::get('/userlogout',[homeController::class,'user_logout']);

// table reservation route is start from here
Route::post('/reservation',[homeController::class,'reservation']);
Route::get('/viewreservation',[homeController::class,'view_reservation']);
Route::get('/delete{id}',[homeController::class,'delete_reservation']);



// admin all part is here
Route::get('/adminlogin',[homeController::class,'admin_form']);
Route::get('/adminpannel',[homeController::class,'admin_dashboard']);
// Route::get('/admin',[homeController::class,'admin_pannel']);
// admin login page
Route::post('/loginpage',[homeController::class,'admin_login']);
Route::get('/admin_logout',[homeController::class,'admin_logout']);

// foodmenu start from here
Route::get('/foodmenu',[homeController::class,'foodmenu']);
Route::post('/uploadfood',[homeController::class,'upload_food']);
Route::get('/get_all',[homeController::class,'get_all_fooditem']);
Route::get('/edititem{id}',[homeController::class,'edit_fooditem']);
Route::post('/updateitem',[homeController::class,'update_fooditem']);
Route::get('/delete_item/{id}',[homeController::class,'delete_food_item']);

// chef page start from here
Route::get('/viewchef',[homeController::class,'view_chef']);
Route::post('/uploadchef',[homeController::class,'upload_chef']);
Route::get('/get_chef',[homeController::class,'get_all_chef']);
Route::get('/edit_chef{id}',[homeController::class,'edit_chef']);
Route::post('/updatechef',[homeController::class,'update_chef']);
Route::get('/delete_chef/{id}',[homeController::class,'delete_chef']);
















