<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PSpell\Config;

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

Route::get('/',[PostController::class,'index'])->middleware(['auth'])->name('posts.index');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';

// Route::get('/posts', [PostController::class, 'index'])->middleware(['auth'])->name('posts.index');

// Route::get('/posts/create',[PostController::class,'create'])->middleware(['auth'])->name('posts.create');

// Route::post('/posts', [PostController::class, 'store'])->middleware(['auth'])->name('posts.store');

// Route::get('/posts/{post}',[PostController::class,'show'])->middleware('auth')->name('posts.show');

// Route::get('/posts/{post}/edit', [PostController::class,'edit'])->middleware('auth')->name('posts.edit');

// Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware(['auth'])->name('posts.update');

// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth'])->name('posts.destroy');

Route::resource('posts', PostController::class)->middleware(['auth']);

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home.index');

Route::resource('configs', ConfigController::class)->middleware(['auth']);

Route::post('/config/update', [ConfigController::class, 'update'])->name('config.update');



