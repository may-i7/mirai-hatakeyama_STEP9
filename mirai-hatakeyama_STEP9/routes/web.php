<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// 商品一覧ルート
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// 商品新規登録画面の表示
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// 商品の保存処理
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// 商品詳細画面へのルート
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// 商品購入画面の表示
Route::get('/products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');
// 商品購入の実行処理
Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');

