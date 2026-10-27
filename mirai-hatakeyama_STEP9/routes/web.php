<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mypage', [ProfileController::class, 'show'])->name('profile.show');
});
// 商品一覧画面
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// 商品新規登録フォーム画面
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// 商品新規登録の保存処理
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// 商品詳細画面（一般用）
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// 商品詳細画面（ユーザー用）
Route::get('/products/owner/{product}' , [ProductController::class, 'ownerShow'])->name('products.owner_show');
// 商品購入画面
Route::get('/products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');
// 商品編集フォーム画面
Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
// 商品更新処理
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// 商品削除処理
Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');
// 商品の編集フォーム画面
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// 編集された内容を更新
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// お問い合わせフォーム表示
Route::get('/inquiry' , [ProductController::class, 'inquiry'])->name('inquiry.create');
// お問い合わせの送信処理
Route::post('/inquiry', [ProductController::class, 'inquiryStore'])->name('inquiry.store');


require __DIR__.'/auth.php';
