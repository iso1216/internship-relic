<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TrafficAccidentController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Comment;
use App\Models\TrafficAccident;
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

/**
 * アプリ初期
 */
Route::get('/', function () {
    $trafficAccidents = TrafficAccident::orderBy('updated_at', 'desc')->get();
    return view('home', compact('trafficAccidents'));
});

/**
 * アプリロード処理
 */
Route::get('/home', function () {
    $trafficAccidents = TrafficAccident::orderBy('updated_at', 'desc')->get();
    return view('home', compact('trafficAccidents'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/trafficAccident/index', [TrafficAccidentController::class, 'index'])->name('trafficAccident.index');
    Route::get('/trafficAccident/detail/{id}', [TrafficAccidentController::class, 'detail'])->name('trafficAccident.detail');
    Route::get('/trafficAccident/register-district', [TrafficAccidentController::class, 'register'])->name('trafficAccident.register-district');
    Route::get('/trafficAccident/create', [TrafficAccidentController::class, 'create'])->name('trafficAccident.create');
    Route::post('/trafficAccident/store', [TrafficAccidentController::class, 'store'])->name('trafficAccident.store');
    Route::get('/trafficAccident/{id}', [TrafficAccidentController::class, 'edit'])->name('trafficAccident.edit');
    Route::patch('/trafficAccident/{id}', [TrafficAccidentController::class, 'update'])->name('trafficAccident.update');
    Route::delete('/trafficAccident/{id}', [TrafficAccidentController::class, 'destroy'])->name('trafficAccident.destroy');

    Route::get('/comment/index/{id}', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/create/{id}', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comment/store/{id}', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{id}', [CommentController::class, 'edit'])->name('comment.edit');
    Route::patch('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/mytrafficaccidents', [TrafficAccidentController::class, 'myTrafficAccidents'])->name('mytrafficaccidents');

    Route::get('/mycomments/{id}', [CommentController::class, 'myComment'])->name('mycomments');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
});

require __DIR__.'/auth.php';

