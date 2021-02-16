<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\CommentController as FrontCommentController;

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

//Route::get('/', function () {
//    return view('home');
//});


/**
 * Routes pour le package laravel-filemanager => gestion des images
 */
//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
//    Lfm::routes();
//});

/**
 * Routes FRONT
 */
Route::get('/', [FrontPostController::class, 'index'])->name('home');
Route::get('category/{category:slug}', [FrontPostController::class, 'category'])->name('category');
Route::name('tag')->get('tag/{tag:slug}', [FrontPostController::class, 'tag']);

Route::prefix('posts')->group(function () {
    Route::get('{slug}', [FrontPostController::class, 'show'])->name('posts.display');
    Route::get('', [FrontPostController::class, 'search'])->name('posts.search');
    Route::get('{post}/comments', [FrontCommentController::class, 'comments'])->name('posts.comments');
    Route::post('{post}/comments', [FrontCommentController::class, 'store'])->middleware('auth')->name('posts.comments.store');
});

Route::name('front.comments.destroy')->delete('comments/{comment}', [FrontCommentController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
