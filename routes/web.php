<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Advisory\AdvisoryDashboardController;

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
require __DIR__.'/user.php';
require __DIR__.'/facilitator.php';
require __DIR__.'/advisory.php';
require __DIR__.'/guests.php';
   
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
Route::post('/faq/store', [FrontendController::class, 'faqStore'])->name('faq.submit'); 
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact'); 
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacyPolicy'); 
Route::get('/consent', [FrontendController::class, 'consent'])->name('consent');  
Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('termsCondition'); 
Route::get('blog/{id}/details', [BlogController::class, 'detail'])->name('blog.detail');
Route::post('/post/comment', [BlogController::class, 'storeComment'])->name('comments.store');

Route::post('/contact', [FrontendController::class, 'submitContact'])->name('contact.submit');
// Or specifically for password reset (if not using Auth::routes() or a starter kit)
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/myaccount/login', [LoginController::class, 'showLoginForm'])->name('home.login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::get('/otp/verify', [LoginController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/otp/verify', [LoginController::class, 'verifyOtp'])->name('otp.verify.post');
Route::post('/login/resend-otp', [LoginController::class, 'resendOtp'])->name('login.resend.otp');
 
Route::get('/myaccount/register', [RegisterController::class, 'showRegister'])->name('home.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

