<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Flutter App API - Public endpoints
Route::get('/services',             [ServiceController::class, 'index']);
Route::get('/services/{id}',        [ServiceController::class, 'show']);

Route::get('/projects',             [ProjectController::class, 'index']);
Route::get('/projects/{id}',        [ProjectController::class, 'show']);

Route::get('/project-categories',   [CategoryController::class, 'index']);

Route::get('/pricing-categories',   [CategoryController::class, 'pricingCategories']);
Route::get('/pricing-packages',     [CategoryController::class, 'pricingPackages']);
Route::get('/pricing-packages/{id}', [CategoryController::class, 'pricingPackageDetails']);

Route::get('/contact',              [ContactController::class, 'index']);
Route::post('/contact',             [ContactController::class, 'store']);
