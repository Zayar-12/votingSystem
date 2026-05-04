<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', )->name('login');

Route::get('/register', function () {
    return view('auth.register'); // မင်းမှာ auth/register.blade.php ရှိရမယ်
})->name('register');

Route::get('/logout')->name('logout');


Route::get('/home',[ CandidateController::class,'index'])->name('home');

Route::post('/vote',[CandidateController::class,'vote'])->name('vote')->middleware('auth');
Route::get('/showCandidate/{candidate}',[CandidateController::class,'show'])->name('candidate.show');
