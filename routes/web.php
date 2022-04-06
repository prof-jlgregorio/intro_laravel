<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProducController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name?}', function($name = "Jorge"){
    return "<h1>Hello $name !!!</h1>";
})->where('name', '[A-Za-z]+');

Route::prefix('/app')->group( function () {
    Route::get('/', function(){
        return "<h2>My App</h2>";
    });
    Route::get('/profile', function(){
        return "<h2>My Profile!</h2>";
    });
});

//-------------------------------------------------------
//now we are using Controllers!

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/add/{product}', [ProductController::class, 'add']);

Route::get('/product/promotion', [ProductController::class, 'promotion']);
 //----------------------------------------------------------------

//..creating the routes for ClientController - all methods
 Route::resource('/client', ClientController::class);

 Route::resource('/product', ProductController::class);


