<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\employeecontroller;


// routes for views------------------------------------------------------------------------------------
Route::get('/', function () {return view('welcome');});
Route::get('/home', function () {return view('home');});
Route::post('/home', function () {return view('home');});
Route::get('/customer/signin', function () {return view('signin');});
Route::get('/customer/signup', function () {return view('signup');});

Route::get('/employee/signin', function () {return view('e-signin');});
Route::get('/employee/signupconfirm', function () {return view('e-signupconfirm');});

//Route::get('/employee/signup', function () {return view('e-signup');});
Route::get('/test', function () {return view('test');});
//----------------------------------------------------------------------------------------------------

// customer sign in and sign up-----------------------------------------------------------------------
Route::post('/customer/checksignin','App\http\controllers\customercontroller@checksignin');
Route::post('/customer/signupascustomer','App\http\controllers\customercontroller@signupascustomer');
//----------------------------------------------------------------------------------------------------

// employee sign up confirm---------------------------------------------------------------------------
Route::get('/employee/confirm','App\http\controllers\employeecontroller@confirm');
Route::post('/employee/confirm','App\http\controllers\employeecontroller@confirm');
//----------------------------------------------------------------------------------------------------

// employee sign up ----------------------------------------------------------------------------------
Route::post('/employee/signupasemployee','App\http\controllers\employeecontroller@signupasemployee');

//----------------------------------------------------------------------------------------------------

// employee sign in ----------------------------------------------------------------------------------
Route::post('/employee/checksignin','App\http\controllers\employeecontroller@checksignin');

//----------------------------------------------------------------------------------------------------

// addto cart  ---------------------------------------------------------------------------------------
Route::post('/home/addtocart','App\http\controllers\cartcontroller@addtocart');
Route::get('/home/addtocart','App\http\controllers\cartcontroller@addtocart');
//----------------------------------------------------------------------------------------------------

Route::get('/customer/cart/{email}', 'App\http\controllers\cartcontroller@viewcart');
Route::post('/customer/cart/{email}','App\http\controllers\cartcontroller@viewcart');


Route::get('/customer/cart/deleteitem/{email}/{product_id}/{colour}/{size}', 'App\http\controllers\cartcontroller@deleteitem');
Route::post('/customer/cart/deleteitem/{email}/{product_id}/{colour}/{size}', 'App\http\controllers\cartcontroller@deleteitem');


Route::post('/customer/cart/updateitem/{email}/{product_id}', 'App\http\controllers\cartcontroller@viewupdatecartitem');
Route::get('/customer/cart/updateitem/{email}/{product_id}', 'App\http\controllers\cartcontroller@viewupdatecartitem');


Route::get('/customer/cart/updateitem/updateqty', 'App\http\controllers\cartcontroller@updateqty');
Route::post('/customer/cart/updateitem/updateqty', 'App\http\controllers\cartcontroller@updateqty');


Route::get('/customer/home/{email}', 'App\http\controllers\customercontroller@viewhome');