{{-- 新規追加画面 --}}
<x-layout>
    <x-slot name=title>
        Add New Post - My BBS
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index')}}">戻る</a>
    </div>

    <h1>Add New Post - My BBS</h1>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>
                Title
                {{-- old()で入力した値があればそれを表示 --}}
                <input type="text" name="title" value="{{ old('title') }}">
            </label>
            @error('title')
                {{-- エラーメッセージは$message変数で渡される。 --}}
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>
                Body
                <textarea name="body">{{ old('body') }}</textarea>
            </label>
            @error('body')
                {{-- エラーメッセージは$message変数で渡される。 --}}
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-button">
            <button>Add</button>
        </div>
    </form>
</x-layout>
