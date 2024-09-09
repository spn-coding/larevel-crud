<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DrugstoreController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmailController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('room', RoomController::class);
Route::resource('message', MessageController::class);
Route::resource('drugstore', DrugstoreController::class);
Route::resource('appointment', AppointmentController::class);


Route::get('/send-mail', [EmailController::class, 'sendEmail'])->name('send-mail');








