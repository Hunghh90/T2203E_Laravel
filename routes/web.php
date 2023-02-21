<?php

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

Route::get('/', [App\Http\Controllers\WebController::class,"home"]);
Route::get('about-us', [App\Http\Controllers\WebController::class,"aboutUs"]);

//category

Route::middleware(["auth","admin"])->prefix('admin')->group(function (){
   @include_once ("admin.php");

});
Route::get('/detail/{product}', [App\Http\Controllers\WebController::class,"detail"])->name("product_detail");
Route::post("/add-to-cart/{product}",[\App\Http\Controllers\WebController::class,"addToCart"])->name("add_to_cart");
Route::get("/shopping-cart/",[\App\Http\Controllers\WebController::class,"shoppingCart"])->name("shopping_cart");
Route::get("/check-out/",[\App\Http\Controllers\WebController::class,"checkOut"])->name("check_out");
Route::get("/remove-cart/{product}",[\App\Http\Controllers\WebController::class,"remove"]);
Route::post("/check-out",[\App\Http\Controllers\WebController::class,"placeOrder"]);


Auth::routes();


