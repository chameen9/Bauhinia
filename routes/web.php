<?php

use Illuminate\Support\Facades\Route;

// routes for views------------------------------------------------------------------------------------
Route::get('/', function () {return view('welcome');});
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
Route::post('/home/addtocart','App\http\controllers\customercontroller@addtocart');

//----------------------------------------------------------------------------------------------------