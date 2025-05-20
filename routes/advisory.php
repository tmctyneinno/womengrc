<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\ChatComponent;
use App\Http\Controllers\Advisory\ProfileController;
use App\Http\Controllers\Advisory\AdvisoryDashboardController;
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


Route::middleware(['auth', 'verified', 'role:advisory_member'])
    ->prefix('advisory')
    ->name('advisory.')
    ->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
 
    Route::get('/dashboard', [AdvisoryDashboardController::class, 'index'])->name('dashboard'); 
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 

});
