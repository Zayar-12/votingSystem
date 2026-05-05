<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'login'] )->name('login');

Route::get('/register', function () {
    return view('auth.register'); // မင်းမှာ auth/register.blade.php ရှိရမယ်
})->name('register');

Route::post('/register',[AuthController::class,'register'] )->name('register');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/profile' ,function(){
    return view('components.profile');
})->name('profile');

Route::post('/profilePhoto',[UserController::class,'profilePhotoUpload'])->name('ProfilePhoto');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); 
    return redirect('/home'); 
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/home',[ CandidateController::class,'index'])->middleware(['auth', 'verified'])->name('home');

Route::post('/vote',[CandidateController::class,'vote'])->name('vote')->middleware('auth');
Route::get('/showCandidate/{candidate}',[CandidateController::class,'show'])->name('candidate.show');
