<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MembershipController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\MentorController;


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

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
      
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/view-benefits', [MembershipController::class, 'viewBenefits'])->name('viewBenefits');
    Route::get('/renew-membership', [MembershipController::class, 'renewMembership'])->name('renewMembership');
    
    Route::get('/find-mentor', [MentorController::class, 'findMentor'])->name('findMentor');
    Route::post('/add-mentor/{mentor}', [MentorController::class, 'addMentor'])->name('add-mentor');

    Route::get('/accept-mentor-invitation/{id}', [MentorController::class, 'acceptMentorInvitation'])->name('mentor.accept-invitation');

    Route::resource('profile', MentorController::class);

    Route::get('/chat/index', [ChatController::class, 'index'])->name('chat.index');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
 
}); 

