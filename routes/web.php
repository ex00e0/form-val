<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/catalog', [UserController::class, 'catalog'])->name('catalog');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// Route::group(['middleware' = ['auth', 'checkIsAdmin'] , 'prefix' = 'admin']) 

// Route::get('/appl', [UserController::class, 'appl'])->name('appl');