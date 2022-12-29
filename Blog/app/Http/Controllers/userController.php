<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function create(){
     return view('create');
    }

    public function store(Request $request){

    //   echo  $request->name;
    //   echo  $request->password;
   //    echo  $request->input('name');
        //  dd($request->all());
        // dd($request->only(['name','email']));
        // dd($request->except(['_token']));
        // dd($request->has('name1'));
        // dd($request->hasAny(['name1','email2']));
        // echo $request->ip();

        //  echo $request->path();
        // echo $request->url();
        // echo $request->fullUrl();
        // echo $request->method();
        //  dd($request->ismethod("post"));

    //    $errors = [];


    //    if(empty($request->name)){
    //        $errors['Name'] = "Field Required";
    //    }


    //    if(empty($request->email)){
    //     $errors['Email'] = "Field Required";
    //   }elseif(!filter_var($request->email,FILTER_VALIDATE_EMAIL)){
    //     $errors['Email'] = "Invalid";
    //   }


    // if(empty($request->password)){
    //     $errors['Password'] = "Field Required";
    // }elseif(strlen($request->password) < 6){
    //     $errors['Password'] = "Length >= 6 chars";
    // }


    // if(count($errors) == 0 ){
    //     echo '* Valid Data';
    // }else{
    //     foreach($errors as $key => $value){
    //         echo '* '.$key.' : '.$value.'<br>';
    //     }
    // }



      $this->validate($request,[
          "name"  => "required",
          "email" => "required|email",
          "password" => "required|min:6"
      ]);



      echo 'Valid Data';
    }





//public function loadData(){

    # Student Data
    // $data = ["Name" => "Root Account" , "Email" => "Root@yahoo.com" , "Age" => 20 , "GPA" => 4];
    // $title = "Student Data";
    // /*
    // 1- Array  []   **
    // 2- with()      **
    // 3- compact()
    // */

    // // return view('profile',["studentData" => $data , "title" => "Student Data"]);

    // // return view('profile')->with(["studentData" =>  $data  , "title" => "Student Data"  ]);


    //    session()->put("Message","Welcome To Laravel Session");  // $_SESSION[KEY] =VALUE
    //    session()->put("Message2","Welcome To Laravel Session22222");
    //    // session()->flash("Message","Welcome To Laravel Session");

    // return view('profile',compact('data','title'));

//}




}