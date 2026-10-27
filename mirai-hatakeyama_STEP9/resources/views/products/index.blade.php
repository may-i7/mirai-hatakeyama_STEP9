<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<div class="container" style="padding: 20px;">
    <h2>商品一覧</h2>

    <form method="GET" action="{{ route('products.index') }}" class="search-form">
        <input type="text" name="name" placeholder="商品名を入力" value="{{ request('name') }}">
        <input type="number" name="min-price" placeholder="最低価格" value="{{ request('min_price') }}">
        <span>～</span>
        <input type="number" name="max_price" placeholder="最高価格" value="{{ request('max_price') }}">
        <button type="submit">検索</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>料金</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像"class="product-image">
                        @else
                            <span>画像なし</span>
                        @endif
                    </td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn-detail">詳細</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">表示できる商品はありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>


