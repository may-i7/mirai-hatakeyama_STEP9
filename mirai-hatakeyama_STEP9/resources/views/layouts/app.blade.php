<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Cytech EC')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!--ヘッダー部　-->
    <header>
        <div class="logo">
            <h2>Cytech EC</h2>
        </div>
        <div class="header-nav">
            <!-- Homeリング　（商品一覧へ） -->
            <a href="{{ route('products.index') }}">Home</a>

            <!-- マイページリンク　-->
            <ahref="{{ route('mypage') }}">マイページ</a>

            <!-- ログインユーザー名表示 -->
            <span>ログインユーザー: {{ Auth::user()->name ?? 'ゲスト' }}</span>

            <!-- ログアウトボタン -->
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">ログアウト</button>
            </form>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main>
        @yield('content')
    </main>

    <!-- フッター部 -->
    <footer>
        <!-- お問い合わせボタン -->
        <div>
            <a href="{{ route('contact') }}" class="btn-contact">お問い合わせ</a>
        </div>
        <div class="footer-nav" style="justify-content: center; margin-bottom: 10px;">
            <a href="{{ route('products.index') }}">Home</a>
            <a href="{{ route('mypage') }}">マイページ</a>
        </div>
        <div class="copyright">
            <p>&copy; 2026 Company, Inc</p>
        </div>
    </footer>

</body>
</html>



