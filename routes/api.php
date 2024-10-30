<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
});
Route::post('/breadcrump_list', [HomeController::class, 'breadcrump_list']);
Route::post('/categories_list', [HomeController::class, 'categories_list']);
Route::post('/other_services_list', [HomeController::class, 'other_services_list']);
Route::post('/services_list', [HomeController::class, 'services_list']);
Route::post('/plans_list', [HomeController::class, 'plans_list']);
Route::post('/studios_list', [HomeController::class, 'studios_list']);
Route::post('/studio_tours_list', [HomeController::class, 'studio_tours_list']);
Route::post('/clients_list', [HomeController::class, 'clients_list']);
Route::post('/employees_list', [HomeController::class, 'employees_list']);
Route::post('/review_list', [HomeController::class, 'review_list']);
Route::post('/history_list', [HomeController::class, 'history_list']);
Route::post('/social_icon_list', [HomeController::class, 'social_icon_list']);
Route::post('/footer_list', [HomeController::class, 'footer_list']);
Route::post('/header_list', [HomeController::class, 'header_list']);
Route::post('/staff_list', [HomeController::class, 'staff_list']);
Route::post('/term_condition', [HomeController::class, 'term_condition']);
Route::post('/privacy_policy', [HomeController::class, 'privacy_policy']);
Route::post('/headings_services', [HomeController::class, 'headings_services']);
