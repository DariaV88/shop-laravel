<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColourController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::middleware(['auth', 'is_admin'])->group(function() {
   
    Route::group(['prefix' => 'admin'], function() {

    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('colours', ColourController::class)->names('admin.colours');
    Route::resource('tags', TagController::class)->names('admin.tags');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('products', ProductController::class)->names('admin.products');

    Route::get('/', IndexController::class)->name('admin.main.index');
    
    Route::group(['prefix' => 'orders'], function() {
    Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
});
});
});

Route::middleware(['auth'])->group(function() {
   
    Route::group(['prefix' => 'orders'], function() {
    Route::get('/', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('/{order}', [UserOrderController::class, 'show'])->name('user.orders.show');

});
});

Route::group(['prefix' => 'basket'], function() { 
    Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
    Route::post('/add/{id}', 'App\Http\Controllers\BasketController@add')->name('basket.add');
    Route::post('/remove/{id}', 'App\Http\Controllers\BasketController@remove')->name('basket.remove');
    Route::post('/confirm', 'App\Http\Controllers\BasketController@confirm')->name('basket.confirm');
});
    
Route::post('/register', 'App\Http\Controllers\AuthController@create')->name('user.register');
Route::get('/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/dashboard', 'App\Http\Controllers\AuthController@dashboard')->name('dashboard');

Route::middleware('auth')->group(function() {

    Route::get('verify-email', function () {
        return view('verify-email');
    })->name('verification.notice');
     
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/dashboard');
    })->middleware('signed')->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:2,1')->name('verification.send');
 
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product}', 'App\Http\Controllers\MainController@product')->name('product');
