<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use PhpParser\Node\Expr\PostDec;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'viewproduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/add-to-cart', [CartController::class, 'addProductCart']);
Route::post('/delete-cart-item', [CartController::class, 'deleteProductCart']);
Route::post('update-cart', [CartController::class,'updateCart']);


Route::middleware(['auth'])->group(function(){
    Route::get('/cart', [CartController::class, 'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);

    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'vieworder']);
});


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

    Route::get('users',[AdminFrontendController::class,'users']);

    Route::get('orders',[OrderController::class,'index']);

    Route::get('admin/view-order/{id}',[OrderController::class,'vieworder']);

});

