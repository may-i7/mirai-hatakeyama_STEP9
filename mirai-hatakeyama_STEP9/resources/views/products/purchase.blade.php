<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gtay-800 leading-tight">
            購入画面
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="container">
                    <h1>購入画面</h1>

                    <div class="product-info">
                        <strong>商品名:</strong>{{ $product->name }}
                    </div>

                    <div class="product-info">
                        <strong>説明:</strong>{{ $product->description }}
                    </div>

                    <div class="product-info">
                        <strong>画像:</strong><br>
                        @if($product->image)
                           <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" class="product-image">
                        @else
                           <span>画像なし</span>
                        @endif
                    </div>

                    <div class="product-info">
                        <strong>金額:</strong> ¥{{ number_format($product->price) }}
                    </div>

                    <div class="product-info">
                        <strong>残り:</strong>{{ $product->stock }}
                    </div>

                    <div class="product-info">
                        <strong>会社:</strong> <span>TNG</span>
                    </div>

                    @if($product->stock > 0)
                       <form action="{{ route('products.buy', $product->id) }}" method="POST">
                           @csrf
                           <div>
                               <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="quantity-input" required>
                           </div>

                           @if ($errors->any())
                               <div class="error-msg">
                                   @foreach ($errors->all() as $error)
                                       <p>{{ $error }}</p>
                                   @endforeach
                               </div>
                           @endif

                           <button type="submit" class="btn-buy">購入する</button>
                           <a href="{{ route('products.show', $product->id) }}" class="btn-back">戻る</a>
                      </form>
                    @else
                        <div class="error-msg" style="font-size: 18px; margin-top: 20px;">
                            この商品は売り切れのため、購入できません。
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="{{ route('products.show', $product->id) }}" class="btn-back" style="margin-left: 0;">戻る</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

