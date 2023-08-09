<?php

use App\Http\Controllers\settingsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostCreationController;
use App\Http\Controllers\ProfileController;
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
    return redirect('/feed');
    })->middleware(['auth', 'verified'])->name('feed');

Route::get('/feed', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('feed');

Route::get('/profile', function () {
    return view('profile');
    })->middleware(['auth', 'verified'])->name('profile');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::delete('/settings', [SettingsController::class, 'destroy'])->name('settings.destroy');
    Route::put('/settings', [SettingsController::class, 'update_bio'])->name('settings.update_bio');
});

Route::get('/posts/{id}', [PostController::class, 'displayOne']);

Route::get('/users', [UserController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/create_post', [PostCreationController::class, 'create'])->name('post.create');
    Route::post('/create_post', [PostCreationController::class, 'store'])->name('post.store');
});

require __DIR__.'/auth.php';
