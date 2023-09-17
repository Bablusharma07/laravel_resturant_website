<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\view;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(){
        $data=DB::table('foods')->get();
        $data1=DB::table('chefs')->get();
        // dd($data1);
        //dd($data);
        return view('/home')->with(['data'=>$data,'data1'=>$data1]);
    }

    public function login_form(){
        return view('login');
    }

    public function registration_form(){
        return view('register');
    }

    public function submit_form(Request $request){
       if($request->password != $request->cpassword){
        echo "<script>alert('Password are not matching')</script>";
        exit;
       }

        $name=$request->input('name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $password=$request->input('password');
        $image=$request->file('image');

        $password1=password_hash($password,PASSWORD_DEFAULT);

        $fileName=time(). '.' .$image->getClientOriginalName();
        $location="uploads";
        $image->move($location,$fileName);

        $affected_row=DB::table('users')->insert([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'password'=>$password1,
            'image'=>$fileName
        ]);

        if($affected_row==1){
            return view('register')->with('message','Successfully Data Inserted!');
        }else{
            return view('register')->with('message','Something Went Wrong!');
        }
    }

    public function user_details(){
      $user_data=DB::table('users')->get();
      //    dd($user_data);
      return view('view_user')->with(['details'=>$user_data]);
    }

    public function delete_details($id){
        $delete_data=DB::table('users')->find($id);
        // dd($delete_data);
        $delete_img=$delete_data->image;
        $img_name="uploads/".$delete_img;

        $rows=DB::table('users')->where('id',$id)->delete();
        if($rows==1){
            unlink($img_name);
            return redirect('view_user')->with('message','Successfully Data Deleted!');
        }else{
            return redirect('view_user')->with('message','Something Went Wrong!');
        }
    }

    public function user_login(Request $request){
        // dd($request->all());
     $uname=$request->input('username');
     $upass=$request->input('upassword');
     $user = DB::table('users')->where('email', '=',$uname)->orWhere('phone', '=',$upass)->get();
     
     if(empty($user[0])){
        return redirect('/login')->with('message', 'User not exists');
     }else{
        $db_pass=$user[0]->password;
    
        $verify_pass=password_verify($upass,$db_pass);

        if($verify_pass){
            $request->session()->put('user_name', $user[0]->name);
            $request->session()->put('user_id', $user[0]->id);
            $request->session()->put('ip_address',$_SERVER['REMOTE_ADDR']);
            $request->session()->put('login_time',date('d-m-y h:i:sA'));
            return redirect('/home');
        }else{
            return redirect('login')->with('message','Password does not exist!');
        }
      }
    }
    // user logout page
    public function user_logout(Request $request){
        $request->session()->forget('user_name');
        $request->session()->flush();
        return redirect('/home');

    
    }

    // table reservation page
    public function reservation(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $guest=$request->input('guest');
        $date=$request->input('date');
        $time=$request->input('time');
        $message=$request->input('message');

        $affected_row=DB::table('reservation')->insert([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'guest'=>$guest,
            'date'=>$date,
            'time'=>$time,
            'message'=>$message
        ]);

        if($affected_row==1){
            return redirect('home');
        }
    }

    public function view_reservation(){
        $data=DB::table('reservation')->get();
        //    dd($data);
        return view('adminreservation')->with(['details'=>$data]);
    }

    public function delete_reservation($id){
        $user_id=$id;
        $delete_data=DB::table('reservation')->where('id','=',$user_id)->get();
        // dd($delete_data);

        $rows=DB::table('reservation')->where('id','=',$user_id)->delete();
        if($rows==1){
            return redirect('viewreservation')->with('message','Successfully Data Deleted!');
        }else{
            return redirect('viewreservation')->with('message','Something Went Wrong!');
        }
    }

// all admin function start from here
    public function admin_form(){
        return view('adminlogin');
    }
    public function admin_dashboard(){
        $count_user=DB::table('users')->count();
        $count_booking=DB::table('reservation')->count();
        $count_food=DB::table('foods')->count();

        //($count_user);
        return view('adminpannel')->with(['count_user'=>$count_user,'count_booking'=>$count_booking,'count_food'=>$count_food]);
    }

    public function admin_pannel(){
        return view('admin');
    }
    // admin login page
    public function admin_login(Request $request){
        $uname=$request->input('admin_name');
        $upass=$request->input('admin_pass');
        $admin = DB::table('admin')->where('admin_name', '=', $uname)->where('admin_password', '=',$upass)->get();
        // dd($admin);
        if (empty($admin[0])) {
            return redirect('/adminlogin')->with('message', 'Wrong Credintial');
        } else {
            $request->session()->put('admin_name', $admin[0]->admin_name);
            $request->session()->put('admin_id', $admin[0]->id);
            return redirect('/adminpannel');
        }
    }
    // admin logout page is here
    public function admin_logout(Request $request){
        $request->session()->forget('admin_name');
        $request->session()->flush();
        return redirect('/adminlogin');
    }

    // foodmenu 
    public function foodmenu(){
        return view('foodmenu');
    }

    public function upload_food(Request $request){
        $food_title=$request->input('title');
        $food_price=$request->input('price');
        $food_desc=$request->input('description');
        $food_image=$request->file('image');

        $fileName=time(). '.' .$food_image->getClientOriginalExtension();
        $location="foodimage";
        $food_image->move($location,$fileName);

        $aff_row=DB::table('foods')->insert([
            'title'=>$food_title,
            'price'=>$food_price,
            'description'=>$food_desc,
            'image'=>$fileName
        ]);

        if($aff_row==1){
            return redirect('/get_all')->with('message','Successfully Item Added!');
        }else{
            return redirect('/get_all')->with('message','Something Went Wrong!');
        }
    }
    public function get_all_fooditem (){
        $food_item=DB::table('foods')->get();
        // dd($food_item);
        return view('foodmenu')->with(['item_details'=>$food_item]);
    }

    public function edit_fooditem($id){
    $edit_item=DB::table('foods')->find($id);
        // dd($edit_item);
    return view('editfooditem')->with(['fooditem'=>$edit_item]);
    }

    public function update_fooditem(Request $request){
        // dd($request);
        $hidden_id=$request->input('hidden_id');
        $food_title=$request->input('title');
        $food_price=$request->input('price');
        $food_desc=$request->input('description');
        $food_image=$request->file('image');


        $fileName=time(). '.' .$food_image->getClientOriginalExtension();
        $location = "foodimage";
        $food_image->move($location,$fileName);

        $rows = DB::table('foods')->where('id', '=', $hidden_id)->update([
            'title'=>$food_title,
            'price'=>$food_price,
            'description'=>$food_desc,
            'image'=>$fileName

        ]);

        if($rows ==1){
            return redirect('/get_all')->with('message','Successfully Data Updated !');
        }else{
            return redirect('/get_all')->with('message','Something Went Wrong!');
        }
    }

    public function delete_food_item($id){
        // dd($id);
        $item_data = DB::table('foods')->find($id);
        //dd($item_data);
        $delete_img = $item_data->image;
        $delete_item_image = "foodimage/" . $delete_img;
        $aff = DB::table('foods')->where('id', $id)->delete();

        if ($aff) {
            unlink($delete_item_image);
            return redirect('/get_all')->with('message', 'Item Deleted');
        } else {
            return redirect('/get_all')->with('message', 'Something went wrong');
        }
    
    }


    // all chef page is start from here
    public function view_chef(){
        return view('viewchef');
    }

    public function upload_chef(Request $request){
        $chef_name=$request->input('name');
        $chef_specaility=$request->input('speciality');
        $chef_image=$request->file('image');

        $fileName=time(). '.' .$chef_image->getClientOriginalExtension();
        $location="chefimage";
        $chef_image->move($location,$fileName);

        $row=DB::table('chefs')->insert([
            'name'=>$chef_name,
            'speciality'=>$chef_specaility,
            'image'=>$fileName
        ]);

        if($row==1){
            return redirect('/get_chef')->with('message','Successfully Data Added!');
        }else{
            return redirect('/get_chef')->with('message','Something Went Wrong!');
        }
    }

    public function get_all_chef(){
        $chef=DB::table('chefs')->get();
        //  dd($chef);
        return view('viewchef')->with(['chef_details'=>$chef]);
    }

    public function edit_chef($id){
        //dd($id);
        $edit_chef=DB::table('chefs')->find($id);
        //  dd($edit_chef);
        return view('edit_chef')->with(['chef_details'=>$edit_chef]);
    }

    public function update_chef(Request $request){
        $hidden_id=$request->input('hidden_id');
        $chef_name=$request->input('name');
        $chef_speciality=$request->input('speciality');
        $chef_image=$request->file('image');


        $fileName=time(). '.' .$chef_image->getClientOriginalExtension();
        $location = "chefimage/";
        $chef_image->move($location,$fileName);

        $row = DB::table('chefs')->where('id', '=', $hidden_id)->update([
            'name'=>$chef_name,
            'speciality'=>$chef_speciality,
            'image'=>$fileName

        ]);

        if($row==1){
            return redirect('/get_chef')->with('message','Successfully Updated!');
        }else{
            return redirect('/get_chef')->with('message','Something Went Wrong!');
        }
    }

    public function delete_chef($id){
        //dd($id);
            $item_data = DB::table('chefs')->find($id);
            //dd($item_data);
            $delete_img = $item_data->image;
            $delete_item_image = "chefimage/" . $delete_img;
            $aff = DB::table('chefs')->where('id', $id)->delete();

            if ($aff) {
                unlink($delete_item_image);
                return redirect('/get_chef')->with('message', 'Item Deleted');
            } else {
                return redirect('/get_chef')->with('message', 'Something went wrong');
            }
    }

}
