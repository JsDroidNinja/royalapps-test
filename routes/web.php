<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;


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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.user')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
    });

    Route::prefix('authors')->name('authors.')->group(function () {
        Route::get('/', [AuthorsController::class, 'index'])->name('index');
        Route::get('/{id}', [AuthorsController::class, 'show'])->name('show');
        Route::delete('/{id}', [AuthorsController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/create', [BooksController::class, 'create'])->name('create');
        Route::post('/store', [BooksController::class, 'store'])->name('store');
        Route::delete('/{id}', [BooksController::class, 'delete'])->name('delete');
    });
});
