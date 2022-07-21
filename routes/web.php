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
Route::get('/test', function () {return view('placeorder');});
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


Route::post('/customer/cart/updateitem/{email}/{product_id}/{colour}/{size}', 'App\http\controllers\cartcontroller@viewupdatecartitem');
Route::get('/customer/cart/updateitem/{email}/{product_id}/{colour}/{size}', 'App\http\controllers\cartcontroller@viewupdatecartitem');


Route::get('/customer/cart/updateitem/updateqty', 'App\http\controllers\cartcontroller@updateqty');
Route::post('/customer/cart/updateitem/updateqty', 'App\http\controllers\cartcontroller@updateqty');


Route::get('/customer/home/{email}', 'App\http\controllers\customercontroller@viewhome');

Route::post('/customer/order/confirmorder', 'App\http\controllers\ordercontroller@confirmorder');

Route::post('/customer/order/checkout/confirm', 'App\http\controllers\ordercontroller@checkoutconfirm');

Route::get('/customer/orders/{email}', 'App\http\controllers\ordercontroller@vieworders');
Route::post('/customer/orders/{email}', 'App\http\controllers\ordercontroller@vieworders');

Route::get('/customer/order/markasrecieved/{email}/{product_id}/{colour}/{size}/{qty}/{ordered_date}/{ordered_time}', 'App\http\controllers\ordercontroller@markasrecieved');
Route::get('/customer/order/markasrecieved/{email}/{product_id}/{colour}/{size}/{qty}/{ordered_date}/{ordered_time}', 'App\http\controllers\ordercontroller@markasrecieved');

Route::get('/customer/order/removeorder/{email}/{product_id}/{colour}/{size}/{qty}/{ordered_date}/{ordered_time}', 'App\http\controllers\ordercontroller@removeorder');
Route::post('/customer/order/removeorder/{email}/{product_id}/{colour}/{size}/{qty}/{ordered_date}/{ordered_time}', 'App\http\controllers\ordercontroller@removeorder');

Route::post('/customer/signout', 'App\http\controllers\customercontroller@signout');
Route::get('/customer/signout', 'App\http\controllers\customercontroller@signout');

Route::post('/employee/orders/{name}/{email}', 'App\http\controllers\employeecontroller@vieworders');
Route::get('/employee/orders/{name}/{email}', 'App\http\controllers\employeecontroller@vieworders');

Route::post('/employee/home/{name}/{email}', 'App\http\controllers\employeecontroller@viewhome');
Route::get('/employee/home/{name}/{email}', 'App\http\controllers\employeecontroller@viewhome');

Route::post('/employee/inventory/{name}/{email}', 'App\http\controllers\employeecontroller@viewinventory');
Route::get('/employee/inventory/{name}/{email}', 'App\http\controllers\employeecontroller@viewinventory');

Route::post('/employee/stocks/{name}/{email}', 'App\http\controllers\employeecontroller@viewstocks');
Route::get('/employee/stocks/{name}/{email}', 'App\http\controllers\employeecontroller@viewstocks');

Route::post('/employee/money/{name}/{email}', 'App\http\controllers\employeecontroller@viewmoney');
Route::get('/employee/money/{name}/{email}', 'App\http\controllers\employeecontroller@viewmoney');

Route::get('/employee/find/orders', 'App\http\controllers\employeecontroller@findorders');
Route::post('/employee/find/orders', 'App\http\controllers\employeecontroller@findorders');

Route::get('/employee/find/inventory', 'App\http\controllers\employeecontroller@findinventory');
Route::post('/employee/find/inventory', 'App\http\controllers\employeecontroller@findinventory');

Route::get('/employee/find/stocks', 'App\http\controllers\employeecontroller@findstocks');
Route::post('/employee/find/stocks', 'App\http\controllers\employeecontroller@findstocks');

Route::get('/employee/find/money', 'App\http\controllers\employeecontroller@findmoney');
Route::post('/employee/find/money', 'App\http\controllers\employeecontroller@findmoney');

Route::get('/employee/order/markasshipped/{order_id}/{name}/{email}', 'App\http\controllers\employeecontroller@markasshipped');
Route::post('/employee/order/markasshipped/{order_id}/{name}/{email}Email', 'App\http\controllers\employeecontroller@markasshipped');

Route::get('/employee/inventory/updateitem/{product_id}/{name}/{email}', 'App\http\controllers\employeecontroller@viewupdateinventoryitem');
Route::post('/employee/inventory/updateitem/{product_id}/{name}/{email}', 'App\http\controllers\employeecontroller@viewupdateinventoryitem');

Route::get('/employee/stocks/updateitem/{product_id}/{name}/{email}', 'App\http\controllers\employeecontroller@viewupdatestock');
Route::post('/employee/stocks/updateitem/{product_id}/{name}/{email}', 'App\http\controllers\employeecontroller@viewupdatestock');

Route::get('/employee/inventoryupdateinventoryitem/update', 'App\http\controllers\employeecontroller@updateinventoryitem');
Route::post('/employee/inventoryupdateinventoryitem/update', 'App\http\controllers\employeecontroller@updateinventoryitem');

Route::get('/employee/inventoryupdatestocks/update', 'App\http\controllers\employeecontroller@updatestock');
Route::post('/employee/inventoryupdatestocks/update', 'App\http\controllers\employeecontroller@updatestock');

Route::get('employee/inventory/addnewproduct', 'App\http\controllers\employeecontroller@addnewproduct');
Route::post('employee/inventory/addnewproduct', 'App\http\controllers\employeecontroller@addnewproduct');

Route::get('/employee/{name}/{email}/{stat}/create/inventoryreport', 'App\http\controllers\employeecontroller@createinventoryreport');
Route::post('/employee/{name}/{email}/{stat}/create/create/inventoryreport', 'App\http\controllers\employeecontroller@createinventoryreport');

Route::get('/employee/{name}/{email}/{stat}/create/stockreport', 'App\http\controllers\employeecontroller@createstockreport');
Route::post('/employee/{name}/{email}/{stat}/create/create/stockreport', 'App\http\controllers\employeecontroller@createstockreport');

Route::get('/employee/{name}/{email}/{date}/{stat}/create/orderreport', 'App\http\controllers\employeecontroller@createorderreport');
Route::post('/employee/{name}/{email}/{date}/{stat}/create/create/orderreport', 'App\http\controllers\employeecontroller@createorderreport');

Route::get('/employee/{name}/{email}/{month}/create/incomereport', 'App\http\controllers\employeecontroller@createincomereport');
Route::post('/employee/{name}/{email}/{month}//create/create/incomereport', 'App\http\controllers\employeecontroller@createincomereport');

Route::get('/employee/signout', 'App\http\controllers\employeecontroller@signout');
Route::post('/employee/signout', 'App\http\controllers\employeecontroller@signout');
