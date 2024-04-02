<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartnerController;
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

//  Route::get('/', function () {
    // return view('home');
//  });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/category', [HomeController::class, 'category']);
Route::get('/subcategory', [HomeController::class, 'subcategory']);
Route::get('/category-details',[HomeController::class,'categoryDetail']);
Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware(['auth', 'user-access:partner'])->group(function () {
  
    Route::get('/partner/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
});

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/partner/register',[PartnerController::class,'register'])->name('partner.register');
