<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialSubmissionController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware('track.visitor')->name('home');
Route::post('/language', [HomeController::class, 'switchLanguage'])->name('language.switch');
Route::get('/about', [PageController::class, 'about'])->middleware('track.visitor')->name('about');
Route::get('/services', [PageController::class, 'services'])->middleware('track.visitor')->name('services');
Route::get('/pricing', [PageController::class, 'pricing'])->middleware('track.visitor')->name('pricing');
Route::get('/portfolio', [PageController::class, 'portfolio'])->middleware('track.visitor')->name('portfolio');
Route::get('/portfolio/{project}', [PageController::class, 'portfolioShow'])->middleware('track.visitor')->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'index'])->middleware('track.visitor')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
Route::post('/testimonials', [TestimonialSubmissionController::class, 'store'])->middleware('throttle:3,1')->name('testimonials.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
require __DIR__.'/admin.php';

require __DIR__.'/auth.php';
