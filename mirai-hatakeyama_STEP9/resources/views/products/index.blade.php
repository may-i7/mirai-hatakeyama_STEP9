<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>商品一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            background: #fafafa;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .search-form input[type="text"],
        .search-form input[type="number"] {
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-form button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 7px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-form button:hover {
            background-color: #004085;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 10px;
            text-aligh: left;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }
        .btn-detail {
            background-color: #28a745;
            color: white;
            padding: 5px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-detail:hover {
            backgroud-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
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

</body>
</html>

