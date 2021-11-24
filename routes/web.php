<?php

use App\Http\Controllers\{CategoryController, DashboardPostController, PostController};
use App\Http\Controllers\{LoginController, RegisterController};

use App\Models\{User};
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
// Dashboard Post-------------------------
Route::prefix('/dashboard/posts')->middleware('auth')->group(function () {
    Route::get('/', [DashboardPostController::class, 'index']);
    Route::get('/create', [DashboardPostController::class, 'create']);
    Route::post('/', [DashboardPostController::class, 'store'])->name('posts.store');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

// Login--------------------------------
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register------------------------------
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register');

// Dashboard-----------------------------
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');




// Posts------------------------------------
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::get('show/{post:slug}', [PostController::class, 'show'])->name('posts.show');
});

// Category-----------------------------------
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
});

// Author
Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author')
    ]);
});