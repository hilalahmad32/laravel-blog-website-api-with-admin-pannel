<?php


use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscribeController as AdminSubscribeController;
use App\Http\Controllers\Frontend\CommentController as FrontendCommentController;
use App\Http\Controllers\Frontend\Contact;
use App\Http\Controllers\Frontend\GetPostController;
use App\Http\Controllers\Frontend\SubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// all these route are protected
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/admins', [AdminAuth::class, 'admins']);
        Route::post('/logout', [AdminAuth::class, 'logout']);
      

        // categorys routes
        Route::get('/categorys', [CategoryController::class, 'index']);
        Route::post('/categorys', [CategoryController::class, 'store']);
        Route::put('/categorys/{id}', [CategoryController::class, 'edit']);
        Route::post('/categorys/{id}', [CategoryController::class, 'update']);
        Route::delete('/categorys/{id}', [CategoryController::class, 'delete']);
        Route::get('/categorys/{search}', [CategoryController::class, 'search']);

        // posts routes

        Route::get('/posts', [PostController::class, 'index']);
        Route::post('/posts', [PostController::class, 'store']);
        Route::put('/posts/{id}', [PostController::class, 'edit']);
        Route::post('/update', [PostController::class, 'update']);
        Route::delete('/posts/{id}', [PostController::class, 'delete']);
        Route::get('/posts/{search}', [PostController::class, 'search']);

        // setting routes
        Route::get('/setting', [SettingController::class, 'index']);
        Route::post('/setting/{id}', [SettingController::class, 'update']);

        // contact routes
        Route::get('/contacts', [ContactController::class, 'getContects']);
        Route::delete('/contacts/{id}', [ContactController::class, 'delete']);

        // subscribe routes
        Route::get('/subscribe', [AdminSubscribeController::class, 'index']);
        Route::delete('/subscribe/{id}', [AdminSubscribeController::class, 'delete']);

        // comments
        Route::get('/comments', [CommentController::class, 'index']);
        Route::delete('/comments/{id}', [CommentController::class, 'delete']);
    });
});
  Route::post('/login', [AdminAuth::class, 'login']);




Route::prefix('/front')->group(function () {
    Route::get('/all-posts', [GetPostController::class, 'index']);
    Route::get('/viewd-posts', [GetPostController::class, 'viewPosts']);
    Route::get('/single-posts/{id}', [GetPostController::class, 'getPostById']);
    Route::get('/category-posts/{id}', [GetPostController::class, 'getPostByCategory']);
    Route::get('/search-posts/{search}', [GetPostController::class, 'searchPost']);
    Route::post('/contact', [Contact::class, 'store']);
    Route::post('/subscribe', [SubscribeController::class, 'store']);
    Route::get('/comments', [FrontendCommentController::class, 'getComments']);
    Route::post('/comments/{id}', [FrontendCommentController::class, 'store']);
});
