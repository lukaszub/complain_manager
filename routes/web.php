<?php

use App\Http\Controllers\ComplainController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Models\Complain;
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

Route::get('/send', [MailController::class, 'sendMail']);

Route::get('/', [ComplainController::class, 'index']);

//Display create form for complain
Route::get('/complain/create',[ComplainController::class, 'create'])->middleware('auth');

//Store new complain
Route::post('/complains', [ComplainController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('/complains/edit/{complain}', [ComplainController::class, 'edit'])->middleware('auth');

//Update complain
Route::put('/complains/update/{complain}', [ComplainController::class, 'update'])->middleware('auth');

//Show edit form 
Route::get('/complains/edit/{complain}', [ComplainController::class, 'edit'])->middleware('auth');

//Delete complain
Route::delete('/complains/{complain}', [ComplainController::class, 'destroy'])->middleware('auth');

//Dispaly single complain
Route::get('/complains/show/{complain}', [ComplainController::class, 'show'])->middleware('auth');

//Search adress
Route::post('/search',[ComplainController::class, 'search'])->name('search');

//Show register form 
Route::get('/register', [UserController::class, 'create']);

//Create new user 
Route::post('/users', [UserController::class, 'store']);

//Log user out 
Route::post('/logout',[UserController::class, 'logout']);

//Show login form 
Route::get('/login', [UserController::class, 'login'])->name('login');

//Login user 
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



