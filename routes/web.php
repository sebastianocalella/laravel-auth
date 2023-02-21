<?php

use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Guest\PostController as GuestPostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('guest')->name('guest.')->group(
    function(){
        Route::get('/posts', [GuestPostController::class, 'index'])->name('posts.index');
    }
);

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(
    function(){
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::resource('/posts', AdminPostController::class);
    }
);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
