<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MollieController;
/*
|--------------------------------------------------------------------------
| Web Routes ( pages link )
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    return view('about');
});

Route::get('contact', 'ContactController@create');

Route::post('contact', 'ContactController@store');

Route::get('/contact', 'HomeController@index')->name('contact');

Route::post('/contact', 'HomeController@send_mail')->name('addContact');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return view('home');
});

Route::get('/community', function () {
    return view('community');
});



Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/financial', function () {
    return view('financial');
});





//Route::get('/profile', function () {
  //  return view('profile');
//});


Route::view("profile",'profile'); 
Route::view("form",'home');
Route::post("submit",'Editprofile@save');
//Route:get('/contact',[ContactController::class,'contact']);   //contact-form & contact function 
//Route::post('/send-message',[ContactController::class,'sendEmail'])->name(contact.send);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('layouts\app');


// Payment Gateway method
Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
