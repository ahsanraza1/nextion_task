<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ThirdParty\FlightApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/verification-notice', function () {
    return view('notice');
})->name('verification.notice');

Route::group(['middleware' => ['auth', 'verified']], function (){
    Route::get('/', function () {
        return view('main.pages.profile');
    });
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
    Route::get('flight-api', [FlightApiController::class, 'flightAPi'])->name('flight-api');
    Route::get('docs', [DashboardController::class, 'docs'])->name('docs');
}); 
Route::post('logout', function (Request $request)
{
    Auth::logout(); 
    $request->session()->invalidate();
    $request->session()->regenerateToken(); 
    return redirect('/');
})->middleware('auth')->name('logout');

Route::resource('register', RegisterController::class);
Route::resource('login', LoginController::class);
Route::middleware(['email.verification'])->get('/verify-email/{id}/{token}', [UserController::class,'verifyEmail'])->name('verification.verifyEmail');

