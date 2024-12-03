<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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

Route::get('/', [FrontendController::class, 'index'])->name('home'); 
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/vision', [FrontendController::class, 'vision'])->name('vision');
Route::get('/purpose', [FrontendController::class, 'purpose'])->name('purpose');
Route::get('/mission', [FrontendController::class, 'mission'])->name('mission');
Route::get('/events', [FrontendController::class, 'event'])->name('event');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog'); 
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq'); 
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact'); 
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacyPolicy'); 
Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('termsCondition'); 


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
