<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
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


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
});