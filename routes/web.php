<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Category;
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
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [Category\IndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [Category\CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [Category\StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [Category\ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [Category\EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [Category\UpdateController::class, '__invoke'])->name('admin.category.update');
    });
});

Auth::routes();

