<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;

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
    return view('perbaikan');
});

route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'login'])->name('login');
route::resource('home', App\Http\Controllers\HomeController::class );
route::resource('home02', App\Http\Controllers\Home02Controller::class );
route::resource('home03', App\Http\Controllers\Home03Controller::class );
route::resource('login', App\Http\Controllers\LoginController::class );
route::resource('about', App\Http\Controllers\AboutController::class );
route::resource('features', App\Http\Controllers\FeaturesController::class );
route::resource('shop', App\Http\Controllers\ShopController::class ) ->name('index', 'shop');
route::resource('blog', App\Http\Controllers\BlogController::class );
route::resource('contact', App\Http\Controllers\ContactController::class );
route::resource('shoping-cart', App\Http\Controllers\Shoping_CartController::class );
route::resource('blog-detail', App\Http\Controllers\Blog_DetailController::class );
route::resource('admin', App\Http\Controllers\AdminController::class );
route::resource('owner', App\Http\Controllers\OwnerController::class );
route::resource('courier', App\Http\Controllers\CourierController::class );
route::resource('payment_method', App\Http\Controllers\Payment_MethodController::class );
route::resource('clothes', App\Http\Controllers\ClothesController::class );
route::resource('orders', App\Http\Controllers\OrdersController::class );
route::resource('product-detail', App\Http\Controllers\ProductDetailController::class );
route::resource('keranjang', App\Http\Controllers\KeranjangController::class );
// //  jika user belum login
// Route::group(['middleware' => 'guest'], function() {
//     Route::get('/', [AuthController::class, 'login'])->name('auth');
//     Route::post('/', [AuthController::class, '']);

// });

// untuk admin, owner, dan courier
// Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/redirect', [RedirectController::class, 'cek']);
// });


// // untuk admin
// Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
//     Route::get('/admin', [AdminController::class, 'index']);
// });

// // untuk owner
// Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
//     Route::get('/owner', [OwnerController::class, 'index']);

// });

// // untuk courier
// Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
//     Route::get('/courier', [CourierController::class, 'index']);

// });

