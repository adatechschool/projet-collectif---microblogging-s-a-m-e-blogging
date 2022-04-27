<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('auth/login');
});

Route::get("/profile", function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//Route::get('/posts/create', [PostController::class, 'create']);
//Route::post('/posts', [PostController::class, 'store']);