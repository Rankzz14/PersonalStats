<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $user = auth()->check() ? auth()->user() : null; // Kullanıcı giriş yapmışsa bilgileri al
    return view('welcome.index', compact('user')); // 'user' string olarak compact'e verilmeli
})->name('welcome');


Route::get('/profile', function () {
    return view('user.index');
});
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/create', [UserController::class, 'store'])->name('create');
Route::post('/loginin', [UserController::class, 'loginin'])->name('loginin');
