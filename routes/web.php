<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ThemeController;

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




Route::get('/get_all_themes',[ThemeController::class,'getAllThemes']);
Route::middleware(['auth.shopify'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth.shopify'])->name('home');

    Auth::routes();

    // Route::get('/home', 'HomeController@index')->name('home');

    Route::view('/product', 'navbar.product');
    Route::view('/customer', 'navbar.customer');
    Route::view('/setting', 'navbar.setting');


    Route::get('test', function () {

        
    });
});
