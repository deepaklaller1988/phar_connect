<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Partner\PostController;
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
Route::get('/health-authority',[HomeController::class,'health_authority'])->name('health-authority');
Route::get('/about-us',[HomeController::class,'about_us'])->name('about-us');
Route::get('/privacy-policies',[HomeController::class,'privacy_policy'])->name('privacy-policies');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/terms-and-conditions',[HomeController::class,'terms_and_conditions'])->name('terms-and-conditions');
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
    Route::post('/admin/plan/create',[PlanController::class,'create'])->name('admin.plan.create');
    Route::put('/admin/plan/update/{id}',[PlanController::class,'update'])->name('admin.plan.update');
    Route::delete('/admin/plan/delete/{id}',[PlanController::class,'delete'])->name('admin.plan.delete');
    Route::get('/admin/partner/edit/{id}',[UserController::class,'edit_partner'])->name('admin.partner.edit');
    Route::put('/admin/partner/update/{id}',[UserController::class,'update'])->name('admin.partner.update');
    Route::get('admin/pages/about-us',[PageController::class,'about_us'])->name('admin.pages.about-us');
    Route::get('admin/pages/terms-and-conditions',[PageController::class,'terms_and_conditions'])->name('admin.pages.terms-and-conditions');
    Route::get('admin/pages/faq',[PageController::class,'faq'])->name('admin.pages.faq');
    Route::get('admin/pages/privacy-policies',[PageController::class,'privacy_policies'])->name('admin.pages.privacy-policies');
    Route::post('admin/pages/store',[PageController::class,'store'])->name('admin.pages.store');
}); 

Route::middleware(['auth', 'user-access:partner'])->group(function () {
  
    Route::get('/partner/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
    Route::get('/partner/profile',[PartnerController::class, 'profile'])->name('partner.profile');
    Route::post('/partner/update/{id}',[PartnerController::class, 'update'])->name('partner.update');
    Route::get('/partner/posts',[PostController::class, 'index'])->name('partner.posts');
    Route::get('/partner/post/add',[PostController::class, 'add'])->name('partner.post.add');
    Route::post('/partner/post/store',[PostController::class, 'store'])->name('partner.post.store');
    Route::get('/partner/post/edit/{id}',[PostController::class, 'edit'])->name('partner.post.edit');   
    Route::put('/partner/post/update/{id}',[PostController::class, 'update'])->name('partner.post.update');
    Route::delete('/partner/post/delete/{id}',[PostController::class, 'destroy'])->name('partner.post.delete');
});

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/partner/register',[PartnerController::class,'register'])->name('partner.register');
Route::get('/citySuggestion',[PartnerController::class,'city_suggestion'])->name('citySuggestion');
