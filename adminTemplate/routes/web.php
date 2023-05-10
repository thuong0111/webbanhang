<?php

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
// use App\Http\Controllers\MainController;

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
// admin/users/login
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){
        Route::get('/',[MainController::class, 'index'])->name('admin');
        Route::get('main',[MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);

        });
        #Product

        Route::prefix('productts')->group(function(){
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{productt}', [ProductController::class, 'show']);
            Route::post('edit/{productt}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services',[UploadController::class, 'store']);

        #Sliders
        Route::prefix('sliders')->group(function(){
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Customer
        Route::get('customers',[ App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}',[ App\Http\Controllers\Admin\CartController::class, 'show']);

    });
});
Route::get('/',[ App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product',[ App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html',[ App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html',[ App\Http\Controllers\ProductController::class, 'index']);
Route::post('add-cart',[ App\Http\Controllers\CartController::class, 'index']);
Route::get('carts',[ App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart',[ App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}',[ App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts',[ App\Http\Controllers\CartController::class, 'addCart']);