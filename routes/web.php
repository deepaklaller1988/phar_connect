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
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\CategoryController as HomeCategory;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PlanJobController;
use App\Http\Controllers\CheckPlanDaysController;
use App\Http\Controllers\PostJobsChangeStatusController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\Admin\SettingController;


use App\Http\Controllers\Admin\TransactionController;
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
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
Route::get('/subcategory/{slug}', [HomeController::class, 'subcategory'])->name('subcategory');
Route::get('/category-details/{slug}',[HomeController::class,'categoryDetail'])->name('categorydetails');
Route::get('/jobs',[HomeController::class,'jobs'])->name('jobs');
Route::get('/consultants',[HomeController::class,'consultants'])->name('consultants');
Route::get('/partner-details/{slug}',[HomeController::class,'partner_details'])->name('partner-details');
Route::get('/categories',[HomeCategory::class,'index'])->name('categories');
Route::get('/health-authority',[HomeController::class,'health_authority'])->name('health-authority');
Route::get('/about-us',[HomeController::class,'about_us'])->name('about-us');
Route::get('/privacy-policies',[HomeController::class,'privacy_policy'])->name('privacy-policies');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/terms-and-conditions',[HomeController::class,'terms_and_conditions'])->name('terms-and-conditions');
Route::get('/posts/{slug}',[HomeController::class,'posts'])->name('posts');
Route::get('/post-details/{slug}',[HomeController::class,'post_details'])->name('post-details');
Route::get('/contact-us',[ContactUsController::class,'contactus'])->name('contact-us');
Route::post('/store/contact-us',[ContactUsController::class,'store'])->name('store.contact-us');
Route::get('/pricings',[HomeController::class,'pricing'])->name('pricings');
Route::get('/search',[HomeController::class,'search'])->name('search');
Route::get('/country-search',[HomeController::class,'country_search'])->name('country-search');
Route::any('/search-posts/{slug}/{slug2}',[HomeController::class,'search_posts'])->name('search-posts');
Route::any('/search-posts/{slug}',[HomeController::class,'search_posts'])->name('search-posts');
Route::any('/slug',[CategoryController::class,'slug'])->name('slug');
Route::get('/getpost/{id}',[HomeController::class,'getpost'])->name('getpost');
Route::get('paypal/payment/{id}', [PayPalPaymentController::class, 'payment'])->name('pay.with.paypal');
Route::get('cancel-payment', [PayPalPaymentController::class,'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PayPalPaymentController::class,'paymentSuccess'])->name('success.payment');

Auth::routes();
Route::get('/home', [HomeController::class, 'index']);


Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::get('/admin/category/add',[CategoryController::class,'create'])->name('admin.category.add');
    Route::post('/admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::put('/admin/category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.delete');
    Route::get('/admin/subcategories',[CategoryController::class,'get_categories'])->name('admin.subcategories');
    Route::get('/admin/cat',[CategoryController::class,'get_cat'])->name('admin.cat');
    Route::get('/admin/partners',[UserController::class,'partners'])->name('admin.partners');
    Route::get('admin/partners-by-admin',[UserController::class,'partners_by_admin'])->name('admin.partners-by-admin');
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
    Route::get('admin/pages/contact-us',[PageController::class,'contact_us'])->name('admin.pages.contact-us');
    Route::get('admin/posts',[AdminPostController::class,'index'])->name('admin.posts');
    Route::get('admin/post/edit/{id}',[AdminPostController::class,'edit'])->name('admin.post.edit');
    Route::put('admin/post/update/{id}',[AdminPostController::class,'update'])->name('admin.post.update');
    Route::delete('admin/post/delete/{id}',[AdminPostController::class,'destroy'])->name('admin.post.delete');
    Route::get('/admin/notifications',[NotificationController::class,'get_admin_notifications'])->name('admin.notifications');
    Route::get('/admin/posts/category',[PostController::class,'category'])->name('admin.posts.category');
    Route::get('/admin/partner/add',[UserController::class,'add_partner'])->name('admin.partner.add');
    Route::post('/admin/partner/store',[UserController::class,'store_partner'])->name('admin.partner.store');
    Route::post('/admin/partner/bulkaction',[UserController::class,'bulkaction'])->name('admin.partner.bulkaction');
    Route::get('/admin/transactions',[TransactionController::class,'index'])->name('admin.transactions');
    Route::get('/admin/view-invoice/{id}',[TransactionController::class,'download_invoice'])->name('admin.download-invoice');
    Route::get('/admin/archive-partners',[UserController::class,'archive_partners'])->name('admin.archive-partners');
    Route::get('/admin/pages/sliders',[PageController::class,'sliders'])->name('admin.pages.sliders');
    Route::post('/admin/pages/sliders/store',[PageController::class,'store_slider'])->name('admin.pages.slider.store');
    Route::get('admin/pages/slider/add',[PageController::class,'add'])->name('admin.pages.slider.add');
    Route::get('admin/pages/slider/edit/{id}',[PageController::class,'edit'])->name('admin.pages.slider.edit');
    Route::put('admin/pages/slider/update/{id}',[PageController::class,'update'])->name('admin.pages.slider.update');
    Route::delete('admin/pages/slider/delete/{id}',[PageController::class,'delete'])->name('admin.pages.slider.delete');
    Route::get('/admin/settings',[SettingController::class,'index'])->name('admin.settings');
    Route::post('/admin/settings/update',[SettingController::class,'update'])->name('admin.settings.update');
    Route::post('/admin/update-password',[AdminController::class,'update_password'])->name('admin.update-password');
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
    Route::get('/partner/subcategories',[CategoryController::class,'get_categories'])->name('partner.subcategories');
    Route::get('/partner/cat',[CategoryController::class,'get_cat'])->name('partner.cat');
    Route::get('/partner/notifications',[NotificationController::class,'get_partner_notifications'])->name('partner.notifications');
    Route::get('/partner/post/loadblade',[PostController::class,'loadBlade'])->name('partner.post.loadblade');
    Route::get('partner/choose-categories',[PartnerController::class,'categories'])->name('partner.categories');
    Route::post('partner/selected-categories',[PartnerController::class,'selected_categories'])->name('partner.selected-categories');
});
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/partner/register',[PartnerController::class,'register'])->name('partner.register');
Route::get('/citySuggestion',[PartnerController::class,'city_suggestion'])->name('citySuggestion');
Route::put('/notification/update/{id}',[NotificationController::class,'update'])->name('notification.update');
Route::get('plan/job',[PlanJobController::class,'planjob']);
Route::put('/notification/update/{id}',[NotificationController::class,'update'])->name('notification.update');
Route::get('check/plan/days',[CheckPlanDaysController::class,'check_plan_days']);
Route::get('post/jobs/change/status',[PostJobsChangeStatusController::class,'post_jobs_change_status']);

