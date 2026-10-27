<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイページ
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <h2 class="mypage-title">マイページ</h2>

                 <!-- 上部：アカウント編集ボタン＆ユーザー情報　-->
                <div class="user-profile-section">
                    <a href="{{ route('profile.edit') }}" class="btn-primary">アカウント編集</a>
                
                    <div class="user-info-wrapper">
                        <div class="user-info-left">
                            <p>ユーザー名 : {{ $user->name }}</p>
                            <p>Eメール : {{ $user->email }}</p>
                        </div>
                        <div class="user-info-right">
                            <p>名前 : {{ $user->name_kanji ?? '未登録' }}</p>
                            <p>カナ : {{ $user->name_kana ?? '未登録' }}</p>
                        </div>
                    </div>
                </div>

                <!-- 中部：出品商品 -->
                <div class="product-section">
                    <div class="section-header">
                        <h3 class="section-title"><出品商品></h3>
                        <a href="{{ route('products.create') }}" class="btn-primary">新規登録</a>
                    </div>

                    <table class="mypage-table">
                        <thead>
                            <tr>
                                <th>商品番号</th>
                                <th>商品名</th>
                                <th>商品説明</th>
                                <th>料金(¥)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>
                                        <a href="{{ route('products.owner_show', $product->id) }}" class="btn-detail">詳細</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-message">出品している商品はありません。</td>
                                </tr>
                            @endforelse
                        </tody>
                    </table>
                </div>

                <!-- 下部：購入した商品 -->
                <div class="product-section">
                    <h3 class="section-title"><購入した商品></h3>

                    <table class="mypage-table">
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>商品説明</th>
                                <th>料金</th>
                                <th>個数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($purchases as $purchase)
                                <tr>
                                   <td>{{ $purchase->product->name ?? '' }}</td>
                                   <td>{{ $purchase->product->description ?? '' }}</td>
                                   <td>{{ number_format($purchase->price ?? 0) }}</td>
                                   <td>{{ $purchase->quantity ?? 1 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-message">購入した商品はありません。</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>