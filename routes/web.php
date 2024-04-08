<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController as HomeCategory;
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
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/subcategory/{id}', [HomeController::class, 'subcategory'])->name('subcategory');
Route::get('/category-details',[HomeController::class,'categoryDetail'])->name('categorydetails');
Route::get('/jobs',[HomeController::class,'jobs'])->name('jobs');
Route::get('/consultants',[HomeController::class,'consultants'])->name('consultants');
Route::get('/partner-details',[HomeController::class,'partner_details'])->name('partner-details');
Route::get('/categories',[HomeCategory::class,'index'])->name('categories');
Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::get('/admin/category/add',[CategoryController::class,'create'])->name('admin.category.add');
    Route::post('/admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::put('/admin/category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.delete');
    Route::get('/admin/partners',[UserController::class,'partners'])->name('admin.partners');
    Route::get('/admin/members',[UserController::class,'members'])->name('admin.members');
    Route::get('/admin/plans',[PlanController::class,'index'])->name('admin.plans');
    Route::get('/admin/plan/edit/{id}',[PlanController::class,'edit'])->name('admin.plan.edit');
    Route::get('/admin/plan/add',[PlanController::class,'add'])->name('admin.plan.add');
}); 

Route::middleware(['auth', 'user-access:partner'])->group(function () {
  
    Route::get('/partner/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
    Route::get('/partner/profile',[PartnerController::class, 'profile'])->name('partner.profile');
});

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/partner/register',[PartnerController::class,'register'])->name('partner.register');
