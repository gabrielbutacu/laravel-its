<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blogs', [BlogController::class, 'index']);

    Route::get('/test-post', [BlogController::class, 'getRequest']);
    Route::post('/test-post', [BlogController::class, 'postRequest']);

    Route::get('/test-par/{id}', [BlogController::class, 'getPar']);

    Route::get('getfile', [BlogController::class, 'getFile']);

    Route::get('posts', [PostController::class, 'index'])->middleware(IsAdmin::class);

    Route::get('create-post', [PostController::class, 'create'])->middleware(IsAdmin::class);
    Route::post('create-post', [PostController::class, 'savePost'])->middleware(IsAdmin::class);

    Route::get('edit-post/{id}', [PostController::class, 'edit'])->middleware(IsAdmin::class);
    Route::post('update-post/{id}', [PostController::class, 'updatePost'])->middleware(IsAdmin::class);

    Route::delete('delete-post/{id}', [PostController::class, 'delete'])->middleware(IsAdmin::class);

    Route::get('user/{id}', [UserController::class, 'userProfile']);

});



require __DIR__.'/auth.php';
