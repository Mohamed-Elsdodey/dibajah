<?php

use App\Models\City;
use App\Models\Region;
use App\Http\Controllers\Admin\{AuthController,
    CategoryController,
    DiscountListController,
    ItemsController,
    ModifiersController,
    HomeController
};
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


Route::get('login', [AuthController::class, 'loginView'])->name('admin.login');
Route::post('login', [AuthController::class, 'postLogin'])->name('admin.postLogin');

Route::group([ 'middleware' => 'admin'], function () {
    Route::get('/', [HomeController::class,'index'])->name('admin.index');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('analytic',[HomeController::class,'analytic'])->name('analytic');


    ### admins
    Route::resource('admins', \App\Http\Controllers\Admin\AdminController::class);
    Route::get('activateAdmin',[App\Http\Controllers\Admin\AdminController::class,'activate'])->name('admin.active.admin');

    ### contacts
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class);//setting

    ##roles
   // Route::resource('roles',App\Http\Controllers\Admin\AdminRoleController::class);

    ### categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    ###countries
    Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
    ### areas
    Route::resource('areas', \App\Http\Controllers\Admin\AreaController::class);
    ### cities
    Route::resource('cities', \App\Http\Controllers\Admin\CityController::class);
    ###  markets
    Route::resource('markets', \App\Http\Controllers\Admin\MarketController::class);
    ### products
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    ### settings
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);//setting












});

