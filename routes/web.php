<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\LoginController;

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
require __DIR__.'/admin.php';
 
Route::get('/', [FrontendController::class, 'index'])->name('home'); 
Route::get('/{page}', [PagesController::class, 'index'])->name('home.pages');


Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/vision', [FrontendController::class, 'vision'])->name('vision');
Route::get('/purpose', [FrontendController::class, 'purpose'])->name('purpose');
Route::get('/mission', [FrontendController::class, 'mission'])->name('mission');
Route::get('/events', [FrontendController::class, 'event'])->name('event');
Route::get('event/{id}/details', [EventController::class, 'show'])->name('events.show');


Route::get('/blog', [FrontendController::class, 'blog'])->name('blog'); 
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq'); 
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact'); 
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacyPolicy'); 
Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('termsCondition'); 

Route::get('blog/{id}/details', [BlogController::class, 'detail'])->name('blog.detail');
Route::post('/post/comment', [BlogController::class, 'storeComment'])->name('comments.store');


Auth::routes();

Route::get('/home/login', [LoginController::class, 'showLoginForm'])->name('home.login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');