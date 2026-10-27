<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gtay-800 leading-tight">
            出品商品詳細
        </h2>
    </x-slot>
    
    <link rel="stylesheet" href="{{ asset('css/owner_show.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1>出品商品詳細</h1>

                <div class="product-info">
                    <p>商品名:{{ $product->name }}</p>
                    <p>説明：{{ $product->description }}</p>
                </div>

                <div class="product-image">
                    <p>画像:</p>
                    @if(!empty($product->image))
                        <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
                    @else
                        <p> (画像ファイルが登録されていません) </p>
                    @endif
                </div>

                 <div class="product-info">
                     <p>金額: ¥{{ number_format($product->price) }}</p>
                </div>

                <div class="button-group">
                    <a href="{{ route('products.edit' , $product->id) }}" class="btn-edit">編集</a>
                    <form action="{{ route('products.destroy' , $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">削除する</button>
                    </form>

                    <a href="{{ route('profile.show') }}" class="btn-back">戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>