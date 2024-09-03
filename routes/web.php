<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Admin\Tag;
use App\Http\Controllers\Admin\Post;
use App\Http\Controllers\Admin\Main;
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
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [Main\IndexController::class, '__invoke']);
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', [Post\IndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/create', [Post\CreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/', [Post\StoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [Post\ShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [Post\EditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [Post\UpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [Post\DeleteController::class, '__invoke'])->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [Category\IndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [Category\CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [Category\StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [Category\ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [Category\EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [Category\UpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [Category\DeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [Tag\IndexController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [Tag\CreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/', [Tag\StoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [Tag\ShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [Tag\EditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [Tag\UpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [Tag\DeleteController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [User\IndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('/create', [User\CreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('/', [User\StoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/{user}', [User\ShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('/{user}/edit', [User\EditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [User\UpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/{user}', [User\DeleteController::class, '__invoke'])->name('admin.user.delete');
    });
});

Auth::routes();

