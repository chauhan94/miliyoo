<?php

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

//Route::get('/', function () {
//    return view('auth/sign-up');
//});
//
//Route::get('/login', function () {
//    return view('auth/sign-in');
//});
Route::post('/loginadmin','AdminController@login')->name('loginadmin');


Route::get('/chk','AdminController@chk');


Route::prefix('admin')->group(function(){
    Route::get('/home', function () {
        return view('retailer/retailer-admin');
    });

    Route::get('login','AdminController@loginView');
    Route::get('forgot-password','AdminController@ForgotPassword');
    Route::post('sendResetMail','AdminController@sendResetMail');
    Route::get('resetPassword','AdminController@resetPassword');
    Route::post('/updateAdminPassword','adminController@updateAdminPassword');

//    Route::get('signup','AdminController@signupView');
    Route::get('/logout','AdminController@logout');



    Route::group(['middleware' =>'adminAuth'],function(){

        Route::get('users','UserController@users');

        Route::get('RetailerVerify','AdminController@RetailerVerify');
        Route::get('adminBlocksUser','UserController@adminBlocksUser');
        Route::post('add_driver','DriverController@AddDriverByAdmin');
        Route::post('remove_driver','DriverController@RemoveDriver');
        Route::get('completed_orders','OrderController@completedOrders');
        Route::get('pending_orders','OrderController@pendingOrders');
        Route::get('drivers','DriverController@drivers');
        Route::get('products','ProductController@products');
        Route::get('retailers','RetailerController@retailersAdmin');
        Route::get('charges','ChargesController@DeliveryFeeCharges');
        Route::get('AddCharges','ChargesController@AddFeeCharges');
        Route::post('edit_charges','ChargesController@EditFeeCharges');

    });


});










Route::prefix('retailer')->group(function(){


    Route::get('login','RetailerController@loginView');
    Route::get('signup','RetailerController@signupView');
    Route::get('/logout','RetailerController@logout');
    Route::post('retailerlogin','RetailerController@login');
    Route::post('retailerSignup','RetailerController@Signup');



    Route::group(['middleware' =>'retailerAuth'],function(){

        Route::get('ChangeCategoryStatus','CategoryController@ChangeCategoryStatus');
        Route::post('add_category','CategoryController@AddCategory');
        Route::post('edit_category','CategoryController@EditCategory');
        Route::post('add_driver_by_reatiler','DriverController@AddDriverByRetailer');
        Route::get('drivers','DriverController@Retailerdrivers');
        Route::post('remove_driver_by_retailer','DriverController@RemoveDriverByRetailer');
        Route::get('retailers','RetailerController@retailers');
        Route::get('products','ProductController@products');
        Route::post('delete_product','ProductController@DeleteProduct');
        Route::get('ChangeProductStatus','ProductController@ChangeProductStatus');
        Route::post('insert_products_by_retailers','ProductController@AddProductsByRetailers');
        Route::get('ChangeProductAdvertisingStatus','ProductController@ChangeProductAdvertisingStatus');
        Route::post('edit_product','ProductController@EditProduct');
        Route::post('update_product','ProductController@UpdateProduct');
        Route::get('categories','CategoryController@category');
//        Route::post('orders','OrderController@pendingOrders');
//        Route::get('orders','OrderController@OrdersView');
        Route::get('pending_orders','OrderController@GetAllPendingOrders');
        Route::get('completed_orders','OrderController@GetAllCompleteOrders');
        Route::post('complete_orders','OrderController@completedOrders');
        Route::post('cancel_orders','OrderController@cancelOrders');
        Route::post('assign_driver_by_retailer','RetailerController@AssignDriverByRetailer');
        Route::post('change_order_status','OrderController@ChangeOrderStatus');


    });


});





//Route::get('/admin/login','AdminController@login');






