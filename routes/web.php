<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/homepage", function() {
    return "<h1>This is home page</h1>" ;
});
Route::get("/blog/{id}", function($id) {
    return "<h1>This is blog page : {$id} </h1>" ;
});
Route::get( "/blog/{id}/edit" , function($id) {
    return "<h1>This is blog page : {$id} for edit</h1>" ;
});
Route::get("/product/{a}/{b}/{c}", function($a, $b, $c) {
    return "<h1>This is product page </h1><div>{$a} , {$b}, {$c}</div>" ;
});
Route::get("/category/{a?}", function($a = "mobile") {
    return "<h1>This is category page : {$a} </h1>" ;
});
Route::get("/myorder/create", function() {
    return "<h1>This is order form page : ". request("username") ."</h1>" ;

});
Route::get("/myorder/create", function() {
    return "<h1>This is order form ". request("id")." page : ". request("username") ."</h1>" ;

});
Route::get("/hello", function () {	
    return view("hello");
});
Route::get('/greeting', function () {
	$name = 'James';
    $last_name = 'Mars';
    return view('greeting', compact('name','last_name') );
});
Route::middleware(['auth','role:admin,teacher'])->group(function () {
    Route::get("/teacher" , function (){
	return view("teacher");
    });
    Route::resource('/covid19','Covid19Controller');
});
Route::get( "/gallery" , function(){
	$ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://www.hebergementwebs.com/image/cc/cc8811773d2cdbeb4d46e5550fc455fe.jpg/falcon-and-the-winter-soldier-falcon-minifigure-captain-america.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg"; 
    return view("test/index", compact("ant","bird","cat","god","spider") );
});
Route::get('/gallery/ant', function () {
	$ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant") );
});
Route::get("/student" , function (){
	return view("student");
});
Route::get('/table', function () {
    return view('table');
});
use App\Http\Controllers\MyProfileController;
Route::get("/myprofile/create",[ MyProfileController::class , "create" ]);
Route::get("/myprofile/{id}/edit",[ MyProfileController::class , "edit" ]);
Route::get("/myprofile/{id}", [ MyProfileController::class , "show" ]);
Route::get( "/newgallery" , [ MyProfileController::class , "gallery" ]);
Route::get( "/newgallery/ant" , [ MyProfileController::class , "ant" ]);
Route::get( "/coronavirus" ,[ MyProfileController::class , "coronavirus" ]);
use App\Http\Controllers\Covid19Controller;
Route::get("/covid19/create",[ Covid19Controller::class , "create" ]);
Route::get("/covid19/{id}/edit", [ Covid19Controller::class , "edit" ]);
Route::get('/covid19', [ Covid19Controller::class,"index" ]);
Route::get('/covid19/{id}', [ Covid19Controller::class,"show" ]);
Route::post("/covid19",[ Covid19Controller::class , "store" ]);
Route::patch("/covid19/{id}", [ Covid19Controller::class , "update" ]);
Route::delete('/covid19/{id}', [ Covid19Controller::class , 'destroy' ]);
use App\Http\Controllers\StaffController;
Route::get("/staff/create",[ StaffController::class , "create" ]);
Route::get("/staff/{id}/edit", [ StaffController::class , "edit" ]);
Route::get('/staff', [ StaffController::class,"index" ]);
Route::get('/staff/{id}', [ StaffController::class,"show" ]);
Route::post("/staff",[ StaffController::class , "store" ]);
Route::patch("/staff/{id}", [ StaffController::class , "update" ]);
Route::delete('/staff/{id}', [ StaffController::class , 'destroy' ]);

use App\Http\Controllers\PostController;
Route::resource('post', PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//Route::resource('post', 'PostController');
//Route::resource('profile', 'ProfileController');
//Route::resource('user', 'UserController');
//Route::resource('vehicle', 'VehicleController');

use App\Http\Controllers\ProfileController;  //เขียนเพิ่ม
use App\Http\Controllers\UserController;  //เขียนเพิ่ม
use App\Http\Controllers\VehicleController;  //เขียนเพิ่ม

Route::resource('profile', ProfileController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);