<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\account;

class studentController extends Controller
{
    //

     public function index(){
         // code .....


        // if(auth()->check()){

        $data =  account:: orderBy('id','desc')->get();

        //->take(2)

         return view('users.index',["data" => $data]);
        
     }




    public function create(){
        return view('users.create');
       }


       public function store(Request $request){
           // code .....

       $data =  $this->validate($request,[
               "name"     => "required|min:3",
               "email"    => "required|email",
               "password" => "required|min:6"
        ]);


       $data['password'] = bcrypt($data['password']);

       $op = account :: create($data);

        if($op){
            $message = 'data inserted';
        }else{
            $message =  'error try again';
        }

        session()->flash('Message',$message);

        return redirect(url('/student/'));



       }



  public function edit($id){

    // code
    // $data = student :: where('id',$id)->get();
    $data = accountt :: find($id);

       return view('users.edit',["data" => $data]);
  }


  public function update(Request $request,$id){


    $data =  $this->validate($request,[
        "name"     => "required|min:3",
        "email"    => "required|email"
      ]);

     $op =  account :: where('id',$id)->update($data);

     if($op){
        $message = 'Raw Updated';
    }else{
        $message =  'error try again';
    }

    session()->flash('Message',$message);

    return redirect(url('/student/'));



  }





    public function delete($id){
       // code .....

      $op =  student::find($id)->delete();
      if($op){
         $message = "Raw Removed";
      }else{
         $message = 'Error Try Again';
      }

       session()->flash('Message',$message);

       return redirect(url('/student/'));

       }




       public function login(){
           return view('students.login');
       }


       public function doLogin(Request $request){

        $data =  $this->validate($request,[
            "password"  => "required|min:6",
            "email"     => "required|email"
          ]);


          if(auth()->attempt($data)){

           return redirect(url('/student'));

          }else{
              session()->flash('Message','invalid Data');
              return redirect(url('/student/Login'));
          }


       }




       public function LogOut(){
           // code .....

           auth()->logout();
           return redirect(url('/student/Login'));
       }


}
