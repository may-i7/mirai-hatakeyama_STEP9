<x-app-layout>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アカウント情報編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-medium text-gray-900 mb-6">アカウント情報編集</h3>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">ユーザー名</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Eメール</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">名前</label>
                        <input type="text" name="fullname" value="{{ old('fullname', $user->fullname ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">カナ</label>
                        <input type="text" name="kana" value="{{ old('kana', $user->kana ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('profile.show') }}" class="btn-back">
                            戻る
                        </a>
                        <button type="submit" class="btn-update">
                            更新
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
