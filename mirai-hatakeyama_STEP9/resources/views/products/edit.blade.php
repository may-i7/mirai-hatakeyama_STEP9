<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="edit-title">出品商品編集</h1>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">商品名</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">商品説明</label>
                        <textarea id="description" name="description" row="5" class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="stock">在庫数</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>商品画像</label>
                        <div class="image-preview-area">
                            @if(!empty($product->image))
                                <img src="{{ asset('storage/'  . $product->image) }}" alt="商品画像" class="current-image">
                            @else
                                <p>画像は登録されていません</p>
                            @endif
                        </div>
                        <input type="file" name="image" class="file-input">
                    </div>

                    <div class="button-group">
                        <a href="{{ route('products.show', $product->id) }}" class="btn-back">戻る</a>
                        <button type="submit" class="btn-update">更新</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>