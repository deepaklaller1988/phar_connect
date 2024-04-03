<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\SubCategoryController;
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
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/subcategory', [HomeController::class, 'subcategory'])->name('subcategory');
Route::get('/category-details',[HomeController::class,'categoryDetail'])->name('categorydetails');
Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::get('/admin/category/add',[CategoryController::class,'create'])->name('admin.category.add');
    Route::post('/admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::delete('/admin/category/delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.delete');
}); 

Route::middleware(['auth', 'user-access:partner'])->group(function () {
  
    Route::get('/partner/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
});

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/partner/register',[PartnerController::class,'register'])->name('partner.register');
