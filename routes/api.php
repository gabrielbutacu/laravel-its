<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    //return $request->user();
    /*
    return [
        'id' => $request->user()->id,
        'name' => $request->user()->name,
    ];
    */
    return Auth::user();
})->middleware('auth:sanctum');

Route::get('/posts', [PostController::class, 'indexPosts']);

