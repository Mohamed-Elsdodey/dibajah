<?php
use Illuminate\Support\Facades\Route;

    Route::get('/', function (){
        return redirect()->route('admin.index');
    })->name('landingPage');

   Route::post('contact-us', [\App\Http\Controllers\LandingPage\LandingPageController::class, 'contact_us_action'])->name('front.contact_us_action');

Route::post('subscriptions', [\App\Http\Controllers\LandingPage\LandingPageController::class, 'subscriptions'])->name('front.subscriptions');

Route::get('redirectBack/{id?}',[\App\Http\Controllers\Api\Orders\OrdersController::class,'redirectBack']);
Route::get('endOrderPayment',[\App\Http\Controllers\Api\Orders\OrdersController::class,'endOrderPayment']);



