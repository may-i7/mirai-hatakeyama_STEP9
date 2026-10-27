<nav class="border-b border-gray-300 grid-bg">
    <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <!-- 左側:ロゴ -->
            <div class="text-xl font-bold text-gray-800">
                <a href="{{ route('products.index') }}">Cytech EC</a>
            </div>

            <!-- 右側：ナビゲーションメニュー -->
            <div class="flex items-center space-x-8 text-sm">
                <!-- Home -->
                <a href="{{ route('products.index') }}" class="custom-link">Home</a>
                <!-- マイページ -->
                <a href="{{ route('profile.show') }}" class="custom-link">マイページ</a>
                <!-- ログインユーザ―名表示 -->
                @auth
                <span>ログインユーザー: {{ Auth::user()->name }}</span>
                @endauth
                <!-- ログアウトボタン -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white text-sm px-3 py-1.5 rouded text-xs hover:bg-red-700 transition">
                        ログアウト
                    </button>
                </form>
            </div>
    </div>
</nav>
