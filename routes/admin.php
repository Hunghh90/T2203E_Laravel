<?php
Route::get("/dashboard",[\App\Http\Controllers\HomeController::class,"index"]);
Route::prefix("product")->group(function (){
    Route::get("/list",[\App\Http\Controllers\Admin\ProductController::class,"listAll"]);
    Route::get("/create",[\App\Http\Controllers\Admin\ProductController::class,"createProduct"])->name("create_product");
    Route::post("/create",[\App\Http\Controllers\Admin\ProductController::class,"store"]);
    Route::get("/edit/{product}",[\App\Http\Controllers\Admin\ProductController::class,"edit"]);
    Route::post("/edit/{product}",[\App\Http\Controllers\Admin\ProductController::class,"update"]);
    Route::post("/delete/{product}",[\App\Http\Controllers\Admin\ProductController::class,"delete"]);
});
