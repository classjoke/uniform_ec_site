<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderFormController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\UniformRegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UpdateStatusController;

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

// ログイン画面 初期画面
Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
})->name('login');

// ログイン画面 ログイン
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

// 新規ユーザー登録機能 初期画面
Route::get('user/register', function () {
    return view('user_register');
})->name('user.register');

// 新規ユーザー登録機能 登録
Route::post('user/register', [UserRegisterController::class,'register'])->name('user.register');

// 注文画面 初期画面
Route::get('order/form', [OrderFormController::class,'index'])->name('order.form');

// 注文画面 登録
Route::post('order/form', [OrderFormController::class, 'insert'])->name('order.form');

Route::get('order/list', [OrderListController::class, 'index'])->name('order.list');

Route::post('uniform/delete', [OrderListController::class, 'delete'])->name('uniform.delete');

Route::get('order/detail',[OrderDetailController::class,'index'])->name('order.detail');

// 商品登録画面 登録
Route::get('uniform/insert', [UniformRegisterController::class, 'index'])->name('uniform.insert');
Route::post('uniform/insert', [UniformRegisterController::class, 'register'])->name('uniform.insert');

Route::post('update/status/payment', [UpdateStatusController::class, 'payment'])->name('update.status.payment');
Route::post('update/status/shipping', [UpdateStatusController::class, 'shipping'])->name('update.status.shipping');