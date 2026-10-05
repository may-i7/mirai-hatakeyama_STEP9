<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>出品商品詳細</title>
    <link rel="stylesheet" href="{{ asset('css/owner_show.css') }}">
</head>
<body>

    <h1>出品商品詳細</h1>

    <div class="product-info">

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

        <a href="{{ route('mypage') }}" class="btn-back">戻る</a>
    </div>

</body>
</html>
