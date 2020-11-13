<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', 'UserController@index');

Route::get('contact-us', 'ContactFormController@create')->name('contact.create');
Route::post('contact-us','ContactFormController@store')->name('contact.store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shoping', 'HomeController@shoping')->name('shoping');

Route::get('add-to-cart/{id}', 'HomeController@GetAddToCard');
Route::get('Cart_shopping', 'HomeController@GetCart')->name('Cart_shopping');

Route::get('ReduceOne/{id}','HomeController@ReduceOne')->name('ReduceOne');
Route::get('DeleteItem/{id}','HomeController@DeleteItem')->name('DeleteItem');

Route::get('checkout', 'HomeController@checkout')->name('checkout');




