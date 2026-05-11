<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//normal route
Route::get('/', [UserController::class,'index'])->name('welcome');
Route::get('/home',[ CandidateController::class,'index'])->middleware(['auth', 'verified'])->name('home');
Route::post('/vote',[CandidateController::class,'vote'])->name('vote')->middleware('auth');

//auth route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'login'] )->name('login');

Route::get('/register', function () {
    return view('auth.register'); 
})->name('register');

Route::post('/register',[AuthController::class,'register'] )->name('register');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

//profile route
Route::get('/profile' ,function(){
    return view('components.profile');
})->name('profile');

Route::post('/profilePhoto',[UserController::class,'profilePhotoUpload'])->name('ProfilePhoto');

//admin route
Route::get('/admin/home',[AdminController::class,'index'])->middleware('auth')->name('admin.home');
Route::post('/declareWinner',[AdminController::class,'Winner'])->middleware('auth')->name('declareWinner');
Route::get('/admin/addCandidate',function(){
    return view('admin.components.AddCandidate');
})->middleware('auth')->name('addCandidate');
Route::get('/voterList',[AdminController::class,'voterList'])->middleware('auth')->name('voterList');
Route::get('/candidateList',[AdminController::class,'candidateList'])->middleware('auth')->name('candidateList');
Route::get('/voteHistroy',[AdminController::class,'voteHistory'])->middleware('auth')->name('voteHistroy');
Route::post('/candidateStore',[AdminController::class,'store'])->middleware('auth')->name('candidate.store');
Route::post('/toggleStartStop',[AdminController::class,'toggleStartStop'])->middleware('auth')->name('toggleStartStop');
Route::put('/candidateUpdate/{candidate}',[AdminController::class,'update'])->middleware('auth')->name('candidate.update');
Route::delete('/candidateDelete/{candidate}',[AdminController::class,'destroy'])->middleware('auth')->name('candidate.delete');
Route::get('/cadidateDetail/{candidate}',[AdminController::class,'detail'])->middleware('auth')->name('candidateDetail');


//verify email route
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); 
    return redirect('/home'); 
})->middleware(['auth', 'signed'])->name('verification.verify');

//detail route
Route::get('/showCandidate/{candidate}',[CandidateController::class,'show'])->name('candidate.show');
