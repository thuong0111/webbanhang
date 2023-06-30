<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\BienTheController;
use App\Http\Controllers\CartController as ControllersCartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CTHoaDonController;
use App\Http\Controllers\CTPhieuNhapController;
use App\Http\Controllers\OnlineCheckoutController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\InforUserController;
use App\Http\Controllers\MauController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\HistoryControllerController;
use App\Http\Controllers\HoaDonController;
use App\Http\Livewire\Assignment;
use App\Http\Services\Productt\ProducttService;
use App\Models\Cart;
use App\Models\CTHoaDon;
use App\Models\HoaDon;
use App\Models\TinhTP;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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

//Admin
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


         #Detail Product

         Route::prefix('ctsp')->group(function(){
            Route::get('add', [BienTheController::class, 'create']);
            Route::post('add', [BienTheController::class, 'store']);
            Route::get('list', [BienTheController::class, 'index']);
            Route::get('edit/{ctsp}', [BienTheController::class, 'show']);
            Route::post('edit/{ctsp}', [BienTheController::class, 'update']);
            Route::DELETE('destroy', [BienTheController::class, 'destroy']);
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
        #size
        Route::prefix('size')->group(function(){
            Route::get('add', [SizeController::class, 'create']);
            Route::post('add', [SizeController::class, 'store']);
            Route::get('list', [SizeController::class, 'index']);
            Route::get('edit/{size}', [SizeController::class, 'show']);
            Route::post('edit/{size}', [SizeController::class, 'update']);
            Route::DELETE('destroy', [SizeController::class, 'destroy']);
        });

        #mau
        Route::prefix('mau')->group(function(){
            Route::get('add', [MauController::class, 'create']);
            Route::post('add', [MauController::class, 'store']);
            Route::get('list', [MauController::class, 'index']);
            Route::get('edit/{mau}', [MauController::class, 'show']);
            Route::post('edit/{mau}', [MauController::class, 'update']);
            Route::DELETE('destroy', [MauController::class, 'destroy']);
        });

        #Customer
        Route::get('customers',[ App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}',[ App\Http\Controllers\Admin\CartController::class, 'show']);
            
        #Customer Login

        Route::get('customerslog',[ App\Http\Controllers\Admin\CartController::class, 'indexlog']);
        Route::get('customerslog/viewlog/{hoadon}',[ App\Http\Controllers\Admin\CartController::class, 'showlog']);

        #Customer Manager
        Route::get('customermanagers',[ App\Http\Controllers\Admin\UserManagerController::class, 'index']);

    });
});
//End_Admin

Route::get('/',[ App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product',[ App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html',[ App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html',[ App\Http\Controllers\ProductController::class, 'index']);
Route::post('/load-comment',[ App\Http\Controllers\ProductController::class, 'load_comment']);
Route::post('/send-comment',[ App\Http\Controllers\ProductController::class, 'send_comment']);
Route::post('add-cart',[ App\Http\Controllers\CartController::class, 'index']);

Route::get('carts',[ App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart',[ App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}',[ App\Http\Controllers\CartController::class, 'delete_to_cart']);
Route::post('carts',[ App\Http\Controllers\CartController::class, 'addCart']);

Route::get('static-sign-in', function () {
    return view('static-sign-in');
})->name('sign-in');

Route::get('static-sign-up', function () {
    return view('static-sign-up');
})->name('sign-up');

Route::get('/loginuser', [SessionsController::class, 'create'])->name('login_user');
Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});
Route::get('/timkiem', [SearchController::class, 'search']);
Route::get('/select', [SelectController::class, 'prodfunct']);
Route::get('/selectlist', [SelectController::class, 'selectList']);
Route::get('/findProductName', [SelectController::class, 'findQuanHuyen']);
Route::get('/findmau', [App\Http\Controllers\CartController::class, 'findmau']);
// Route::get('/findmau', [App\Http\Controllers\CartController::class, 'findsize']);

Route::get('/findPhuongXa', [SelectController::class, 'findPhuongXa']);
Route::get('/tt', [OnlineCheckoutController::class, 'create']);
Route::post('/vnpay', [App\Http\Controllers\CartController::class, 'vnpay']);
Route::get('/thanhcong', [App\Http\Controllers\CartController::class, 'thanhcong']);

Route::post('/momo', [OnlineCheckoutController::class, 'momo']);
Route::get('/lichsu', [ App\Http\Controllers\CartController::class, 'history']);
Route::get('/ip', [ImportController::class, 'create']);
Route::post('/import', [ImportController::class, 'upload']);
Route::get('/history',[HoaDonController::class, 'index'])->name('history_order');
Route::get('/HoaDonDangXuLy',[HoaDonController::class, 'DangXuLy']);
Route::get('/HoaDonDaHuy',[HoaDonController::class, 'DaHuyHD']);
Route::get('/HoaDonDangGiao',[HoaDonController::class, 'DangGiaoHang']);
Route::get('/HoaDonDaHoanThanh',[HoaDonController::class, 'HoaDonDaHoanThanh']);
Route::get('/history/{hoadon}',[HoaDonController::class, 'showdetail']);

Route::get('/profile', [InforUserController::class, 'index'])->name('profile');

Route::post('/updateProfile', [InforUserController::class, 'updateProfile'])->name('update.profile');
Route::post('/update-cart-quantity', [App\Http\Controllers\CartController::class, 'update_cart_quantity']);
Route::get('/tab', function () {
    return view('tabhistory');
})->name('tab');

Route::post('/capnhat2', [ App\Http\Controllers\Admin\CartController::class, 'danggiao']);
Route::post('/capnhat3', [ App\Http\Controllers\Admin\CartController::class, 'hoanthanh']);
Route::post('/capnhathuy', [ HoaDonController::class, 'dahuy']);
Route::post('/mualai', [ HoaDonController::class, 'ud_dangxuly']);
Route::post('/filterbydate', [ HoaDonController::class, 'filterbydate']);
Route::post('/dashboard-filter', [ HoaDonController::class, 'dashboard_filter']);
Route::post('/days-order', [ HoaDonController::class, 'days_order']);
Route::post('/update-view', [ ProductController::class, 'update_view']);
Route::get('/lien-he', [ CTPhieuNhapController::class, 'index']);














