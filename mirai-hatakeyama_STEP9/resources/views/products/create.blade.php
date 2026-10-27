<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    @endpush
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品新規登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <h2 class="mypage-title">商品登録</h2>

                 <!-- 新規登録フォーム　-->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <table class="mypage-table">
                        <tr>
                            <th>商品名</th>
                            <td>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-input" required>
                            </td>
                            <tr>
                                <th>価格</th>
                                <td>
                                    <input type="number" name="price" value="{{ old('price') }}" class="form-input" required>
                                </td>
                            </tr>
                            <tr>
                                <th>商品説明</th>
                                <td>
                                    <textarea name="description" rows="4" class="form-textarea" required>{{ old('description') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>在庫数</th>
                                <td>
                                    <input type="number" name="stock" value="{{ old('stock') }}" class="form-input" required>
                                </td>
                            </tr>
                            <tr>
                                <th>商品画像</th>
                                <td>
                                    <input type="file" name="image" class="form-file">
                                </td>
                            </tr>
                    </table>

                    <div class="btn-container">
                        <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
                        <button type="submit" class="btn-submit">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

