<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;

Auth::routes();

Route::group(['middleware' => 'auth'], function()
    {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::resource('posts', PostController::class);

        Route::group(['prefix' => '/commnets', 'as' => 'comments.'], function()
            {
                Route::post('/{post}', [CommentController::class, 'store'])->name('store');
            }
        );

        Route::group(['prefix' => '/replies', 'as' => 'replies.'], function()
            {
                Route::post('/{comment}', [ReplyController::class, 'store'])->name('store');
            }
        );
    }
);
