<?php

use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/comments')->name('comments.')->group(function () {
    Route::get('/',[CommentController::class, 'index'])->name('index');
    Route::post('/store',[CommentController::class, 'store'])->name('store');
});

Route::get('reload-captcha', [CommentController::class, 'reloadCaptcha'])->name('reloadCaptcha');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
