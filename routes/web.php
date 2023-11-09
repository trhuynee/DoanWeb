<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class)->except('index', 'show');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    //Bắt buộc đăng nhập tài khoản admin
    Route::prefix('admin')->middleware('can:isAdmin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });
});
// Không cần đăng nhập
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::resource('/products', ProductController::class)->only(['index', 'show']);

Route::get('/', function () {
    //return view('welcome');
    return view('home');
});
