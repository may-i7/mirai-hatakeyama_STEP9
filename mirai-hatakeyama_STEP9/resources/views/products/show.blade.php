<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gtay-800 leading-tight">
            商品詳細
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/show.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rouded-lg p-6">
                <h1>商品詳細</h1>

                <div class="product-info">
                    <p><strong>商品名:</strong>{{ $product->name }}</p>
                </div>

                <div class="product-info">
                    <p><strong>説明:</strong>{{ $product->description }}</p>
                </div>

                <div class="product-info">
                    <p><strong>画像:</strong></p>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" class="product-image">
                    @else
                        <span>画像なし</span>
                    @endif
                </div>

                <div class="product-info">
                    <p><strong>金額:</strong> ¥{{ number_format($product->price) }}</p>
                </div>
                
                {{-- 会社名・いいねボタン --}}
                <div class="product-info">
                    <strong>会社:</strong> <span>TNG</span>
                </div>

                <div class="product-info">
                    <button type="button" class="like-button" onclick="toggleLike(this)">
                        <svg class="heart-icon" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>

                <div class="product-info">
                    <strong>在庫:</strong>{{ $product->stock }}個
                </div>

                <!-- 戻るボタン -->
                <div class="button-container">
                    <a href="{{ route('products.purchase', $product->id) }}" class="btn-cart">カートに追加する</a>
                    <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
                </div>

            </div>
        </div>
    </div>
    <Script src="{{ asset('js/show.js') }}"></script>
</x-app-layout>