<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品詳細</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>

<div class="container">
    <h1>商品詳細</h1>

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

    <div class="product-info" style="display: flex; align-items: center; gap; 10px;">
            <strong>会社:</strong> <span>TNG</span>
            <button type="button" class="like-button" onclick="toggleLike(this)" style="background: none; corder: none; cursor: pointer; padding: 0; display: flex; align-items: center;">
                <svg class="heart-icon" viewBox="0 0 24 24" width="24" height="24" style="fill: #ccc; transition: fill 0.2s ease, transform 0.1s ease">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
    </div>

    <div class="product-info">
            <strong>在庫:</strong>{{ $product->stock }}個
    </div>

    <!-- 戻るボタン -->
    <div style="margin-top: 20px;">
    <a href="{{ route('products.purchase', $product->id) }}" class="btn-cart" style="background-color: #0066cc; color: #ffffff !important; padding:10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; magin-right: 10px;">カートに追加する</a>
    <a href="{{ route('products.index') }}" class="btn-back" style="backgound-color: #6c757d; color: #ffffff !important; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-back;">戻る</a>
</div>

</body>
<script>
    function toggleLike(button) {
        button.classList.toggle('is-liked');
        const heart = button.querySelector('.heart-icin');
        if (button.classList.contains('is-like')) {
            heart.style.fill = '#ff3b30';
            heart.style.tronsform = 'scale(1.2)';
        } else {
            heart.style.fill = '#ccc';
            heart.style.transform = 'scale(1)';

        }
    }
</script>
</html>