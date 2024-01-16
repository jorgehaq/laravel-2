<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', "App\Http\Controllers\Admin\FrontendController@index");

    Route::get('categories', "App\Http\Controllers\Admin\CategoryController@index");

    Route::get('add-category', "App\Http\Controllers\Admin\CategoryController@add");

    Route::post('insert-category', "App\Http\Controllers\Admin\CategoryController@insert");

    Route::get('edit-category/{id}', [CategoryController::class,'edit']);

    Route::put('update-category/{id}', [CategoryController::class,'update']);

    Route::get('delete-category/{id}', [CategoryController::class,'destroy']);

    Route::get('products',"App\Http\Controllers\Admin\ProductController@index");

    Route::get('edit-product/{id}',"App\Http\Controllers\Admin\ProductController@edit");

    Route::get('add-product',"App\Http\Controllers\Admin\ProductController@add");

    Route::post('insert-product',[ProductController::class,'insert']);

    Route::put('update-product/{id}',[ProductController::class,'update']);

    Route::get('delete-product/{id}',[ProductController::class,'destroy']);

});

