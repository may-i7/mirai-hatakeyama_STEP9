<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>商品新規登録</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>

<div class="container">
    <h2>商品登録</h2>

    <!-- 新規登録フォーム　-->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>商品名</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>価格</label>
            <input type="number" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label>商品説明</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>在庫数</label>
            <input type="number" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="form-group">
            <label>商品画像</label>
            <input type="file" name="image">
        </div>

        <div class="btn-container">
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>

</body>
</html>

