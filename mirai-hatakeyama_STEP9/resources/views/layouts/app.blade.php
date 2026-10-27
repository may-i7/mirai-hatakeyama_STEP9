<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- フッター部 -->
            <footer class="border-t border-gray-300 py-8 text-center text-sm text-gray-600 mt-auto">
                <div class="mb-3">
                    <a href="{{ route('inquiry.create') }}" class="btn-footer-contact">お問い合わせ</a>
                </div>
                <div class="space-x-6 mb-3">
                    <a href="{{ route('products.index') }}" class="custom-link">Home</a>
                    <a href="{{ route('profile.edit') }}" class="custom-link">マイページ</a>
                </div>
                <div class="text-xs text-gray-500">
                    &copy; 2026 Company, inc
                </div>
            </footer>
        </div>
    </body>
</html>
