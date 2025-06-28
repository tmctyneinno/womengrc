<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\ChatComponent;
use App\Http\Controllers\Facilitator\FacilitatorDashboardController;
use App\Http\Controllers\Facilitator\EventController;
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

Route::middleware('auth')->prefix('facilitator')->name('facilitator.')->group(function () {
    
    Route::get('/dashboard', [FacilitatorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/create/event', [EventController::class, 'index'])->name('create.event');
    Route::post('/event/post', [EventController::class, 'store'])->name('event.post');
      
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
}); 

