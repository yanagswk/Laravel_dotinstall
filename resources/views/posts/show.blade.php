{{-- 詳細画面 --}}
<x-layout>
    <x-slot name="title">
        {{ $post->title }} - My BBS
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>

    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn">[×]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <h2>Comments</h2>
    <ul>
        <li>
            <form action="{{ route('comments.store', $post) }}" method="post" class="comment-form">
                @csrf
                <input type="text" name="body">
                <button>Add</button>
            </form>
        </li>

        {{-- @foreach ($post->comments()->latest()->get() as $comment) --}}
        @foreach ($comments as $comment)
            <li>{{ $comment->body }}</li>
            <form action="{{ route('comments.destroy', $comment)}}" method="post" class="delete-comment">
                @method('DELETE')
                @csrf
                <button class="btn">[×]</button>
            </form>
        @endforeach
    </ul>

</x-layout>
