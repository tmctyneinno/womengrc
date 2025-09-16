<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\ChatComponent;
use App\Http\Controllers\Facilitator\FacilitatorDashboardController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MembershipController;
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

Route::middleware('auth','role:guests')->prefix('user')->name('user.')->group(function () {
      
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'edit'])->name('profile.edit'); 
    Route::put('/profile/update', [DashboardController::class, 'update'])->name('profile.update');
    
    Route::get('/view-benefits', [MembershipController::class, 'viewBenefits'])->name('viewBenefits');
    Route::get('/renew-membership', [MembershipController::class, 'renewMembership'])->name('renewMembership');
     
    Route::get('/find-mentor', [MentorController::class, 'findMentor'])->name('findMentor');
    Route::post('/add-mentor/{mentor}', [MentorController::class, 'addMentor'])->name('add-mentor');

    Route::get('/accept-mentor-invitation/{id}', [MentorController::class, 'acceptMentorInvitation'])->name('mentor.accept-invitation');

    // Route::resource('profile', MentorController::class);

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index'); 
    Route::get('/chat/{mentorId}', [ChatController::class, 'show'])->name('chat.show');
   
    // Route::get('/chat/index', [ChatController::class, 'index'])->name('chat.index');

    // Route::get('/chat/{mentorId}', [ChatController::class, 'index'])->name('chat.chat');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/facilitator/dashboard', [FacilitatorDashboardController::class, 'index'])->name('facilitator.dashboard');

    Route::get('membership/plans', [CheckoutController::class, 'plans'])->name('membership.plans');
    Route::get('/checkout/{plan}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/subscription/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/subscription/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
    Route::post('/stripe/webhook', [CheckoutController::class, 'webhook'])->name('stripe.webhook');
    Route::delete('/subscription/cancel', [CheckoutController::class, 'cancelSubscription'])
    ->name('subscription.cancel')
    ->middleware('auth'); 

    Route::get('upcoming/events', [DashboardController::class, 'upcomingEvent'])->name('events.upcoming');
    Route::get('upcoming/events/show/{id}', [DashboardController::class, 'showUpcomingEvent'])->name('events.upcoming.show');
    // Training routes
    Route::get('/training', [DashboardController::class, 'trainingIndex'])->name('training.index');
    Route::get('/training/{certification}', [DashboardController::class, 'showTraining'])->name('training.show');
    Route::post('/training/{certification}/complete', [DashboardController::class, 'markCompleteTraining'])->name('training.complete');
    

}); 

