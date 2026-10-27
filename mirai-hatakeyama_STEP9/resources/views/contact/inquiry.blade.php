<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gtay-800 leading-tight">
            お問い合わせフォーム
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/inquiry.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h1>お問い合わせフォーム</h1>

                <form action="{{ route('inquiry.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" id="name"  name="name" value="{{ old('name') }}" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" id="email"  name="email" value="{{ old('email') }}" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="message">お問い合わせ内容</label>
                        <textarea id="message"  name="message" row="5" class="form-textarea">{{ old('message') }}</textarea>

                        @if ($errors->any())
                            <div class="error-msg">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                           @if ($errors->any())
                               <div class="error-msg">
                                   @foreach ($errors->all() as $error)
                                       <p>{{ $error }}</p>
                                   @endforeach
                               </div>
                           @endif

                           <div class="button-container">
                               <button type="submit" class="btn-submit">送信</button>
                               <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
                            </div>
                </form>
   
            </div>
        </div>
    </div>
</x-app-layout>