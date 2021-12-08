<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;

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

route::get('/', [HomeController::class, 'index'])->name('index');
route::post('/login', [HomeController::class, 'login'])->name('login');
route::get('/register', [HomeController::class, 'index'])->name('register');
route::get('/logout', [HomeController::class, 'logout'])->name('logout');

route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::resource('admin', AdminController::class);
