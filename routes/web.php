<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceOfferController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::resource('user',UserController::class);
Route::resource('client',ClientController::class);
Route::resource('project',ProjectController::class);
Route::resource('job',JobController::class);
Route::resource('jobtype',JobTypeController::class);
Route::resource('invoice',InvoiceController::class);
Route::resource('order',OrderController::class);
Route::resource('service-offer',ServiceOfferController::class);
