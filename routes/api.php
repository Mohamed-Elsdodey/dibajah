<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace'=>'Auth'],function (){
   Route::post('login','AuthController@login');
   Route::post('register','AuthController@register');

   Route::group(['middleware'=>'jwt'],function (){
       Route::get('profile','AuthController@profile');
   });
});

Route::group(['middleware'=>'jwt','namespace'=>'User'],function () {
    Route::resource('user-addresses','UserAddresses');
});

Route::group(['namespace'=>'Home'],function () {
    Route::get('get-countries','HomeController@getCountries');
    Route::get('get-areas/{id?}','HomeController@getAreas');
    Route::get('get-cities/{id?}','HomeController@getCities');
});

Route::group(['namespace'=>'Products'],function () {
    Route::get('products','ProductsController@getProducts');
});
Route::group(['namespace'=>'Market'],function () {
    Route::get('markets/{id?}','MarketController@markets');
});
