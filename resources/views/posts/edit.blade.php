{{-- 編集画面 --}}
<x-layout>
    <x-slot name=title>
        Edit New Post - My BBS
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.show', $post)}}">戻る</a>
    </div>

    <h1>Edit New Post - My BBS</h1>

    <form action="{{ route('posts.update', $post) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label>
                Title
                {{-- old()で入力した値があればそれを表示 --}}
                <input type="text" name="title" value="{{ old('title', $post->title) }}">
            </label>
            @error('title')
                {{-- エラーメッセージは$message変数で渡される。 --}}
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>
                Body
                <textarea name="body">{{ old('body', $post->body) }}</textarea>
            </label>
            @error('body')
                {{-- エラーメッセージは$message変数で渡される。 --}}
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-button">
            <button>Update</button>
        </div>
    </form>
</x-layout>
