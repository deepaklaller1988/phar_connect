<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('index',[homeController::class,'index']);
route::get('category',[homeController::class,'category']);
route::get('subcategory',[homeController::class,'subcategory']);
