<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
 
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [CustomauthController::class, 'dashboard'])->middleware('auth'); 
Route::get('login', [CustomauthController::class, 'index'])->name('login');
Route::post('login', [CustomauthController::class, 'customLogin'])->name('login.custom'); 
Route::get('register', [CustomauthController::class, 'registration'])->name('register-user');
Route::post('register', [CustomauthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomauthController::class, 'signOut'])->name('signout');
Route::get('password/forgot', [CustomauthController::class, 'forgotPassword'])->name('password.forgot');
Route::post('password/forgot', [CustomauthController::class, 'sendPasswordResetLink'])->name('password.send');
Route::get('password/reset/{token}', [CustomauthController::class, 'resetPassword'])->name('password.reset');
Route::post('password/reset', [CustomauthController::class, 'updatePassword'])->name('password.update');