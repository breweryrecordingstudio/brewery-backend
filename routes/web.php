<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\CancelationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SettingController;
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
use Illuminate\Support\Facades\Artisan;

Route::get('clear-cache', function () {
    Artisan::call('view:clear');
   Artisan::call('config:cache');
   Artisan::call('route:cache');
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('config:clear');

   return "Cache cleared successfully";
})->name('clear');



Route::get('/', [AdminController::class, 'login'])->name('login');
Route::post('/login_post', [AdminController::class, 'login_post'])->name('login_post');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // breadcrumbs Route
    Route::get('/admin/breadcrumb/add', [AdminController::class, 'breadcrumb_add']);
    Route::post('/admin/breadcrumb/add_post', [AdminController::class, 'breadcrumb_add_post']);
    Route::get('/admin/breadcrumb', [AdminController::class, 'breadcrumb']);
    Route::get('/admin/breadcrumb/edit/{id}', [AdminController::class, 'breadcrumb_edit']);
    Route::post('/admin/breadcrumb/edit_post', [AdminController::class, 'breadcrumb_edit_post']);
    Route::get('/admin/breadcrumb/delete/{id}', [AdminController::class, 'breadcrumb_delete']);

    // categorys Route
     Route::get('/admin/category/add', [AdminController::class, 'category_add']);
     Route::post('/admin/category/add_post', [AdminController::class, 'category_add_post']);
     Route::get('/admin/category', [AdminController::class, 'category']);
     Route::get('/admin/category/edit/{id}', [AdminController::class, 'category_edit']);
     Route::post('/admin/category/edit_post', [AdminController::class, 'category_edit_post']);
     Route::get('/admin/category/delete/{id}', [AdminController::class, 'category_delete']);

     // employees Route
    Route::get('/admin/employee/add', [AdminController::class, 'employee_add']);
    Route::post('/admin/employee/add_post', [AdminController::class, 'employee_add_post']);
    Route::get('/admin/employee', [AdminController::class, 'employee']);
    Route::get('/admin/employee/edit/{id}', [AdminController::class, 'employee_edit']);
    Route::post('/admin/employee/edit_post', [AdminController::class, 'employee_edit_post']);
    Route::get('/admin/employee/delete/{id}', [AdminController::class, 'employee_delete']);

    // services Route
    Route::get('/admin/service/add', [AdminController::class, 'service_add']);
    Route::post('/admin/service/add_post', [AdminController::class, 'service_add_post']);
    Route::get('/admin/service', [AdminController::class, 'service']);
    Route::get('/admin/service/edit/{id}', [AdminController::class, 'service_edit']);
    Route::post('/admin/service/edit_post', [AdminController::class, 'service_edit_post']);
    Route::get('/admin/service/delete/{id}', [AdminController::class, 'service_delete']);

    // plans Route
    Route::get('/admin/plan/add', [AdminController::class, 'plan_add']);
    Route::post('/admin/plan/add_post', [AdminController::class, 'plan_add_post']);
    Route::get('/admin/plan', [AdminController::class, 'plan']);
    Route::get('/admin/plan/edit/{id}', [AdminController::class, 'plan_edit']);
    Route::post('/admin/plan/edit_post', [AdminController::class, 'plan_edit_post']);
    Route::get('/admin/plan/delete/{id}', [AdminController::class, 'plan_delete']);

    // other_services Route
     Route::get('/admin/other_service/add', [AdminController::class, 'other_service_add']);
     Route::post('/admin/other_service/add_post', [AdminController::class, 'other_service_add_post']);
     Route::get('/admin/other_service', [AdminController::class, 'other_service']);
     Route::get('/admin/other_service/edit/{id}', [AdminController::class, 'other_service_edit']);
     Route::post('/admin/other_service/edit_post', [AdminController::class, 'other_service_edit_post']);
     Route::get('/admin/other_service/delete/{id}', [AdminController::class, 'other_service_delete']);

     // clients Route
     Route::get('/admin/client/add', [AdminController::class, 'client_add']);
     Route::post('/admin/client/add_post', [AdminController::class, 'client_add_post']);
     Route::get('/admin/client', [AdminController::class, 'client']);
     Route::get('/admin/client/edit/{id}', [AdminController::class, 'client_edit']);
     Route::post('/admin/client/edit_post', [AdminController::class, 'client_edit_post']);
     Route::get('/admin/client/delete/{id}', [AdminController::class, 'client_delete']);

     // studios Route
    Route::get('/admin/studio/add', [AdminController::class, 'studio_add']);
    Route::post('/admin/studio/add_post', [AdminController::class, 'studio_add_post']);
    Route::get('/admin/studio', [AdminController::class, 'studio']);
    Route::get('/admin/studio/edit/{id}', [AdminController::class, 'studio_edit']);
    Route::post('/admin/studio/edit_post', [AdminController::class, 'studio_edit_post']);
    Route::get('/admin/studio/delete/{id}', [AdminController::class, 'studio_delete']);
    Route::get('/admin/studio/slide_delete/{id}', [AdminController::class, 'studio_slide_delete']);

    // studio_tours Route
    Route::get('/admin/studio_tour/add', [AdminController::class, 'studio_tour_add']);
    Route::post('/admin/studio_tour/add_post', [AdminController::class, 'studio_tour_add_post']);
    Route::get('/admin/studio_tour', [AdminController::class, 'studio_tour']);
    Route::get('/admin/studio_tour/edit/{id}', [AdminController::class, 'studio_tour_edit']);
    Route::post('/admin/studio_tour/edit_post', [AdminController::class, 'studio_tour_edit_post']);
    Route::get('/admin/studio_tour/delete/{id}', [AdminController::class, 'studio_tour_delete']);

     // social_icons Route
     Route::get('/admin/social_icon/add', [AdminController::class, 'social_icon_add']);
     Route::post('/admin/social_icon/add_post', [AdminController::class, 'social_icon_add_post']);
     Route::get('/admin/social_icon', [AdminController::class, 'social_icon']);
     Route::get('/admin/social_icon/edit/{id}', [AdminController::class, 'social_icon_edit']);
     Route::post('/admin/social_icon/edit_post', [AdminController::class, 'social_icon_edit_post']);
     Route::get('/admin/social_icon/delete/{id}', [AdminController::class, 'social_icon_delete']);

      // history Route
      Route::get('/admin/history/add', [AdminController::class, 'history_add']);
      Route::post('/admin/history/add_post', [AdminController::class, 'history_add_post']);
      Route::get('/admin/history', [AdminController::class, 'history']);
      Route::get('/admin/history/edit/{id}', [AdminController::class, 'history_edit']);
      Route::post('/admin/history/edit_post', [AdminController::class, 'history_edit_post']);
      Route::get('/admin/history/delete/{id}', [AdminController::class, 'history_delete']);


       // reviews Route
     Route::get('/admin/review/add', [AdminController::class, 'review_add']);
     Route::post('/admin/review/add_post', [AdminController::class, 'review_add_post']);
     Route::get('/admin/review', [AdminController::class, 'review']);
     Route::get('/admin/review/edit/{id}', [AdminController::class, 'review_edit']);
     Route::post('/admin/review/edit_post', [AdminController::class, 'review_edit_post']);
     Route::get('/admin/review/delete/{id}', [AdminController::class, 'review_delete']);

      // headers Route
      Route::get('/admin/header/edit/{id}', [AdminController::class, 'header_edit']);
      Route::post('/admin/header/edit_post', [AdminController::class, 'header_edit_post']);

      // headers Route
      Route::get('/admin/heading_other_service/edit/{id}', [AdminController::class, 'heading_other_service_edit']);
      Route::post('/admin/heading_other_service/edit_post', [AdminController::class, 'heading_other_service_edit_post']);


     // footers Route
     Route::get('/admin/footer/edit/{id}', [AdminController::class, 'footer_edit']);
     Route::post('/admin/footer/edit_post', [AdminController::class, 'footer_edit_post']);

     Route::get('/admin/term_condition/edit/{id}', [AdminController::class, 'term_condition']);
     Route::post('/admin/term_condition/edit_post', [AdminController::class, 'term_condition_edit_post']);

     Route::get('/admin/privacy_policy/edit/{id}', [AdminController::class, 'privacy_policy']);
     Route::post('/admin/privacy_policy/edit_post', [AdminController::class, 'privacy_policy_edit_post']);

    //  gear route
     Route::get('/admin/gear', [AdminController::class, 'gear']);
    //  Route::get('/admin/gear/{id}/{$status}',  [AdminController::class, 'updateGearStatus']);
     Route::get('/admin/gear/{id}/{status}',  [AdminController::class, 'updateGearStatus']);

     // profiles Route
    Route::get('/admin/profile/edit/{id}', [AdminController::class, 'profile_edit']);
    Route::post('/admin/profile/edit_post', [AdminController::class, 'profile_edit_post']);

    // floor_plans Route
    Route::get('/admin/floor_plan', [AdminController::class, 'floor_plan']);
    Route::get('/admin/floor_plan/edit/{id}', [AdminController::class, 'floor_plan_edit']);
    Route::post('/admin/floor_plan/edit_post', [AdminController::class, 'floor_plan_edit_post']);

    // maps Route
    Route::get('/admin/map', [AdminController::class, 'map']);
    Route::get('/admin/map/edit/{id}', [AdminController::class, 'map_edit']);
    Route::post('/admin/map/edit_post', [AdminController::class, 'map_edit_post']);


});

Route::get('/verify-email/{token}', [AdminController::class, 'verify_email_submit']);
// Route::get('/admin/payment', [StripePaymentController::class, 'stripe']);
// Route::post('/admin/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
