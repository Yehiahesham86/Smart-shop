<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
/* Home page*/
Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/Categories', [App\Http\Controllers\HomeController::class,'Categories'])->name('Categories');
/*---------*/

/******my profile */
Route::get('/myprofile', [App\Http\Controllers\profile::class,'index'])->name('myprofile');
Route::post('/myprofile', [App\Http\Controllers\profile::class,'edit'])->name('editprofile');


/******end profile */
/*****
 * google Auth
 */
Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('authgoogle');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('authgooglecallback');
/**** */


/*** 
 * facebook Auth
 * 
*/
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [App\Http\Controllers\FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [App\Http\Controllers\FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

/** ************ */

/*Start Auth Route ------ Verification emails */
Route::get('/login', function () {return view('auth.login');})->name('login');

Route::get('/mailsucces', function () {return view('auth.mailsucces');})->name('mailsucces');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    $message='Verification link sent!';
    return back()->with('message', 'Verification link sent!');
    return response()->json(['message'=>$message]);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);

Auth::routes();
/**end Auth Route*/

/*** photos */
Route::get('/upload_photo', [App\Http\Controllers\photo::class, 'index'])->name('upload_photo');
Route::post('/upload_photo', [App\Http\Controllers\photo::class, 'upload_photo'])->name('post_upload_photo');
Route::get('/view_photo', [App\Http\Controllers\photo::class, 'view_photo'])->name('view_photo');
Route::get('/delete_photo', [App\Http\Controllers\photo::class, 'delete_photo'])->name('delete_photo');
/***end photos */

/****show products */
Route::get('/showproducts/{id}',[App\Http\Controllers\show_products::class, 'index'] )->name('showproducts');
Route::Post('/filter',[App\Http\Controllers\show_products::class, 'filter'] )->name('filter');
Route::Post('/showcategories',[App\Http\Controllers\show_products::class, 'categories'] )->name('showcategories');
/*****end show proudcts */

/****product-details */
Route::get('/product_details/{id}',[App\Http\Controllers\product_details::class, 'index'] )->name('product_details');
Route::Post('/wishlist_add',[App\Http\Controllers\wish::class, 'add'] )->name('wishlist_add');
Route::Post('/wishlist_delete',[App\Http\Controllers\wish::class, 'delete'] )->name('wishlist_delete');
Route::Post('/add_review',[App\Http\Controllers\product_details::class, 'add_review'] )->name('add_review');
/****end product-details */

/****add cart */
Route::get('/mycart' ,[App\Http\Controllers\addcart::class, 'index'])->name('mycart');
Route::get('/showcart' ,[App\Http\Controllers\addcart::class, 'show'])->name('showcart');
Route::Post('/addtocart' ,[App\Http\Controllers\addcart::class, 'add'])->name('addtocart');
Route::Post('/updatecart' ,[App\Http\Controllers\addcart::class, 'update'])->name('updatecart');
Route::Post('/deletecart' ,[App\Http\Controllers\addcart::class, 'delete'])->name('deletecart');
/*****end add cart */

/******* checkout */
Route::get('/checkout' ,[App\Http\Controllers\checkout::class, 'index'])->name('checkout');
Route::post('/checkaddress' ,[App\Http\Controllers\addresses::class, 'check'])->name('checkaddress');
/******end checkout  */

/****** paypal*/
Route::post('pay', [App\Http\Controllers\PaymentController::class, 'pay'])->name('payment');
Route::get('success', [App\Http\Controllers\PaymentController::class, 'success'])->name('success');
Route::get('error', [App\Http\Controllers\PaymentController::class, 'error'])->name('error');
/*****end paypal */

/*****stripe */
Route::post('/payment', [App\Http\Controllers\stripePaymentController::class, 'payment'])->name('stripe_payment');
/*****end stripe */


/****contact us */
Route::get('/contact_us', [App\Http\Controllers\contact_us::class, 'index'])->name('contact_us');
/****end contact us */

/*****order-details */
Route::get('/myorders', [App\Http\Controllers\myorders::class, 'index']  )->name('myorders');
Route::get('/index_order_details/{id}', [App\Http\Controllers\myorders::class, 'index_order_details']  )->name('index_order_details');
Route::post('/order_details_ajax', [App\Http\Controllers\myorders::class, 'order_details']  )->name('order_details');
Route::post('/details', [App\Http\Controllers\myorders::class, 'details']  )->name('details');
/****end order-details */
/*******wishlist */
Route::get('/wishlist',[App\Http\Controllers\wish::class, 'index_1'] )->name('wishlist');
Route::get('/wishlist_index', [App\Http\Controllers\wish::class, 'index'])->name('wishlist_index');
Route::post('/wishlist_show', [App\Http\Controllers\wish::class, 'showwish'])->name('wishlist_show');
/****endwishlist */

/****dashboard */
Route::get('/QqBBKhIpDOYn8oR',[App\Http\Controllers\dashboard::class, 'dashhome'] )->name('QqBBKhIpDOYn8oR');
Route::get('/09ktQ1IXYRvjDjJ',[App\Http\Controllers\dashboard::class, 'dashusers'] )->name('09ktQ1IXYRvjDjJ');
Route::POST('/delete_user_dashboard',[App\Http\Controllers\dashboard::class, 'delete_user_dashboard'] )->name('delete_user_dashboard');
Route::POST('/update_user_dashboard',[App\Http\Controllers\dashboard::class, 'update_user_dashboard'] )->name('update_user_dashboard');
Route::POST('/search_user_dashboard',[App\Http\Controllers\dashboard::class, 'search_user_dashboard'] )->name('search_user_dashboard');
Route::GET('/SKaA6KbPoUjrHB6',[App\Http\Controllers\dashboard::class, 'dashproduct'] )->name('SKaA6KbPoUjrHB6');
Route::POST('/delete_product_dashboard',[App\Http\Controllers\dashboard::class, 'delete_product_dashboard'] )->name('delete_product_dashboard');
Route::GET('/add_product_dashboard', [App\Http\Controllers\dashboard::class, 'add_product_dashboard'] )->name('add_product_dashboard');
Route::POST('/add_product', [App\Http\Controllers\dashboard::class, 'add_product']  )->name('add_product');
Route::GET('/edit_product_dashboard/{id}', [App\Http\Controllers\dashboard::class, 'edit_product_dashboard']  )->name('edit_product_dashboard');
Route::POST('/edit_product/{id}', [App\Http\Controllers\dashboard::class, 'edit_product']  )->name('edit_product');
Route::GET('/YuwIiNF8LNLKlSm',[App\Http\Controllers\dashboard::class, 'home_page_dashboard'] )->name('YuwIiNF8LNLKlSm');
Route::GET('/YuwIiNF8LNLghjl',[App\Http\Controllers\dashboard::class, 'orders_dashboard'] )->name('YuwIiNF8LNLghjl');
Route::POST('/update_order_dashboard',[App\Http\Controllers\dashboard::class, 'update_order_dashboard'] )->name('update_order_dashboard');
Route::GET('/3xwEBay3rvBnzaD',[App\Http\Controllers\dashboard::class, 'payment_dashboard'] )->name('3xwEBay3rvBnzaD');
Route::POST('/canceled_payment_dashboard',[App\Http\Controllers\dashboard::class, 'canceled_payment_dashboard'] )->name('canceled_payment_dashboard');
Route::GET('/wwjD0qvJPOMLIAb/{id}',[App\Http\Controllers\dashboard::class, 'invoice_dashboard'] )->name('wwjD0qvJPOMLIAb');
Route::POST('/addcategory',[App\Http\Controllers\dashboard::class, 'addcategory'] )->name('addcategory');
Route::POST('/addbrand',[App\Http\Controllers\dashboard::class, 'addbrand'] )->name('addbrand');
Route::GET('/oySuuFab6nhMmUw', [App\Http\Controllers\dashboard::class, 'add_area_dashboard'] )->name('oySuuFab6nhMmUw');
Route::POST('/add_area', [App\Http\Controllers\dashboard::class, 'add_area']  )->name('add_area');




/******end dashboard */









