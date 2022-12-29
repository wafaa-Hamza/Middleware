<?php

use App\Http\Controllers\blogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\studentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Message/{name}/{id?}',function ($val1,$val2 = null){

    echo 'welcome ,  '.$val1.'& id = '.$val2;
})->where([ 'name' => '[a-zA-Z]+' ]  );

Route::get('create',[userController::class,'create']);
Route::post('store',[userController::class,'store']);
Route::get('Profile',[userController::class,'loadData']);





Route::view('Test','testSession');

Route::get('student/create',[studentController::class,'create']);

Route::middleware(['checkLogin'])->group(function(){

# Student Routes .......
Route::get('student/',[studentController::class,'index']);
Route::post('student/store',[studentController::class,'store']);
Route::get('student/delete/{id}',[studentController::class,'delete']);
Route::get("student/LogOut",[studentController::class,'LogOut']);





# users .....

Route::resource('student',blogController::class);

});

Route::get("users/Login",[studentController::class,'Login']);
Route::post("users/doLogin",[studentController::class,'doLogin']);






//    /Blog           GET    (index)     >>>>    Route::get('Blog',[BlogController::class,'index']);
//    /Blog/create    GET    (Create)    >>>>    Route::get('Blog/create',[BlogController::class,'create']);
//    /Blog           post   (Store)     >>>>    Route::post('Blog',[BlogController::class,'store']);
//    /Blog/{id}/edit GET    (Edit)      >>>>    Route::get('Blog/{id}/edit',[BlogController::class,'edit']);
//    /Blog/{id}      PUT    (update)    >>>>    Route::put('Blog/{id}',[BlogController::class,'update']);
//    /Blog/{id}      Delete (destroy)   >>>>    Route::delete('Blog/{id}',[BlogController::class,'destroy']);
//    /Blog/{id}      GET    (SHOW)      >>>>    Route::get('Blog/{id}',[BlogController::class,'show']);




/*
get
post
put
patch
delete
any
match
option
resource
......
*/